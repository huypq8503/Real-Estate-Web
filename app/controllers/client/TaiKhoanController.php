<?php
namespace App\Controllers\Client;

use App\Models\Client\TaiKhoan;
use App\Controllers\BaseController;

class TaiKhoanController extends BaseController{
    protected $taiKhoan;

    public function __construct()
    {
        $this->taiKhoan = new TaiKhoan();
    }

    //Đăng ký
    public function dangKy(){
        $this->render('client.dangKy');
    }

    //Xử lý đăng ký
    public function dangKyPost(){
        $hoTen = $_POST['hoTen'];
        $email = $_POST['email'];
        $matKhau = $_POST['matKhau'];
        $mh_matKhau = password_hash($matKhau,PASSWORD_DEFAULT);
        $vai_tro_id = 2;
        $errors = [];

        if(strlen(trim($hoTen)) == 0){
            $errors['trongHoTen'] = "Họ tên không được để trống!";
        }

        if(strlen(trim($email)) == 0){
            $errors['trongEmail'] = "Email không được để trống!";
        }else{
            if($this->taiKhoan->checkEmaill($email)){
                $checkEmail = $this->taiKhoan->checkEmail($email);
                if($checkEmail){
                    $errors['tonTaiEmail'] = "Email đã được đăng ký!";
                }
            }else{
                $errors['saiEmail'] = "Email sai định dạng!";
            }
        }

        if(strlen(trim($matKhau)) == 0){
            $errors['trongMatKhau'] = "Mật khẩu không được để trống!";
        }else{
            if(!$this->taiKhoan->checkMatKhau($matKhau)){
                $errors['loiMatKhau'] = "Mật khẩu phải tối thiểu 8 ký tự và ít nhất 1 chữ cái, 1 số!";
            }
        }

        if(count($errors) > 0){
            $_SESSION['loi'] = $errors;
            header('location: '.BASE_URL."dang-ky");
        }else{
            $result = $this->taiKhoan->dangKy($hoTen,$email,$mh_matKhau,$vai_tro_id);
            if($result){
                $_SESSION['thong_bao'] = "Bạn đã đăng ký thành công";
                header('location: '.BASE_URL."dang-nhap");
            }
        }
    }

    //Đăng nhập
    public function dangNhap(){
        $this->render('client.dangNhap');
    }

    //Xử lý đăng nhập
    public function dangNhapPost(){
        $email = $_POST['email'];
        $matKhau = $_POST['matKhau'];
        $checkDangNhap = $this->taiKhoan->dangNhap($email);
        $errors = [];

        if(strlen(trim($email)) == 0){
            $errors['trongEmail'] = "Email không được để trống!";
        }else{
            if($this->taiKhoan->checkEmaill($email)){
                $checkEmail = $this->taiKhoan->checkEmail($email);
                if(!$checkEmail){
                    $errors['emailChuaDangKy'] = "Email chưa đăng ký!";
                }
            }else{
                $errors['saiEmail'] = "Email sai định dạng!";
            }
        }

        if(strlen(trim($matKhau)) == 0){
            $errors['trongMatKhau'] = "Mật khẩu không được để trống!";
        }else{
            if(!password_verify($matKhau,$checkDangNhap->matKhau)){
                $errors['saiMatKhau'] = "Mật khẩu không chính xác!";
            }
        }

        if(count($errors) > 0){
            $_SESSION['loi'] = $errors;
            header('location: '.BASE_URL."dang-nhap");
        }else{
            $_SESSION['nguoi_dung'] = $checkDangNhap;
            $_SESSION['thong_bao'] = "Đăng nhập thành công";
            header('location: '.BASE_URL);
        }
    }

    //Đăng xuất
    public function dangXuat(){
        if($_SESSION['nguoi_dung']){
            unset($_SESSION['nguoi_dung']);
            $_SESSION['thong_bao'] = "Đã đăng xuất!";
            header('location: '.BASE_URL);
        }
    }
}