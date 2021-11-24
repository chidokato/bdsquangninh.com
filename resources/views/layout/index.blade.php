<!DOCTYPE HTML>
<html lang="vi-VN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<base href="{{asset('')}}">
<!-- seo -->
<title>@yield('title')</title>
<meta name="description" content="@yield('description')"/>
<meta name="keywords" itemprop="keywords" content="@yield('keywords')" />
<meta name="news_keywords" content="@yield('keywords')" />
<meta name="robots" content="@yield('robots')"/>
<link rel="shortcut icon" href="{{$head_setting->img}}" />
<link rel="canonical" href="@yield('url')"/>
<link rel="alternate" href="{{asset('')}}" hreflang="vi-vn" />
<!-- and seo -->
<!-- og -->
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:url" content="@yield('url')" />
<meta property="og:site_name" content="site_name" />
<meta property="og:images" content="@yield('img')" />
<!-- and og -->
<!-- twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:images" content="@yield('img')" />
<!-- and twitter -->

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="article:author" content="admin" />

<!-- css -->
<link href="fondend/templates/acore/core.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/uikit/css/uikit.modify.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/library/css/reset.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/library/css/library.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/uikit/css/components/slideshow.min.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/plugins/lightslider-master/dist/css/lightslider.min.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/style.css" rel="stylesheet" />
<script src="fondend/templates/frontend/resources/library/js/jquery.js"></script>
<script src="fondend/templates/frontend/resources/uikit/js/uikit.min.js"></script>
<!-- and css -->
<!-- ananytisc -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '{{$head_setting->analytics}}', 'auto');
  ga('send', 'pageview');

</script>
<!-- ananytisc -->
<!-- facebook -->
<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId={{$head_setting->fb_app_id}}";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<!-- facebook -->
@yield('css')
<!-- js -->
<!-- and js -->
{!! $head_setting->code_header !!}
</head>

@include('layout.function')

<body>

{!! $head_setting->code_body !!}



@yield('content')
  
@include('layout.footer')

@yield('script')

</body>
</html>