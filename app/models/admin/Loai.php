<?php
    namespace App\Models\Admin;

    use App\Models\BaseModel;
    class Loai extends BaseModel {
        //Thêm loại
        public function them_loai($ten){
            $sql = "insert into loai(ten) values (?)";
            $this->setQuery($sql);
            $this->execute([$ten]);
        }

        //Cập nhật loại
        public function cap_nhat_loai($ten,$id){
            $sql = "update loai set ten='$ten' where id = $id";
            $this->setQuery($sql);
            $this->execute();
        }

        //Tìm kiếm
        public function tim_kiem_loai($table,$nd=""){
            $sql = "select * from $table where 1";

            if($nd != ""){
                $sql.= " and ten like '%".$nd."%'";
            }

            $sql.= " order by id desc limit 0,10";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
    }
?>
