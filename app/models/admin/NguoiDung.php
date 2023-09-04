<?php
namespace App\Models\Admin;

use App\Models\BaseModel;
class NguoiDung extends BaseModel{
    //Danh sách
    public function LoadAllNguoiDung($table,$limit1,$limit2){
        $sql = "select *,A.id as id_nd from $table A 
                inner join vai_tro B on A.vai_tro_id = B.id 
                order by A.id desc";
        if ($limit1 >= 0 && $limit2 > 0) {
            $sql .= " limit $limit1,$limit2";
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    //Cập nhật người dùng
    public function suaNguoiDung($id,$hoTen,$vai_tro_id){
        $sql = "update nguoi_dung set hoTen = '$hoTen', vai_tro_id = '$vai_tro_id' where id = $id";
        $this->setQuery($sql);
        $this->execute();
    }

    //load one người dùng
    public function loadOneNguoiDung($table,$id_nd){
        $sql = "select *,A.id as id_nd from $table A 
                inner join vai_tro B on A.vai_tro_id = B.id WHERE A.id = $id_nd";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    //đăng ký
    public function dangKy($hoTen,$email,$matKhau,$vai_tro_id){
        $sql = "insert into nguoi_dung(hoTen,email,matKhau,vai_tro_id) values (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$hoTen,$email,$matKhau,$vai_tro_id]);
    }

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

    //Tìm kiếm
    public function timKiemNguoiDung($table,$nd="",$l=0){
        $sql = "select *,A.id as id_nd from $table A 
                inner join vai_tro B on A.vai_tro_id = B.id where 1";

        if($nd != ""){
            $sql.= " and A.hoTen like '%".$nd."%'";
        }

        if($l > 0){
            $sql.= " and B.id = '$l'";
        }

        $sql .= " order by A.id desc limit 0,10";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}