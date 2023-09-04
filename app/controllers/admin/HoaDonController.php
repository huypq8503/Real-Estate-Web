<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\HoaDon;

class HoaDonController extends BaseController{
    protected $hoaDon;

    public function __construct()
    {
        $this->hoaDon = new HoaDon();
    }

    public function danhSach(){
        $all = $this->hoaDon->loadAllSP();
        $title = "Danh sách hóa đơn";
        $tieuDe = "Danh sách hóa đơn";
        $table = "hoa_don";
        $duong_dan = 'admin.hoaDon.danhSach';
        $i = 0;
        $this->render($duong_dan,
            compact('all', 'title', 'tieuDe', 'table', 'duong_dan','i'));
    }

    public function suaHoaDon($i,$id){
        $title = "Sửa hóa đơn";
        $tieuDe = "Sửa hóa đơn";
        $title_p = "Danh hóa đơn";
        $tieuDe_p = "Danh hóa đơn";
        $table = "hoa_don";
        $duong_dan = 'admin.hoaDon.danhSach';
        $load_one = $this->hoaDon->loadOne($table, 'id', $id);

        $this->render('admin.hoaDon.sua',
            compact('load_one', 'title', 'tieuDe', 'tieuDe_p', 'title_p', 'table', 'duong_dan', 'i'));
    }

    public function suaHoaDonPost($i,$id){
        $tinhTrang = $_POST['tinhTrang'];

        $suaDon = $this->hoaDon->suaDonHang($tinhTrang,$id);

        if ($suaDon) {
            $_SESSION['thong_bao'] = "Cập nhật thành công!";
            header('location: ' . BASE_URL . "admin/hoa-don/sua-hoa-don/$i/$id");
        }
    }
}