<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller{
    public function index(){
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhviens = $sinhvienModel->getAllSinhvien();
        //trả về view
        $this->view('sinhvien/index', ['sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên']);
    }
    public function create(){
        require_once '../app/views/sinhvien/create.php';
    }

}
?>