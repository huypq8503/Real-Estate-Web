<?php
namespace App\Models\Client;

use App\Models\BaseModel;
class TaiKhoan extends BaseModel{
    //Check email
    public function checkEmail($email){
        $sql = "select email from nguoi_dung where email = '$email'";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    //validate email
    public function checkEmaill($email)
    {
        return (bool)preg_match ("/^\\S+@\\S+\\.\\S+$/", $email);
    }

    //validate mật khẩu
    public function checkMatKhau($matKhau){
        return (bool)preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$matKhau);
    }

    //đăng ký
    public function dangKy($hoTen,$email,$matKhau,$vai_tro_id){
        $sql = "insert into nguoi_dung(hoTen,email,matKhau,vai_tro_id) values (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$hoTen,$email,$matKhau,$vai_tro_id]);
    }

    //đăng nhập
    public function dangNhap($email){
        $sql = "SELECT * FROM nguoi_dung A INNER JOIN vai_tro B ON A.vai_tro_id = B.id WHERE A.email = ?";
        $this->setQuery($sql);
        return $this->loadRow([$email]);
    }
}