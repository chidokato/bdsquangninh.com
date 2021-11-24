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
                    <li class="uk-active"><a href="{{$category->slug}}" title="{{$category->name}}">{{$category->name}}</a></li>
                </ul>
            </div>
        </div>
		<div class="uk-container uk-container-center">
			<div class="uk-grid ">
				<div class="uk-width-large-3-4">
					<section class="artcatalogue">
						<section class="panel-body content">
							<h1 class="main-title">{{$category->title}}</h1>
							{!!$category->content!!}
						</section>
					</section>
				</div>
				@include('layout.sitebar')
			</div>
		</div>
	</div>
</section>
@endsection