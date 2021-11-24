@extends('layout.index')

@section('title')
<?php if ( $singlenews['title'] == '' ) echo $singlenews['name']; else echo $singlenews['title']; ?>
@endsection
@section('description')
<?php echo $singlenews['desc']; ?>
@endsection
@section('keywords')
<?php echo $singlenews['key']; ?>
@endsection
@section('robots')
<?php if ( $singlenews['robot'] == 0 ) echo "index, follow";  elseif ( $singlenews['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
{{asset('')}}{{$singlenews->slug}}/{{$singlenews->id}}.html
@endsection
@section('img')
http://bdsquangninh.com<?php echo $singlenews['img'] ?>@endsection

@section('content')
@include('layout.header')
<section id="body">
    <div id="product-page" class="page-body">
        <div class="breadcrumb">
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li><a href="{{asset('')}}" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
					<li><a href="{{$singlenews->category->slug}}" title="Trang chủ">{{$singlenews->category->name}}</a></li>
                    <li class="uk-active"><a href="{{$singlenews->slug}}" title="{{$singlenews->name}}">{{$singlenews->name}}</a></li>
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
                <section class="artcatalogue">
                    <section class="panel-body content">
                        <h1 class="main-title">{{$singlenews->name}}</h1>
                        {!!$singlenews->content!!}
                    </section><!-- .panel-body -->
                </section>
            </div><!-- .uk-width-larg-3-4 -->
            @include('layout.sitebar')
        </div><!-- .uk-grid -->
    </div><!-- .uk-container -->
    
</div>

</section><!-- #body -->
@endsection