@include('layouts.client.header')
@include('layouts.client.thongBao')
<body>
<div class="axil-signin-area">

    <!-- Start Header -->
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <a href="index.html" class="site-logo"><img src="{{url('public/client/assets/images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-sm-8">
                <div class="singin-header-btn">
                    <p>Bạn chưa đăng ký?</p>
                    <a href="{{url('dang-ky')}}" class="axil-btn btn-bg-secondary sign-up-btn">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--9">
                <h3 class="title">Chúng tôi cung cấp những sản phẩm tốt nhất</h3>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title">Đăng nhập</h3>
                    <p class="b2 mb--55">Nhập thông tin bên dưới</p>
                    <form method="POST" action="{{url('dang-nhap-post')}}" class="singin-form">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Mời nhập email">
                            @isset($_SESSION['loi']['trongEmail'])
                                <p style="color: red;">{{$_SESSION['loi']['trongEmail']}}</p>
                                @unset($_SESSION['loi']['trongEmail'])
                            @endisset
                            @isset($_SESSION['loi']['saiEmail'])
                                <p style="color: red;">{{$_SESSION['loi']['saiEmail']}}</p>
                                @unset($_SESSION['loi']['saiEmail'])
                            @endisset
                            @isset($_SESSION['loi']['emailChuaDangKy'])
                                <p style="color: red;">{{$_SESSION['loi']['emailChuaDangKy']}}</p>
                                @unset($_SESSION['loi']['emailChuaDangKy'])
                            @endisset
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="matKhau" placeholder="Mời nhập mật khẩu">
                            @isset($_SESSION['loi']['trongMatKhau'])
                                <p style="color: red;">{{$_SESSION['loi']['trongMatKhau']}}</p>
                                @unset($_SESSION['loi']['trongMatKhau'])
                            @endisset
                            @isset($_SESSION['loi']['saiMatKhau'])
                                <p style="color: red;">{{$_SESSION['loi']['saiMatKhau']}}</p>
                                @unset($_SESSION['loi']['saiMatKhau'])
                            @endisset
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Đăng nhập</button>
{{--                            <a href="forgot-password.html" class="forgot-btn">Forget password?</a>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.client.footer_link')