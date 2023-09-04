<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\NguoiDung;
class NguoiDungController extends BaseController{
    protected $nguoiDung;

    public function __construct()
    {
        $this->nguoiDung = new NguoiDung();
    }

    //Kiểm tra vai trò
    public function vaiTroFalse(){
        $this->render('client.error');
    }

    //Danh sách người dùng
    public function danhSach(){
        $all = $this->nguoiDung->LoadAllNguoiDung('nguoi_dung',0,10);
        $title = "Danh sách người dùng";
        $tieuDe = "Danh sách người dùng";
        $table = "nguoi_dung";
        $duong_dan = 'admin.nguoiDung.danhSach';
        $i = 0;
        $this->render($duong_dan,
            compact('all', 'title', 'tieuDe', 'table', 'duong_dan','i'));
    }

    //Thêm người dùng
    public function themNguoiDung(){
        $title = "Thêm sản phẩm";
        $tieuDe = "Thêm sản phẩm";
        $this->render('admin.nguoiDung.them',compact( 'title', 'tieuDe'));
    }

    //Xử lý thêm người dùng
    public function themNguoiDungPost(){
        if(isset($_POST['dong_y'])){
            $hoTen = $_POST['hoTen'];
            $email = $_POST['email'];
            $matKhau = $_POST['matKhau'];
            $nhapLaiMatKhau = $_POST['nhapLaiMatKhau'];
            $vai_tro_id = $_POST['vai_tro_id'];
            $mh_matKhau = password_hash($matKhau,PASSWORD_DEFAULT);

            $errors = [];

            if(strlen(trim($hoTen)) == 0){
                $errors[] = "Họ tên không được để trống!";
            }

            if(strlen(trim($email)) == 0){
                $errors[] = "Email không được để trống!";
            }else{
                if($this->nguoiDung->checkEmaill($email)){
                    $checkEmail = $this->nguoiDung->checkEmail($email);
                    if($checkEmail){
                        $errors[] = "Email đã được đăng ký!";
                    }
                }else{
                    $errors[] = "Email sai định dạng!";
                }
            }

            if(strlen(trim($matKhau)) == 0){
                $errors[] = "Mật khẩu không được để trống!";
            }else{
                if(!$this->nguoiDung->checkMatKhau($matKhau)){
                    $errors[] = "Mật khẩu phải tối thiểu 8 ký tự và ít nhất 1 chữ cái, 1 số!";
                }
            }

            if(strlen(trim($nhapLaiMatKhau)) == 0){
                $errors[] = "Nhập lại mật khẩu không được để trống!";
            }else{
                if($matKhau != $nhapLaiMatKhau){
                    $errors[] = "Mật khẩu không trùng khớp!";
                }
            }

            if(count($errors) > 0){
                $_SESSION['errors'] = $errors;
                header('location: '.BASE_URL."admin/nguoi-dung/them-nguoi-dung");
            }else{
                $result = $this->nguoiDung->dangKy($hoTen,$email,$mh_matKhau,$vai_tro_id);
                if($result){
                    $_SESSION['thong_bao'] = "Thêm người dùng thành công!";
                    header('location: '.BASE_URL."admin/nguoi-dung/them-nguoi-dung");
                }
            }
        }
    }

    //Sửa người dùng
    public function suaNguoiDung($i,$id){
        if(isset($id)){
            $title = "Sửa người dùng";
            $tieuDe = "Sửa người dùng";
            $title_p = "Danh sách người dùng";
            $tieuDe_p = "Danh sách người dùng";
            $table = "nguoi_dung";
            $duong_dan = 'admin.nguoiDung.danhSach';
            $load_one = $this->nguoiDung->loadOneNguoiDung('nguoi_dung',$id);
            $this->render('admin.nguoiDung.sua',
                compact('title','tieuDe','title_p','tieuDe_p','table','duong_dan',
                    'load_one','i'));
        }
    }

    //Xử lý sửa người dùng
    public function suaNguoiDungPost($i,$id){
        if(isset($_POST['dong_y'])){
            $hoTen = $_POST['hoTen'];
            $vai_tro_id = $_POST['vai_tro_id'];

            $errors = [];

            if(strlen(trim($hoTen)) == 0){
                $errors[] = "Họ tên không được để trống!";
            }

            if(count($errors) > 0){
                $_SESSION['errors'] = $errors;
                header('location: ' . url('admin/nguoi-dung/sua-nguoi-dung/'.$i.'/'.$id));
                die();
            }else{
                $this->nguoiDung->suaNguoiDung($id,$hoTen,$vai_tro_id);
                $_SESSION['thong_bao'] = "Cập nhật thành công!";
                header('location: ' . url('admin/nguoi-dung/sua-nguoi-dung/'.$i.'/'.$id));
            }
        }
    }

    //Xóa người dùng
    public function xoaNguoiDung($i){
        if (isset($_POST['dong_y'])) {
            $title = "Danh sách người dùng";
            $tieuDe = "Danh sách người dùng";
            $table = "nguoi_dung";
            $duong_dan = 'admin.nguoiDung.danhSach';
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                foreach ($id as $v) {
                    $this->nguoiDung->delete('nguoi_dung', 'id', $v);
                }
                $_SESSION['thong_bao'] = "Xóa thành công!";
                header('location: ' . BASE_URL . "pages/$i/$tieuDe/$title/$table/$duong_dan");
            } else {
                $_SESSION['thong_bao'] = "Không có mục nào được xóa!";
                header('location: ' . BASE_URL . "pages/$i/$tieuDe/$title/$table/$duong_dan");
            }
        }
    }
}