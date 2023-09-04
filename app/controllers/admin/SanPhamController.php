<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SanPham;
class SanPhamController extends BaseController{
    protected $sanPham;

    public function __construct()
    {
        $this->sanPham = new SanPham();
    }

    //Danh sách
    public function danhSach(){
        $all = $this->sanPham->loadAllSP('san_pham',0,10);
        $title = "Danh sách sản phẩm";
        $tieuDe = "Danh sách sản phẩm";
        $table = "san_pham";
        $duong_dan = 'admin.sanPham.danhSach';
        $all_ds_loai = $this->sanPham->loadAll('loai', 0, $this->sanPham->dem('id','loai'));
        $i = 0;
        $this->render($duong_dan,
            compact('all', 'title', 'tieuDe', 'table', 'duong_dan','all_ds_loai','i'));
    }

    //Thêm sản phẩm
    public function themSanPham(){
        $title = "Thêm sản phẩm";
        $tieuDe = "Thêm sản phẩm";
        $all_ds_loai = $this->sanPham->loadAll('loai', 0, $this->sanPham->dem('id','loai'));
        $this->render('admin.sanPham.them',compact('all_ds_loai', 'title', 'tieuDe'));
    }

    //Xử lý thêm sản phẩm
    public function themSanPhamPost(){
        if(isset($_POST['dong_y'])){
            $ten = $_POST['ten'];
            $don_gia = $_POST['don_gia'];
            $mo_ta = $_POST['mo_ta'];
            $giam_gia = $_POST['giam_gia'];
            $loai_id = $_POST['loai_id'];
            $hinh = $_FILES['hinh']['name'];
            $luot_xem = 0;
            $errors = [];

            if (strlen(trim($ten)) == 0) {
                $errors[] = "Bạn không được để trống tên sản phẩm!";
            } else {
                $find = $this->sanPham->find('ten', 'san_pham', 'ten', $ten) ? false : true;
                if ($find == false) {
                    $errors[] = "Tên sản phẩm đã tồn tại!";
                }
            }

            if ($_FILES["hinh"]['name'] == "") {
                $errors[] = 'Không có ảnh sản phẩm!';
            }else{
                //Đường dẫn đích
                $target_dir = "public/images/img/";

                //Đường dẫn vào file đích
                $target_file = $target_dir . $_FILES["hinh"]["name"];

                //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                //định dạng được chấp nhận
                $allowtype = ["jpg", "jpeg","png", "JPG", "JPEG", "PNG"];

                //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                //ko là ảnh trả về false
                $check = getimagesize($_FILES["hinh"]["tmp_name"]);
                if ($check == false) {
                    $errors[] = "Đây không phải là file ảnh!";
                }

                //kiểm tra kiêu file không làm trong định dạng cho phép
                if (!in_array($imageFileType, $allowtype)) {
                    $errors[] = "Chỉ được upload những ảnh có định dạng ipg, jpeg, png!";
                }
            }

            if(strlen(trim($don_gia)) == 0){
                $errors[] = "Đơn giá không được để trống!";
            }else{
                if(!$this->sanPham->nhap_so($don_gia)){
                    $errors[] = "Đơn giá chỉ được nhập số nguyên dương!";
                }
            }

            if(strlen(trim($giam_gia)) == 0){
                $errors[] = "Giảm giá không được để trống!";
            }else {
                if (!$this->sanPham->nhap_so($giam_gia)) {
                    $errors[] = "Giảm giá chỉ được nhập số nguyên dương!";
                }
            }

            if($loai_id == 0){
                $errors[] = "Bạn chưa chọn loại!";
            }

            if(count($errors) > 0){
                $_SESSION['errors'] = $errors;
                header('location: ' . url('admin/san-pham/them-san-pham'));
                die();
            }else{
                move_uploaded_file($_FILES['hinh']['tmp_name'], $target_dir . $hinh);
                $this->sanPham->themSanPham($ten,$hinh,$don_gia,$mo_ta,$luot_xem,$giam_gia,$loai_id);
                $_SESSION['thong_bao'] = "Thêm thành công!";
                header('location: ' . url('admin/san-pham/them-san-pham'));
            }
        }
    }

