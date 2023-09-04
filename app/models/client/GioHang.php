<?php
namespace App\Models\Client;

use App\Models\BaseModel;
class GioHang extends BaseModel{
    public function hoaDon($ngay_dat_hang,$tong_tien,$tinh_trang,$nguoi_dung_id,$san_pham_id){
        $sql = "insert into hoa_don(ngay_dat_hang,tong_tien,tinh_trang,nguoi_dung_id,san_pham_id) 
                values ('$ngay_dat_hang','$tong_tien','$tinh_trang','$nguoi_dung_id','$san_pham_id')";
        return $this->pdo_execute_return_lastInsertId($sql);
//        $this->setQuery($sql);
//       return $this->getLastId();
    }

    public function chiTietHoaDon($nguoi_dung_id,$san_pham_id,$so_luong,$thanh_tien,$hoa_don_id){
        $sql = "insert into chi_tiet_hoa_don(nguoi_dung_id,san_pham_id,so_luong,thanh_tien,hoa_don_id) 
                values ('$nguoi_dung_id','$san_pham_id','$so_luong','$thanh_tien','$hoa_don_id')";
        $this->setQuery($sql);
        $this->execute();
    }

    public function loadOneSP($id){
        $sql = "select *,A.ten as ten_sp,A.id as id_sp from san_pham A 
                inner join loai B on A.loai_id = B.id where A.id = $id";
        $this->setQuery($sql);
        return $this->loadRow();
    }
}