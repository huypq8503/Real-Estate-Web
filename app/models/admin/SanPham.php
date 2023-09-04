<?php
namespace App\Models\Admin;

use App\Models\BaseModel;
class SanPham extends BaseModel{
    //Danh sách
    public function loadAllSP($table,$limit1,$limit2){
        $sql = "select *,A.ten as ten_sp,A.id as id_sp from $table A 
                inner join loai B on A.loai_id = B.id 
                order by A.id desc";
        if ($limit1 >= 0 && $limit2 > 0) {
            $sql .= " limit $limit1,$limit2";
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    //Thêm sản phẩm
    public function themSanPham($ten,$hinh,$don_gia,$mo_ta,$luot_xem,$giam_gia,$loai_id){
        $sql = "insert into san_pham(ten,hinh,don_gia,mo_ta,luot_xem,giam_gia,loai_id) 
            values(?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        $this->execute([$ten,$hinh,$don_gia,$mo_ta,$luot_xem,$giam_gia,$loai_id]);
    }

    //Sửa sản phẩm
    public function capNhatSanPham($ten,$hinh,$don_gia,$mo_ta,$giam_gia,$loai_id,$id){
        $sql = "update san_pham set 
                    ten = ?,
                    hinh = ?,
                    don_gia = ?,
                    mo_ta = ?,
                    giam_gia = ?,
                    loai_id = ?
                    where id = ?
                    ";
        $this->setQuery($sql);
        $this->execute([$ten,$hinh,$don_gia,$mo_ta,$giam_gia,$loai_id,$id]);
    }

    //Tìm kiếm
    public function tim_kiem_san_pham($table,$nd="",$l=0){
        $sql = "select *,A.ten as ten_sp,A.id as id_sp from $table A 
                inner join loai B on A.loai_id = B.id where 1";

        if($nd != ""){
            $sql.= " and A.ten like '%".$nd."%'";
        }

        if($l > 0){
            $sql.= " and B.id = '$l'";
        }

        $sql.= " order by id_sp desc limit 0,10";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}