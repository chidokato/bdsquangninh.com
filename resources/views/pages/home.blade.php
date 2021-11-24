@extends('layout.index')

@section('title')
<?php if ( $head_setting['title'] == '' ) echo $head_setting['name']; else echo $head_setting['title']; ?>
@endsection
@section('description')
<?php echo $head_setting['description']; ?>
@endsection
@section('keywords')
<?php echo $head_setting['keywords']; ?>
@endsection
@section('robots')
<?php if ( $head_setting['robot'] == 0 ) echo "index, follow";  elseif ( $head_setting['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
<?php echo asset(''); ?>
@endsection
@section('img')
http://bdsquangninh.com/public/upload/files/logo-qn.png
@endsection


@section('content')
@include('layout.header')
<h1 style='position: absolute;left: -999px;'>{{$head_setting['title']}}</h1>
<section id="body">
    <section class="main-slide">
        <div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 7500, animation: 'random-fx'}">
            <ul class="uk-slideshow">
                @foreach($home_slide as $val)
                <li>
					<a href='{{$val->link}}'>
						<img style='width: 100%;' src="{{$val->img}}" alt="{{$val->name}}" />
					</a>
				</li>
                @endforeach
            </ul>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                <?php $i = 0; ?>
                @foreach($home_slide as $val)
                <li data-uk-slideshow-item="{{$i}}"><a href="#"></a></li>
                <?php $i = $i+1; ?>
                @endforeach
            </ul>
        </div>
    </section><!-- .main-slide -->
    <div id="homepage" class="page-body">
        <div class="uk-container uk-container-center">
            <div class="uk-grid ">
                <div class="uk-width-large-3-4">
                    <section class="homepage-category">
                        <header class="panel-head uk-flex uk-flex-middle">
                            <h2 class="heading"><a href="" title="Dự án nổi bật">Dự án nổi bật</a></h2>
                        </header>
                        <section class="panel-body">
                            <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 list-product" data-uk-grid-match="{target:'.title'}">
                                @foreach($hotproduct as $val)
                                <li>
                                    <div class="product">
                                        <div class="thumb"><a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a><span class='price'><strong>Giá:</strong><i>{{$val->price}}</i></span></div>
                                        <div class="infor">
                                            <h3 class="title"><a href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h3>
                                            <span title='{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}'>{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}</span>
                                        </div>
										
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </section><!-- .panel-body -->
                    </section><!-- .homepage-category -->
                    
                    <section class="homepage-category">
                        <header class="panel-head uk-flex uk-flex-middle">
                            <h2 class="heading"><a href='du-an-bds'>Dự án bất động sản</a></h2>
                        </header>
                        <section class="panel-body">
                            <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 list-product" data-uk-grid-match="{target:'.title'}">
                                @foreach($home_product as $val)
                                <li>
                                    <div class="product">
                                        <div class="thumb"><a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a><span class='price'><strong>Giá:</strong><i>{{$val->price}}</i></span></div>
                                        <div class="infor">
                                            <h3 class="title"><a href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h3> 
                                            <span title='{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}'>{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </section><!-- .panel-body -->
                    </section><!-- .homepage-category -->
                    
                </div>
                <div class="uk-width-large-1-4 uk-visible-large">
                    <aside class="aside" >
                        <section class="aside-prd-detail aside-whyus">
                            <div class='prd-detail'>
                                <div class="call-groups">
                                    <a class="btn uk-flex uk-flex-middle uk-flex-space-between" href="tel:{{$head_setting->hotline}}" title="Showroom 1">
                                        <div class="text">
                                            <span class="title">{{$head_setting->hotline}}</span>
                                        </div>
                                    </a>
									@if($head_setting['hotline1'])
                                    <a class="btn uk-flex uk-flex-middle uk-flex-space-between" href="tel:{{$head_setting->hotline1}}" title="Showroom 2">
                                        <div class="text">
                                            <span class="title">{{$head_setting->hotline1}}</span>
                                        </div>
                                    </a>
									@endif
                                </div>
                            </div>
                        </section><!-- .aside-prd-detail -->
						
						@foreach($head_city as $val)  
						<section class="aside-prd-detail">
                            <header class="panel-head">
                                <h3 class="heading"><span>{{$val->name}}</span></h3>
                            </header>
                            <section class="panel-body">
                                <ul class="uk-list list">
									@foreach($val->district as $val1)
                                    <li style='padding: 5px; border-bottom: dashed 1px #ddd;'><a href='location/{{$val1->city->slug}}/{{$val1->slug}}'>{{$val1->name}}</a></li>
									@endforeach
                                </ul>
                            </section>
                        </section><!-- .aside-prd-detail -->
						@endforeach
						
                        <section class="aside-prd-detail aside-product">
                            <header class="panel-head">
                                <h3 class="heading"><span>Tin tức mới nhất</span></h3>
                            </header>
                            <section class="panel-body">
                                <ul class="uk-list list-product">
                                    @foreach($news as $val)                                                           
                                    <li>
                                        <div class="product uk-clearfix">
                                            <div class="thumb">
                                                <a class="image img-cover" href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}"></a>
                                            </div>
                                            <div class="infor">
                                                <h4 class="title"><a href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h4>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </section>
                        </section><!-- .aside-panel -->

                        <section class="aside-prd-detail aside-product">
                            <header class="panel-head">
                                <h3 class="heading"><span>Đăng ký tải tài liệu dự án</span></h3>
                            </header>
                            <section class="panel-body">
                                <form class="dangky" action="dang-ky" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}" />
									<input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
									<p style="text-align: center;"><input required name="name" style="width: 100%;" type="text" placeholder="Họ & Tên *"></p>
									<p style="text-align: center;"><input required name="email" style="width: 100%;" type="mail" placeholder="Địa chỉ Email *"></p>
									<p style="text-align: center;"><input required name="tel" style="width: 100%;" type="tel" placeholder="Số điện thoại *"></p>
									<p style="text-align: center;"><input type="submit" value="ĐĂNG KÝ"></p>
								</form>
                            </section>
                        </section><!-- .aside-panel -->
						
						<div class="fb-page" data-href="https://www.facebook.com/Đất-Xanh-Ba-Miền-1617653191606773/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Đất-Xanh-Ba-Miền-1617653191606773/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Đất-Xanh-Ba-Miền-1617653191606773/">Đất Xanh Ba Miền</a></blockquote></div>
						
                    </aside>
                </div>
            </div>
            
            
            <section class="actual-products">
                <header class="panel-head">
                    <h2 class="heading-1"><a href="su-kien-mo-ban" title="Sản phẩm thực tế">Sự kiện mở bán</a></h2>
                </header>
                <section class="panel-body">
                    <div class="uk-slidenav-position slider" data-uk-slider="{autoplay: true, autoplayInterval: 10500}">
                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 list-article" data-uk-grid-match="{target:'.title'}" >
                                @foreach($moban as $val)
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a>
                                        </div>
                                        <div class="infor">
                                            <h3 class="title"><a href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h3>
                                            <div class="description">{{$val->detail}}</div>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- .slider -->
                </section><!-- .panel-body -->
            </section><!-- .actual-products -->
            
                      
            <section class="homepage-featured-news">
                <header class="panel-head">
                    <h2 class="heading-1"><a href="tin-du-an" title="Tin tức">Tin tức bất động sản</a></h2>
                </header>
                <section class="panel-body">
                    <ul class="uk-grid lib-grid-20 uk-grid-width-large-1-2 list-article">
                        @foreach($tintuc as $val)
                        <li>
                            <article class="article uk-clearfix">
                                <div class="thumb">
                                    <a class="image img-cover img-zoomin" href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a>
                                </div>
                                <div class="infor">
                                    <div class="meta"><i class="fa fa-clock-o"></i> {{$val->date}}</div>
                                    <h3 class="title"><a href="{{$val->slug}}/{{$val->id}}.html" title="">{{$val->name}}</a></h3>
                                    <div class="description">{{$val->detail}}</div>
                                    <div class="viewmore"><a href="{{$val->slug}}/{{$val->id}}.html" title="Xem thêm">Xem thêm <i class="fa fa-angle-double-right"></i></a></div>
                                </div>
                            </article><!-- .article -->
                        </li>
                        @endforeach
                    </ul><!-- .list-article -->
                </section><!-- .panel-body -->
            </section><!-- .homepage-featured-news -->

            <section style='margin-bottom: 50px;'>
                <header class="panel-head">
                    <h2 class="heading-1"><a href="san-pham-thuc-te.html" title="Sản phẩm thực tế">Đối tác đầu tư</a></h2>
                </header>
                <section class="panel-body">
                    <div class="uk-slidenav-position slider" data-uk-slider="{autoplay: true, autoplayInterval: 10500}">
                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid lib-grid-20 uk-grid-width-1-4 uk-grid-width-medium-1-4 uk-grid-width-large-1-6 list-article" data-uk-grid-match="{target:'.title'}" >
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-1.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-2.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-3.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-4.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-5.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-6.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                            </ul>
                        </div>
                    </div><!-- .slider -->
                </section><!-- .panel-body -->
            </section><!-- .actual-products -->

        </div><!-- .uk-container -->
    </div><!-- .page-body -->   
</section><!-- #body -->
@endsection
