<?php

class home extends Controller {

    public function index() {
        $sinhvienModel = $this->model('sinhvienModel');
        $lophocModel = $this->model('lophocModel');

        $totalSinhVien = count($sinhvienModel->getAllSinhvien());
        $totalLopHoc = count($lophocModel->getAll());

        $this->view("layout/masterlayout", [
            'viewname' => 'home/index',
            'title' => 'Trang chủ hệ thống',
            'totalSinhVien' => $totalSinhVien,
            'totalLopHoc' => $totalLopHoc
        ]);
    }

    public function about(){
        echo "Đây là trang giới thiệu";
    }

    public function login(){
        require_once '../app/views/home/login.php';
    }
}
?>