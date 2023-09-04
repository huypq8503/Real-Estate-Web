<?php
    namespace App\Views\Lib\Page;

    use App\Models\BaseModel;
    use App\Controllers\BaseController;
    use App\Models\Admin\SanPham;
    use App\Models\Admin\NguoiDung;
    use App\Models\Admin\HoaDon;
    use App\Models\Client\TrangChu;
    class Pages extends BaseController
    {
        protected $base;
        protected $sanPham;
        protected $nguoiDung;
        protected $hoaDon;

        public function __construct()
        {
            $this->base = new BaseModel();
            $this->sanPham = new SanPham();
            $this->trangChu = new TrangChu();
            $this->nguoiDung = new NguoiDung();
            $this->hoaDon = new HoaDon();
        }

        //Phân trang 1, 2, 3, ...
        public function phan_trang($i,$table,$tieuDe,$title,$duong_dan){
            $count = $this->base->dem('id',$table);

            if($duong_dan == "client.trangChu"){
                $dem = $count / 12;
            }else{
                $dem = $count / 10;
            }

            $i = isset($i) ? $i : 0;

            for($n = 0; $n < $dem; $n++){
                $numberPage = $n+1;
                if($i == $n){
                    $color = "red";
                }else{
                    $color = "";
                }
                $link = url("pages/$n/$tieuDe/$title/$table/$duong_dan");

                echo "<li class='page-item'>
                            <a style='color: $color;' class='page-link' href='$link'>$numberPage</a>
                    </li>";
            }
        }
        //Trang quay về trước
        public function trang_truoc($i,$table,$tieuDe,$title,$duong_dan){
            if(isset($i)){
                if($i > 0){
                    $i = $i - 1;
                }else{
                    $i = 0;
                }
            }else{
                $i = 0;
            }
            $link = url("pages/$i/$tieuDe/$title/$table/$duong_dan");
            echo "<li class='page-item'><a class='page-link' href='$link'>Trang trước</a></li>";
        }
        //Trang quay về sau
        public function trang_sau($i,$table,$tieuDe,$title,$duong_dan){
            $dem = $this->base->dem('id',$table) / 10;
            $cutDem = substr($dem,0,1);

            if(isset($i)){
                if($i < $cutDem){
                    $i = $i + 1;
                }else{
                    $i = $cutDem;
                }
            }else{
                $i = 1;
            }
            $link = url("pages/$i/$tieuDe/$title/$table/$duong_dan");
            echo "<li class='page-item'><a class='page-link' href='$link'>Trang sau</a></li>";
        }
        //Load trang theo số
        public function load_trang($i,$table,$tieuDe,$title,$duong_dan){;
            if(isset($i)){
                $all_ds_loai = isset($all_ds_loai) ? $all_ds_loai : "";

                if($i == 0){
                    $tong = 0;
                    if($duong_dan == "admin.loai.danh_sach"){
                        $all = $this->base->loadAll($table, $tong, 10);
                    }elseif ($duong_dan == "admin.sanPham.danhSach"){
                        $all = $this->sanPham->loadAllSP($table,$tong,10);
                        $all_ds_loai = $this->sanPham->
                        loadAll('loai', 0, $this->sanPham->dem('id','loai'));
                    }elseif ($duong_dan == "client.trangChu"){
                        $loai = isset($_GET['loai']) ? $_GET['loai'] : 0;
                        $gia = isset($_GET['gia']) ? $_GET['gia'] : 0;
                        $all = $this->trangChu->loadAllSP($table,$tong,12,$loai,$gia);
                    }elseif ($duong_dan == "admin.nguoiDung.danhSach"){
                        $all = $this->nguoiDung->LoadAllNguoiDung($table,$tong,10);
                    }elseif ($duong_dan == "admin.hoaDon.danhSach"){
                        $all = $this->hoaDon->loadAllSP();
                    }

                }else{
                    if($duong_dan == "admin.loai.danh_sach"){
                        $tong = $i * 10;
                        $all = $this->base->loadAll($table, $tong, 10);
                    }elseif ($duong_dan == "admin.sanPham.danhSach"){
                        $tong = $i * 10;
                        $all = $this->sanPham->loadAllSP($table,$tong,10);
                        $all_ds_loai = $this->sanPham->
                        loadAll('loai', 0, $this->sanPham->dem('id','loai'));
                    }elseif ($duong_dan == "client.trangChu"){
                        $loai = isset($_GET['loai']) ? $_GET['loai'] : 0;
                        $gia = isset($_GET['gia']) ? $_GET['gia'] : 0;
                        $tong = $i * 12;
                        $all = $this->trangChu->loadAllSP($table,$tong,12,$loai,$gia);
                        $all_ds_loai = $this->sanPham->
                        loadAll('loai', 0, $this->sanPham->dem('id','loai'));
                    }elseif ($duong_dan == "admin.hoaDon.danhSach"){
                        $all = $this->hoaDon->loadAllSP();
                    }
                }
                $this->render($duong_dan,
                    compact('tieuDe','title','table','duong_dan','all','all_ds_loai','i'));
            }
        }
    }
?>
