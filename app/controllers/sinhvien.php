<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller{
    public function index($limit = 5, $offset = 0, $search = ""){
        $sinhvienModel = $this->model('sinhvienModel');
        $results = $sinhvienModel->paging($limit, $offset, $search);
        $sinhviens = $results['sinhviens'];
        $totalPage = $results['totalPage'];
        //trả về view
        $this->view("layout/masterlayout", ['viewname' => 'sinhvien/index', 'sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên', 'totalPage' => $totalPage]);
    }
    public function create(){
        require_once '../app/views/sinhvien/create.php';

    }

    public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';
            
            $sinhvienModel = $this->model('sinhvienModel');
            
            $result = $sinhvienModel->create($hoten, $mssv, $gioitinh);
            
            if($result){
            header("Location: /sinhvien/index"); 
            exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        }
    }

    


}
?>