    //Sửa sản phẩm
    public function suaSanPham($i,$id){
        if(isset($id)){
            $title = "Sửa sản phẩm";
            $tieuDe = "Sửa sản phẩm";
            $title_p = "Danh sách sản phẩm";
            $tieuDe_p = "Danh sách sản phẩm";
            $table = "san_pham";
            $duong_dan = 'admin.sanPham.danhSach';
            $load_one = $this->sanPham->loadOne('san_pham','id',$id);
            $all_ds_loai = $this->sanPham->loadAll('loai', 0, $this->sanPham->dem('id','loai'));
            $this->render('admin.sanPham.sua',
                compact('title','tieuDe','title_p','tieuDe_p','table','duong_dan',
                    'load_one','all_ds_loai','i'));
        }
    }

    //Xử lý sửa sản phẩm
    public function suaSanPhamPost($i,$id,$tenCu){
        if(isset($_POST['dong_y'])){
            $ten = $_POST['ten'];
            $don_gia = $_POST['don_gia'];
            $mo_ta = $_POST['mo_ta'];
            $giam_gia = $_POST['giam_gia'];
            $loai_id = $_POST['loai_id'];
            $errors = [];

            if(strlen(trim($ten)) == 0){
                $errors[] = "Tên sản phẩm không được để trống!";
            }else{
                if ($ten != $tenCu) {
                    $soSanh = $this->sanPham->find('ten', 'san_pham', 'ten', $ten) ? false : true;
                    if ($soSanh == false) {
                        $errors[] = "Tên sản phẩm đã tồn tại!";
                    }
                }
            }

            if ($_FILES["hinh"]['name'] == "") {
                $hinh = $this->sanPham->loadOne('san_pham','id',$id)->hinh;
            }else{
                $hinh = $_FILES['hinh']['name'];
                //Đường dẫn đích
                $target_dir = "public/images/img/";

                //Đường dẫn vào file đích
                $target_file = $target_dir . $_FILES["hinh"]["name"];

                //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                //định dạng được chấp nhận
                $allowtype = ["jpg", "jpeg","png", "JPG", "JPEG", "PNG"];

                //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                //ko là ảnh trả về false
                $check = getimagesize($_FILES["hinh"]["tmp_name"]);
                if ($check == false) {
                    $errors[] = "Đây không phải là file ảnh!";
                }

                //kiểm tra kiêu file không làm trong định dạng cho phép
                if (!in_array($imageFileType, $allowtype)) {
                    $errors[] = "Chỉ được upload những ảnh có định dạng ipg, jpeg, png!";
                }
            }

            if(strlen(trim($don_gia)) == 0){
                $errors[] = "Đơn giá không được để trống!";
            }else{
                if(!$this->sanPham->nhap_so($don_gia)){
                    $errors[] = "Đơn giá chỉ được nhập số nguyên dương!";
                }
            }

            if(strlen(trim($giam_gia)) == 0){
                $errors[] = "Giảm giá không được để trống!";
            }else {
                if (!$this->sanPham->nhap_so($giam_gia)) {
                    $errors[] = "Giảm giá chỉ được nhập số nguyên dương!";
                }
            }

            if($loai_id == 0){
                $errors[] = "Bạn chưa chọn loại!";
            }

            if(count($errors) > 0){
                $_SESSION['errors'] = $errors;
                header('location: ' . url('admin/san-pham/sua-san-pham/'.$i.'/'.$id));
                die();
            }else{
                $this->sanPham->capNhatSanPham($ten,$hinh,$don_gia,$mo_ta,$giam_gia,$loai_id,$id);
                move_uploaded_file($_FILES['hinh']['tmp_name'], $target_dir . $hinh);
                $_SESSION['thong_bao'] = "Cập nhật thành công!";
                header('location: ' . url('admin/san-pham/sua-san-pham/'.$i.'/'.$id));
            }
        }
    }

    //Xóa sản phẩm
    public function xoaSanPham($i){
        if (isset($_POST['dong_y'])) {
            $title = "Danh sách sản phẩm";
            $tieuDe = "Danh sách sản phẩm";
            $table = "san_pham";
            $duong_dan = 'admin.sanPham.danhSach';
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                foreach ($id as $v) {
                    $this->sanPham->delete('san_pham', 'id', $v);
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