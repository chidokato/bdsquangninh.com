@extends('layout.index')

@section('title')
<?php if ( $category['title'] == '' ) echo $category['name']; else echo $category['title']; ?>
@endsection
@section('description')
<?php echo $category['desc']; ?>
@endsection
@section('keywords')
<?php echo $category['key']; ?>
@endsection
@section('robots')
<?php if ( $category['robot'] == 0 ) echo "index, follow";  elseif ( $category['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
<?php echo asset('').$category['slug']; ?>
@endsection
@section('img')
http://bdsquangninh.com/public/upload/files/logo-qn.png
@endsection

@section('content')
@include('layout.header')
<section id="body">
    
    
    <div id="product-page" class="page-body">
        <div class="breadcrumb">
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li><a href="{{asset('')}}" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                                    
                    <li class="uk-active"><a title="{{$category->name}}">{{$category->name}}</a></li>
                </ul>
            </div>
        </div><!-- .breadcrumb -->
    <div class="uk-container uk-container-center">
        <div class="uk-grid ">
            
            <div class="uk-width-large-3-4">
                <!--script type="text/javascript">
                    $(document).ready(function() {
                        var wd_width = $(window).width();
                        if(wd_width > 600) {
                            $('.prdcatalogue-desc .article').readmore({
                              collapsedHeight: 210,
                              lessLink: '<a class="readmore-btn" href="#">Ẩn đi <i class="fa fa-angle-double-right"></i></a>',
                              moreLink: '<a class="readmore-btn open" href="#">Xem thêm <i class="fa fa-angle-double-right"></i></a>'
                            });
                        }else {
                            $('.prdcatalogue-desc .article').readmore({
                              collapsedHeight: 340,
                              lessLink: '<a class="readmore-btn" href="#">Ẩn đi <i class="fa fa-angle-double-right"></i></a>',
                              moreLink: '<a class="readmore-btn open" href="#">Xem thêm <i class="fa fa-angle-double-right"></i></a>'
                            });
                        }
                    });
                </script-->
                <section class="prdcatalogue">
                    <header class="panel-head">
                        <h1 class="heading-2"><span>{{$category->name}}</span></h1>
                    </header>
                    <section class="panel-body">
                        <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-3 list-product">
                            @foreach($product as $val)
                            <li>
                                <div class="product">
                                    <div class="thumb">
										<a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">
											<img src="{{$val->img}}" alt="{{$val->name}}" />
										</a>
										<span class='price'><strong>Giá:</strong><i>{{$val->price}}</i></span>
									</div>
                                    <div class="infor">
                                        <h2 class="title"><a href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h2>
                                        <span title='{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}'>{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}</span>
                                    </div>
									
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </section><!-- .panel-body -->
                    <footer class="panel-foot">
                                   
                    </footer>
                </section><!-- .prdcatalogue -->
            </div><!-- .uk-width-larg-3-4 -->
            @include('layout.sitebar')
        </div><!-- .uk-grid -->
    </div><!-- .uk-container -->
    
</div>

</section><!-- #body -->

@endsection