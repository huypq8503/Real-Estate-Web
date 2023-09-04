@include('layouts.client.header')
@include('layouts.client.thongBao')
<body>
<div class="axil-signin-area">
    <!-- Start Header -->
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="index.html" class="site-logo"><img src="{{url('public/client/assets/images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-md-6">
                <div class="singin-header-btn">
                    <p>Bạn đã có tài khoản?</p>
                    <a href="{{url('dang-nhap')}}" class="axil-btn btn-bg-secondary sign-up-btn">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h3 class="title">Chúng tôi cung cấp những sản phẩm tốt nhất</h3>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title">Tôi là người mới</h3>
                    <p class="b2 mb--55">Nhập thông tin bên dưới</p>

                    <form method="POST" action="{{url("dang-ky-post")}}" class="singin-form">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control" name="hoTen" placeholder="Nhập tên đăng nhập">
                            @isset($_SESSION['loi']['trongHoTen'])
                                    <p style="color: red;">{{$_SESSION['loi']['trongHoTen']}}</p>
                                @unset($_SESSION['loi']['trongHoTen'])
                            @endisset
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email">
                        </div>
                        @isset($_SESSION['loi']['trongEmail'])
                            <p style="color: red;">{{$_SESSION['loi']['trongEmail']}}</p>
                            @unset($_SESSION['loi']['trongEmail'])
                        @endisset
                        @isset($_SESSION['loi']['tonTaiEmail'])
                            <p style="color: red;">{{$_SESSION['loi']['tonTaiEmail']}}</p>
                            @unset($_SESSION['loi']['tonTaiEmail'])
                        @endisset
                        @isset($_SESSION['loi']['saiEmail'])
                            <p style="color: red;">{{$_SESSION['loi']['saiEmail']}}</p>
                            @unset($_SESSION['loi']['saiEmail'])
                        @endisset
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="matKhau" placeholder="Nhập mật khẩu">
                        </div>
                        @isset($_SESSION['loi']['trongMatKhau'])
                            <p style="color: red;">{{$_SESSION['loi']['trongMatKhau']}}</p>
                            @unset($_SESSION['loi']['trongMatKhau'])
                        @endisset
                        @isset($_SESSION['loi']['loiMatKhau'])
                            <p style="color: red;">{{$_SESSION['loi']['loiMatKhau']}}</p>
                            @unset($_SESSION['loi']['loiMatKhau'])
                        @endisset
                        <div class="form-group">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Tạo tài khoản</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.client.footer_link')
