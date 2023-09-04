<?php
namespace App\Models\Admin;

use App\Models\BaseModel;
class HoaDon extends BaseModel{

    public function loadAllSP(){
        $sql = "SELECT * FROM hoa_don where 1 order by id desc limit 0,10";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function suaDonHang($tinhTrang,$id){
        $sql = "update hoa_don set tinh_trang = '$tinhTrang' where id = $id";
        $this->setQuery($sql);
        return $this->execute();
    }

    //Tìm kiếm
    public function tim_kiem_san_pham($table,$nd="",$l=0){
        $sql = "SELECT * FROM hoa_don where 1";

        if($nd != ""){
            $sql.= " and id = '$nd'";
        }

        if($l > 0){
            $sql.= " and tinh_trang = '$l'";
        }

        $sql.= " order by id desc limit 0,10";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}