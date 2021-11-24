<header class="pc-header uk-visible-large">
	<!--section class="topbar">
		<div class="uk-container uk-container-center">
			<div class="uk-flex uk-flex-middle uk-flex-space-between container">
				<ul class="uk-list uk-flex uk-flex-middle hd-contact">
					<li class="location"><span><i class="fa fa-map-marker"></i>{{$head_setting->address}}</span></li>
					<li class="email"><span><i class="fa fa-envelope"></i> <a href="mailto:{{$head_setting->email}}" title="Email">{{$head_setting->email}}</a></span></li>
				</ul>
				<div class="page-social">
					<ul class="uk-list uk-clearfix">
						<li class="facebook"><a href="{{$head_setting->facebook}}" title="facebook" target="_blank">facebook</a></li>
						<li class="twitter"><a href="#" title="twitter" target="_blank">twitter</a></li>
						<li class="google"><a href="#" title="google plus" target="_blank">google plus</a></li>
						<li class="pinterest"><a href="#" title="pinterest" target="_blank">pinterest</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section-->
	<section class="upper">
		<div class="uk-container uk-container-center">
			<div class="uk-flex uk-flex-middle uk-flex-space-between container">
				@foreach($head_logo as $val)
				<div class="logo" itemscope itemtype="http://schema.org/Hotel">
					<a itemprop="url" href="{{asset('')}}" title="{{$val->name}}">
						<img src="{{$val->img}}" style='height: 80px;' alt="{{$val->name}}" itemprop="logo" />
					</a>
					<span class="uk-hidden">{{$val->name}}</span>
				</div>
				@endforeach
				<div class="hd-search header-search">
					<form action="tim-kiem" method="POST" class="uk-form form">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="text" name="key" class="uk-width-1-1 input-text keyword" placeholder="Tìm kiếm sản phẩm..." />
						<button type="submit" name="" class="btn-submit">Tìm kiếm</button>
					</form>
					<div class="searchResult"></div>
				</div>
				<div class="hd-hotline">
					<span class="label">Hotline</span>
					<a class="number" href="tel:{{$head_setting->hotline}}" title="Hotline">{{$head_setting->hotline}}</a>
				</div>
			</div><!-- .container -->
		</div>
	</section><!-- .upper -->
	<div style='background-color: #2b5aa6;'>
	<section class="lower" data-uk-sticky="{top: 0}">
		<div class="uk-container uk-container-center">
			<nav class="main-nav">
				<ul class="uk-navbar-nav uk-clearfix main-menu">
					<li class=' @if($menuactive == '') active @endif'>
                        <a href="{{asset('')}}">Trang chủ</a>
                    </li>
					@foreach($head_category as $item)
                        @if($item['parent'] == 0)
                            <li class=' @if($menuactive == $item->slug) active @endif'>
                                <a href="{{$item->slug}}">{{$item->name}}</a>
                                <?php $count = DB::table('tbl_category')->where('parent',$item->id)->count(); ?>
                                <?php if($count>0) { subcategory ($head_category,$item['id']); } ?>
                            </li>
                        @endif
                    @endforeach
                    <li class=" @if($menuactive == 'contact') active @endif ">
                        <a href="lien-he">Liên hệ</a>
                    </li>
				</ul>
			</nav><!-- .main-nav -->		
		</div>
	</section><!-- .lower -->
	</div>
</header><!-- .header -->


<!-- MOBILE HEADER -->
<header class="mobile-header uk-hidden-large">
	<section class="upper">
		<a class="moblie-menu-btn skin-1" href="#offcanvas" class="offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
			<span>Menu</span>
		</a>
		<div class="logo">
			@foreach($head_logo as $val)
			<a href="{{asset('')}}" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a>
			@endforeach
		</div>
		<a class="mobile-hotline" href="tel: {{$head_setting->hotline}}" title="Hotline">
			<span class="label">Hotline: </span>
			<span class="value">{{$head_setting->hotline}}</span>
		</a>
	</section><!-- .upper -->
	<section class="lower">
		<div class="mobile-search header-search">
			<form action="#" method="" class="uk-form form">
				<input type="text" name="" class="uk-width-1-1 input-text keyword" placeholder="Bạn muốn tìm gì hôm nay?" />
				<button type="submit" name="" value="" class="btn-submit">Tìm kiếm</button>
			</form>
			<div class="searchResult"></div>
		</div>
	</section>
</header><!-- .mobile-header -->