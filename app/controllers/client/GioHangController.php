<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\GioHang;

class GioHangController extends BaseController
{
    protected $gioHang;

    public function __construct()
    {
        $this->gioHang = new GioHang();
    }

    //Danh sách
    public function gioHang()
    {
        $this->render('client.gioHang');
    }

    //Xử lý giỏ hàng
    public function gioHangPost()
    {
        $id_sp = $_POST['id_sp'];
        $ten_sp = $_POST['ten_sp'];
        $hinh = $_POST['hinh'];
        $don_gia = $_POST['don_gia'];
        $so_luong = 1;
        $thanh_tien = $so_luong * $don_gia;
        $danhSachSP = [$id_sp, $ten_sp, $hinh, $so_luong, $thanh_tien];

        if (!isset($_SESSION['san_pham'][$id_sp])) {
            $_SESSION['san_pham'][$id_sp] = array(
                'id_sp' => $id_sp,
                'ten_sp' => $ten_sp,
                'hinh' => $hinh,
                'don_gia' => $don_gia,
                'so_luong' => $so_luong = 1,
                'thanh_tien' => $thanh_tien
            );
        } else {
            $_SESSION['san_pham'][$id_sp]['so_luong'] += $so_luong;
        }

//        array_push($_SESSION['san_pham'], $danhSachSP);
        header('location: ' . url(''));
    }

    //xóa giỏ hàng
    public function xoaGioHang($id)
    {
        if ($id == "clear") {
            $_SESSION['san_pham'] = [];
            header('location: ' . url('gio-hang'));
        } else {
            if (isset($id)) {
                array_splice($_SESSION['san_pham'], $id, 1);
                header('location: ' . url('gio-hang'));
            }
        }
    }

    //Thanh toán
    public function thanhToan()
    {
        if (isset($_SESSION['nguoi_dung'])) {
            $this->render('client.thanhToan');
        } else {
            $_SESSION['thong_bao'] = "Bạn cần đăng nhập để tiếp tục thanh toán!";
            header('location: ' . url('dang-nhap'));
        }
    }

    //Thêm sl sp
    public function themSlSp($id)
    {
        $_SESSION['san_pham'][$id]['so_luong'] += 1;
        header('location: ' . url('gio-hang'));
    }

    //Trừ sl
    public function truSlSp($id)
    {
        if ($_SESSION['san_pham'][$id]['so_luong'] == 0) {
            header('location: ' . url('gio-hang'));
        } else {
            $_SESSION['san_pham'][$id]['so_luong'] -= 1;
            header('location: ' . url('gio-hang'));
        }
    }

    //Hóa đơn
    public function hoaDon()
    {
        if (isset($_POST['dong_y'])) {
            $nguoi_dung_id = $_POST['nguoi_dung_id'];
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
            $thanh_tien = $_POST['thanh_tien'];
            $ngay_dat_hang = date("Y-m-d H:i:s");
            $tinh_trang = 1;

            $tong = 0;
            foreach ($_SESSION['san_pham'] as $v) {
                $thanh_tien = $v['so_luong'] * $v['don_gia'];
                $tong = $tong + $thanh_tien;
            }


            $hoa_don_id = $this->gioHang->hoaDon($ngay_dat_hang, $tong,$tinh_trang, $nguoi_dung_id, $san_pham_id);

            foreach ($_SESSION['san_pham'] as $v){
                $this->gioHang->chiTietHoaDon($_SESSION['nguoi_dung']->id,$v['id_sp'],$v['so_luong'],$v['thanh_tien'],$hoa_don_id);
            }

            $_SESSION['thong_bao'] = "Đặt hàng thành công!";
            header('location: '.url(''));
        }
    }

    //Chi tiết sản phẩm
    public function chiTietSanPham($id){
        $load_one = $this->gioHang->loadOneSP($id);
//        echo "<pre>";
//        print_r($load_one);
//        die();
        $this->render('client.chiTietSP',compact('load_one'));
    }
}