<?php

use Phroute\Phroute\RouteCollector;
use App\Controllers\Admin\LoaiController;
use App\Controllers\Admin\SanPhamController;
use App\Controllers\Admin\NguoiDungController;
use App\Controllers\Admin\HoaDonController;
use App\Controllers\Client\TaiKhoanController;
use App\Controllers\Client\GioHangController;
use App\Controllers\Client\TrangChuController;
use App\Views\Lib\Page\Pages;
use App\Views\Lib\Search\Search;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

// bắt đầu định nghĩa ra các đường dẫn
//Trang chủ client
$router->get('/',[TrangChuController::class,'trangChu']);

//Kiểm tra vai trò
$router->get('404',[NguoiDungController::class,'vaiTroFalse']);

//Tài khoản
//Đăng ký
$router->get('dang-ky',[TaiKhoanController::class,'dangKy']);
$router->post('dang-ky-post',[TaiKhoanController::class,'dangKyPost']);
//Đăng nhập
$router->get('dang-nhap',[TaiKhoanController::class,'dangNhap']);
$router->post('dang-nhap-post',[TaiKhoanController::class,'dangNhapPost']);
$router->get('dang-xuat',[TaiKhoanController::class,'dangXuat']);

//Giỏ hàng
//Danh sách
$router->get('gio-hang',[GioHangController::class,'gioHang']);
//Thêm vào giỏ hàng
$router->post('gio-hang-post',[GioHangController::class,'gioHangPost']);
//Thêm sl sp
$router->get('them-sl/{id}',[GioHangController::class,'themSlSp']);
//Trừ sl sp
$router->get('tru-sl/{id}',[GioHangController::class,'truSlSp']);
//Xóa giỏ hàng
$router->get('xoa-gio-hang/{id}',[GioHangController::class,'xoaGioHang']);
//Thanh toán
$router->get('thanh-toan',[GioHangController::class,'thanhToan']);
//Thêm vào hóa đơn
$router->post('hoa-don',[GioHangController::class,'hoaDon']);
//Chi tiết sản phẩm
$router->get('chi-tiet-san-pham/{id}',[GioHangController::class,'chiTietSanPham']);

//Pages
$router->get('pages/{i}/{tieuDe}/{title}/{table}/{duong_dan}',[Pages::class,'load_trang']);

//Search
$router->get('search/{i}/{tieuDe}/{title}/{table}/{duong_dan}',[Search::class,'hien_thi']);

//Admin loại
//Admin trang chủ
$router->get('admin/',[LoaiController::class,'hien_thi_ds']);
//Danh sách
$router->get('admin/loai',[LoaiController::class,'hien_thi_ds']);
//Thêm loại
$router->get('admin/loai/them-loai',[LoaiController::class,'them_loai']);
//Xử lý thêm
$router->post('admin/loai/them-loai-post',[LoaiController::class,'xu_ly_them']);
//Sửa loại
$router->get('admin/loai/sua-loai/{i}/{id}',[LoaiController::class,'sua_loai']);
//Xử lý sửa loại
$router->post('admin/loai/sua-loai-post/{i}/{id}/{tenCu}',[LoaiController::class,'xu_ly_sua']);
//Xóa loại
$router->post('admin/loai/xoa-loai/{i}',[LoaiController::class,'xoa_loai']);

//Admin sản phẩm
//Danh sách
$router->get('admin/san-pham',[SanPhamController::class,'danhSach']);
//Thêm sản phẩm
$router->get('admin/san-pham/them-san-pham',[SanPhamController::class,'themSanPham']);
//Xử lý thêm
$router->post('admin/san-pham/them-san-pham-post',[SanPhamController::class,'themSanPhamPost']);
//Sửa sản phẩm
$router->get('admin/san-pham/sua-san-pham/{i}/{id}',[SanPhamController::class,'suaSanPham']);
//Xử lý sửa sản phẩm
$router->post('admin/san-pham/sua-san-pham-post/{i}/{id}/{tenCu}',[SanPhamController::class,'suaSanPhamPost']);
//Xóa sản phẩm
$router->post('admin/san-pham/xoa-san-pham/{i}',[SanPhamController::class,'xoaSanPham']);

//Admin người dùng
//Danh sách
$router->get('admin/nguoi-dung',[NguoiDungController::class,'danhSach']);
//Thêm người dùng
$router->get('admin/nguoi-dung/them-nguoi-dung',[NguoiDungController::class,'themNguoiDung']);
//Xử lý thêm
$router->post('admin/nguoi-dung/them-nguoi-dung-post',[NguoiDungController::class,'themNguoiDungPost']);
//Sửa người dùng
$router->get('admin/nguoi-dung/sua-nguoi-dung/{i}/{id}',[NguoiDungController::class,'suaNguoiDung']);
//Xử lý sửa người dùng
$router->post('admin/nguoi-dung/sua-nguoi-dung-post/{i}/{id}',[NguoiDungController::class,'suaNguoiDungPost']);
//Xóa người dùng
$router->post('admin/nguoi-dung/xoa-nguoi-dung/{i}',[NguoiDungController::class,'xoaNguoiDung']);

//Admin hóa đơn
//Danh sách
$router->get('admin/hoa-don',[HoaDonController::class,'danhSach']);
//Sửa hóa đơn
$router->get('admin/hoa-don/sua-hoa-don/{i}/{id}',[HoaDonController::class,'suaHoaDon']);
//Xử lý sửa
$router->post('admin/hoa-don/sua-hoa-don-post/{i}/{id}',[HoaDonController::class,'suaHoaDonPost']);


# NB. You can cache the return value from $router->getData() so you don't have to create the routes
# each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>