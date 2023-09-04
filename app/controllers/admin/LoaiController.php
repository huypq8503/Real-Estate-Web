<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Loai;

class LoaiController extends BaseController
{
    protected $loai;

    public function __construct()
    {
        $this->loai = new Loai();
    }

    //Hiển thị danh sách loại
    public function hien_thi_ds()
    {
        $all = $this->loai->loadAll('loai', 0, 10);
        $title = "Danh sách loại";
        $tieuDe = "Danh sách loại";
        $table = "loai";
        $duong_dan = 'admin.loai.danh_sach';
        $i = 0;
        $this->render($duong_dan,
            compact('all', 'title', 'tieuDe', 'table', 'duong_dan','i'));
    }

    //Thêm loại
    public function them_loai()
    {
        $title = "Thêm loại";
        $tieuDe = "Thêm loại";
        $this->render('admin.loai.them', compact('title', 'tieuDe'));
    }

    //Xử lý thêm loại
    public function xu_ly_them()
    {
        if (isset($_POST['dong_y'])) {
            $ten = $_POST['ten'];
            $errors = [];

            if (strlen(trim($ten)) == 0) {
                $errors[] = "Bạn không được để trống tên loại!";
            } else {
                $find = $this->loai->find('ten', 'loai', 'ten', $ten) ? false : true;
                if ($find == false) {
                    $errors[] = "Tên loại đã tồn tại!";
                }
            }

            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
                header('location: ' . url('admin/loai/them-loai'));
                die();
            } else {
                $this->loai->them_loai($ten);
                $_SESSION['thong_bao'] = "Thêm thành công!";
                header('location: ' . url('admin/loai/them-loai'));
            }
        }
    }

    //Sửa loại
    public function sua_loai($i, $id)
    {
        $title = "Sửa loại";
        $tieuDe = "Sửa loại";
        $title_p = "Danh sách loại";
        $tieuDe_p = "Danh sách loại";
        $table = "loai";
        $duong_dan = 'admin.loai.danh_sach';
        $load_one = $this->loai->loadOne('loai', 'id', $id);
        $this->render('admin.loai.sua',
            compact('load_one', 'title', 'tieuDe', 'tieuDe_p', 'title_p', 'table', 'duong_dan', 'i'));
    }

    //Xử lý sửa
    public function xu_ly_sua($i,$id,$tenCu)
    {
        if (isset($_POST['dong_y'])) {
            $ten = $_POST['ten'];
            $errors = [];

            if (strlen(trim($ten)) == 0) {
                $errors[] = "Bạn không được để trống!";
            }

            if ($ten != $tenCu) {
                $soSanh = $this->loai->find('ten', 'loai', 'ten', $ten) ? false : true;
                if ($soSanh == false) {
                    $errors[] = "Tên loại đã tồn tại!";
                }
            }

            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
                header('location: ' . BASE_URL . "admin/loai/sua-loai/$i/$id");
                die();
            } else {
                $this->loai->cap_nhat_loai($ten, $id);
                $_SESSION['thong_bao'] = "Cập nhật thành công!";
                header('location: ' . BASE_URL . "admin/loai/sua-loai/$i/$id");
            }
        }
    }

    //Xóa loại
    public function xoa_loai($i)
    {
        if (isset($_POST['dong_y'])) {
            $title = "Danh sách loại";
            $tieuDe = "Danh sách loại";
            $table = "loai";
            $duong_dan = 'admin.loai.danh_sach';
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                foreach ($id as $v) {
                    $this->loai->delete('san_pham', 'loai_id', $v);
                }
                foreach ($id as $v) {
                    $this->loai->delete('loai', 'id', $v);
                }
                $_SESSION['thong_bao'] = "Xóa thành công!";
                header('location: ' . BASE_URL . "pages/$i/$tieuDe/$title/$table/$duong_dan");
            } else {
                $_SESSION['thong_bao'] = "Không có mục nào được xóa!";
                header('location: ' . BASE_URL . "pages/$i/$tieuDe/$title/$table/$duong_dan");
            }
        }
    }
}

?>