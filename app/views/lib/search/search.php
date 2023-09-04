<?php
namespace App\Views\Lib\Search;

use App\Models\Admin\Loai;
use App\Models\Admin\SanPham;
use App\Models\Admin\NguoiDung;
use App\Models\Admin\HoaDon;
use App\Controllers\BaseController;
class Search extends BaseController{
    protected $loai;
    protected $sanPham;
    protected $nguoiDung;
    protected $hoaDon;

    public function __construct()
    {
        $this->loai = new Loai();
        $this->nguoiDung = new NguoiDung();
        $this->sanPham = new SanPham();
        $this->hoaDon = new HoaDon();
    }

    public function hien_thi($i,$tieuDe,$title,$table,$duong_dan){
        if (isset($_GET['tim_kiem'])) {
            $i = 0;
            $noi_dung_tk = $_GET['noi_dung_tk'];
            $key_loai = isset($_GET['key_loai']) ? $_GET['key_loai'] : "";
            $all_ds_loai = isset($all_ds_loai) ? $all_ds_loai : "";

            if($duong_dan == "admin.loai.danh_sach"){
                $all = $this->loai->tim_kiem_loai($table,$noi_dung_tk);
            }elseif ($duong_dan == "admin.sanPham.danhSach"){
                $all = $this->sanPham->tim_kiem_san_pham($table,$noi_dung_tk,$key_loai);
                $all_ds_loai = $this->sanPham->
                loadAll('loai', 0, $this->sanPham->dem('id','loai'));
            }elseif ($duong_dan == "admin.nguoiDung.danhSach"){
                $all = $this->nguoiDung->timKiemNguoiDung($table,$noi_dung_tk,$key_loai);
            }elseif ($duong_dan == "admin.hoaDon.danhSach"){
                $all = $this->hoaDon->tim_kiem_san_pham($table,$noi_dung_tk,$key_loai);
            }

            $this->render($duong_dan,
                compact('all', 'title', 'tieuDe', 'table', 'duong_dan','all_ds_loai','i'));
        }
    }
}