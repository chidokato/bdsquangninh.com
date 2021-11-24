@extends('layout.index')

@section('title')
Liên hệ
@endsection
@section('description')

@endsection
@section('keywords')

@endsection
@section('robots')
noindex, nofollow
@endsection
@section('url')
<?php echo asset('').'lien-he'; ?>
@endsection

@section('content')
@include('layout.header')
<section id="body">
    <div id="product-page" class="page-body">
        <div class="breadcrumb">
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li><a href="{{asset('')}}" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li class="uk-active"><a href="lien-he" title="Liên hệ">Liên hệ</a></li>
                </ul>
            </div>
        </div><!-- .breadcrumb -->
        <div class="uk-container uk-container-center">
            <div class="uk-grid ">
                <div class="uk-width-large-2-4">
                    <p>Vui lòng nhập đầy đủ thông tin để chúng tôi có thể tư vấn cho quý khách đầy đủ và chi tiết nhất !!</p>
                    <div class="hd-search header-search">
                        <form action="dang-ky" method="POST" class="uk-form form">
							<input type="hidden" name="_token" value="{{csrf_token()}}" />
							<input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
                            <input type="text" name="name" class="uk-width-1-1 input-text" placeholder="Họ & Tên ...">
                            <br>
                            <input type="text" name="tel" class="uk-width-1-1 input-text" placeholder="Số điện thoại ...">
                            <br>
                            <input type="text" name="email" class="uk-width-1-1 input-text" placeholder="Địa chỉ email...">
                            <br>
                            <textarea name="content" style="margin: 0px; width: 414px; height: 105px;" class="uk-width-1-1 input-text keyword" placeholder='Ghi chú' ></textarea>
                            <br>
                            <input style='background-color: red; border: none; color: #fff; padding: 7px 15px;' type="submit" name="btnsubmit" class="btnsubmit" value="GỬI ĐI">

                        </form>
                        <div class="searchResult"></div>
                    </div>
                </div><!-- .uk-width-larg-3-4 -->
                <div class="uk-width-large-2-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d465.75332728186356!2d107.08265397228129!3d20.95144616692172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a583e9262d347%3A0x564acbf9006c4623!2zMTU4IEzDqiBUaMOhbmggVMO0bmcsIFAuIELhuqFjaCDEkOG6sW5nLCBUaMOgbmggcGjhu5EgSOG6oSBMb25nLCBRdeG6o25nIE5pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1545203732221" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div><!-- .uk-grid -->
        </div><!-- .uk-container -->
    </div>
</section><!-- #body -->
<br>
@endsection
