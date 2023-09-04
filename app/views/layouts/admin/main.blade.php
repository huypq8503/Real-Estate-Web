@if(isset($_SESSION['nguoi_dung']) && $_SESSION['nguoi_dung']->vai_tro_id != 1)
    {{header('location: '.BASE_URL.'404')}}
@endif
@include('layouts.admin.header')
@include('layouts.admin.spinner')
@include('layouts.admin.side_bar')
@include('layouts.admin.nav')
@include('layouts.admin.thongBao')
@yield('content')
@include('layouts.admin.footer')