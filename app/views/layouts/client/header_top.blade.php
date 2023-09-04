<body class="sticky-header">
<a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
<!-- Start Header -->
<header class="header axil-header header-style-5">
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <!--Logo-->
                    <a href="index.html" class="logo logo-dark">
                        <img src="{{url('public/client/assets/images/logo/logo.png')}}" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.html" class="logo">
                                <img src="{{url('public/client/assets/images/logo/logo.png')}}" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu" style="float: left; clear: both;">
                            <li><a href="{{url('')}}">Trang chủ</a></li>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="about-us.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        @if(isset($_SESSION['nguoi_dung']))
                            <li>
                                <p>Xin chào: <strong>{{$_SESSION['nguoi_dung']->hoTen}}</strong></p>
                            </li>
                        @endif
                        <li class="wishlist">
                            <a href="wishlist.html">
                                <i class="flaticon-heart"></i>
                            </a>
                        </li>
                        <style>
                            .chua {
                                position: relative;
                            }

                            .con {
                                position: absolute;
                                top: -14.5px;
                                font-size: 13px;
                                right: -15.5px;
                                color: #fff;
                                width: 16px;
                                height: 16px;
                            }

                            .color {
                                position: absolute;
                                top: -11px;
                                right: -11px;
                                background-color: #1BA1F2;
                                border-radius: 1000px;
                                height: 15px;
                                width: 15px;
                            }
                        </style>
                        <li class="shopping-cart chua">
                            @if(isset($_SESSION['san_pham']))
                                <?php $soLuongSP = 0 ?>
                                @foreach($_SESSION['san_pham'] as $v)
                                    <?php $soLuongSP += $v['so_luong'] ?>
                                @endforeach
                            @endif
                            <a href="{{url('gio-hang')}}">
                                <span class="color"></span>
                                <span class="cart-count con">{{$soLuongSP}}</span>
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <ul>
                                    @if(isset($_SESSION['nguoi_dung']))
                                        @if($_SESSION['nguoi_dung']->vai_tro_id == 1)
                                            <li>
                                                <a href="{{url('admin')}}">Đăng nhập admin</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="my-account.html">Tài khoản của tôi</a>
                                        </li>
                                        <li>
                                            <a href="#">Đổi mật khẩu</a>
                                        </li>
                                        {{--                                        <li>--}}
                                        {{--                                            <a href="#">Quên mật khẩu</a>--}}
                                        {{--                                        </li>--}}
                                        <li>
                                            <a href="{{url('dang-xuat')}}">Đăng xuất</a>
                                        </li>
                                    @else
                                        <div style="text-align: center;">
                                            <a style="margin-bottom: 10px; width: 120px; font-size: 16px;"
                                               href="{{url('dang-nhap')}}" class="btn btn-outline-primary">Đăng nhập</a>
                                        </div>
                                        <div class="reg-footer text-center">
                                            <a href="{{url('dang-ky')}}" class="btn-link">Đăng ký tại đây.</a></div>
                                    @endif
                                </ul>

                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
    <div class="header-top-campaign">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>Học sinh giảm ngay 10% giá trị : <a href="#">Đến ngay</a></p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>Ưu đãi ngày 08/03 giảm 15% gá trị : <a href="#">Đến ngay</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->