<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theme;
use App\setting;
use App\news;
use App\image;
use App\category;
use App\product;
use App\city;
use App\district;
use Mail;

class fontendcontroller extends Controller
{
    function __construct()
    {
        $head_logo = theme::take(1)->where('note','logo')->orderBy('id','desc')->get();
        $footer_logo = theme::take(1)->where('note','logo_footer')->orderBy('id','desc')->get();
        $head_banner = theme::take(3)->where('note','1')->orderBy('id','desc')->get();
        $head_setting = setting::where('id',1)->first();
        $head_category = category::orderBy('views','asc')->get();
        $head_city = city::all();
        $news = news::take(5)->orderBy('id','desc')->get();
        $banner1 = theme::take(3)->where('note',1)->get();
		$hotproduct = product::take(3)->where('hot',1)->orderBy('id','desc')->get();

        view()->share( [
            'head_logo'=>$head_logo,
            'footer_logo'=>$footer_logo,
			'hotproduct'=>$hotproduct,
            'head_banner'=>$head_banner,
            'head_setting'=>$head_setting,
            'news'=>$news,
            'banner1'=>$banner1,
            'head_city'=>$head_city,
            'head_category'=>$head_category
        ]);
    }

    public function home()
    {
		$menuactive = '';
        $home_slide = theme::where('note','slide')->orderBy('id','desc')->get();
        $home_product = product::take(12)->orderBy('id','desc')->get();
        $moban = news::where('cat_id',27)->orderBy('id','desc')->take(8)->get();
        $tintuc = news::where('cat_id',15)->orderBy('id','desc')->take(4)->get();
        
        return view('pages.home',[
			'menuactive'=>$menuactive,
            'home_slide'=>$home_slide,
            'home_product'=>$home_product,
            'moban'=>$moban,
            'tintuc'=>$tintuc,
            ]);
    }

    public function sitemap()
    {
        $sitemap_category = category::all();
        $sitemap_product = product::all();
        $sitemap_news = news::all();
        return response()->view('pages.sitemap', [
            'sitemap_category' => $sitemap_category,
            'sitemap_product' => $sitemap_product,
            'sitemap_news' => $sitemap_news
            ])->header('Content-Type', 'text/xml');
    }

    public function contact()
    {
		$menuactive = 'contact';
        return view('pages.contact',['menuactive'=>$menuactive]);
    }

    public function category($curl)
    {
		$menuactive = $curl;
        $category = category::where('slug',$curl)->first();
        $cat_id = $category["id"];
        
        if ($category["sort_by"]==1) {
            if($category["parent"] == 0)
            {
                $product = product::join('tbl_category', 'tbl_category.id', '=', 'tbl_product.cat_id')
                    ->select('tbl_product.*')
                    ->Where(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('cat_id',$cat_id);
                    })
                    ->orWhere(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('parent',$cat_id);
                    })
                    ->orWhere('parent',$cat_id)
                    ->orderBy('id','desc')
                    ->paginate(12);
            }
            else
            {
                $product = product::join('tbl_category', 'tbl_category.id', '=', 'tbl_product.cat_id')
                    ->select('tbl_product.*')
                    ->where('cat_id',$cat_id)->where('status','1')->orderBy('id','desc')->paginate(12);
            }
            return view('pages.product',['menuactive'=>$menuactive,'category'=>$category,'product'=>$product]);
        }

        if ($category["sort_by"]==2) {
            if($category["parent"] == 0)
            {
                $news = news::join('tbl_category', 'tbl_category.id', '=', 'tbl_news.cat_id')
                    ->select('tbl_news.*')
                    ->Where(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('cat_id',$cat_id);
                    })
                    ->orWhere(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('parent',$cat_id);
                    })
                    ->orWhere('parent',$cat_id)
                    ->orderBy('id','desc')
                    ->paginate(10);
            }
            else
            {
                $news = news::join('tbl_category', 'tbl_category.id', '=', 'tbl_news.cat_id')
                    ->select('tbl_news.*')
                    ->where('cat_id',$cat_id)->where('status','1')->orderBy('id','desc')->paginate(10);
            }
            return view('pages.news',['menuactive'=>$menuactive,'category'=>$category,'news'=>$news]);
        }

        if ($category["sort_by"]==3) {
            return view('pages.singlepage',['menuactive'=>$menuactive,'category'=>$category]);
        }
    }
	
	public function district($city, $dis)
    {
		$menuactive = $city;
		$district = district::where('slug',$dis)->first();
		$product = product::where('dis_id',$district['id'])->orderBy('id','desc')->get();
        return view('pages.product',['menuactive'=>$menuactive,'category'=>$district,'product'=>$product]);
    }

    public function singleproduct($curl,$purl,$id)
    {
		$menuactive = $curl;
        $singleproduct = product::findOrFail($id);
        $singleproduct->hits = $singleproduct->hits + 1;
        $singleproduct->save();
        $lienquan = product::where('cat_id',$singleproduct->cat_id)->whereNotin('id',[$id])->take(3)->get();
        return view('pages.singleproduct',['menuactive'=>$menuactive,'singleproduct'=>$singleproduct, 'lienquan'=>$lienquan]);
    }

    public function dangky(Request $Request)
    {
        $name = $Request->name;
        $tel = $Request->tel;
        $email = $Request->email;
        $link = $Request->link;
        $title = $Request->title;
        $content = $Request->content;
        Mail::send('email_feedback', array('name'=>$name,'tel'=>$tel,'email'=>$email,'link'=>$link,'content'=>$content), function($message){
            $message->from('quangbinh1012@gmail.com', 'bdsquangninh.com');
            $message->to('quangbinh1012@gmail.com', 'bdsquangninh.com')->subject('Thông tin khách hàng');
            
        });
        return redirect($link)->with('Alerts','Gửi thành công');
    }

    public function singlenews($nurl,$id)
    {
        $singlenews = news::find($id);
		$menuactive = $singlenews->category->slug;
        $singlenews->hits = $singlenews->hits + 1;
        $singlenews->save();
        $tinlienquan = news::where('cat_id',$singlenews->cat_id)->whereNotin('id',[$id])->take(10)->get();
        return view('pages.singlenews',['menuactive'=>$menuactive,'singlenews'=>$singlenews, 'tinlienquan'=>$tinlienquan]);
    }

    public function search(Request $Request)
    {
		$menuactive = '';
        $key = $Request->key;
        $product = product::where('name','like',"%$key%")->take(10)->paginate(10);
        $news = news::where('name','like',"%$key%")->take(10)->paginate(10);
        return view('pages.search',['menuactive'=>$menuactive,'product'=>$product,'news'=>$news,'key'=>$key]);
    }

}


