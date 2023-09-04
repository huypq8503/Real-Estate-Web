<?php
namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\TrangChu;
class TrangChuController extends BaseController{
    protected $trangChu;

    public function __construct()
    {
        $this->trangChu = new TrangChu();
    }

    public function trangChu(){
        $loai = isset($_GET['loai']) ? $_GET['loai'] : 0;
        $gia = isset($_GET['gia']) ? $_GET['gia'] : 0;

        $title = "Trang chủ";
        $tieuDe = "Trang chủ";
        $table = "san_pham";
        $duong_dan = 'client.trangChu';
        $i = 0;
        $all = $this->trangChu->loadAllSP('san_pham',0,12,$loai,$gia);
        $all_ds_loai = $this->trangChu->loadAll('loai', 0, $this->trangChu->dem('id','loai'));
        $this->render('client.trangChu',
            compact('all','all_ds_loai','title','tieuDe','table','duong_dan','i'));
    }
}