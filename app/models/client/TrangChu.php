<?php
namespace App\Models\client;

use App\Models\BaseModel;
class TrangChu extends BaseModel{
    //Danh sách
    public function loadAllSP($table,$limit1,$limit2,$loai,$gia){
        $sql = "select *,A.ten as ten_sp,A.id as id_sp from $table A 
                inner join loai B on A.loai_id = B.id where 1";

        if($loai > 0){
            $sql.= " and B.id = $loai";
        }

        if($gia > 0){
            if($gia == 1){
                $sql.= " and A.don_gia >= 0 && A.don_gia <= 1000000";
            }
            if($gia == 2){
                $sql.= " and A.don_gia >= 1000000 && A.don_gia <= 10000000";
            }
            if($gia == 3){
                $sql.= " and A.don_gia >= 10000000 && A.don_gia <= 20000000";
            }
            if($gia == 4){
                $sql.= " and A.don_gia >= 20000000";
            }
        }

        if ($limit1 >= 0 && $limit2 > 0) {
            $sql .= " order by A.id desc limit $limit1,$limit2";
        }

        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}