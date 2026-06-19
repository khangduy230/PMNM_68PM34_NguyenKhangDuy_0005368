<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller{
    public function index($limit = 5, $offset = 0) {
        $limit = is_numeric($limit) ? (int)$limit : 5;
        $offset = is_numeric($offset) ? (int)$offset : 0;

        $search = $_GET['search'] ?? "";
        $sortBy = $_GET['sortBy'] ?? "id";       
        $sortOrder = $_GET['sortOrder'] ?? "ASC"; 

        $sinhvienModel = $this->model('sinhvienModel');
        $results = $sinhvienModel->paging($limit, $offset, $search, $sortBy, $sortOrder);
        $sinhviens = $results['sinhviens'];
        $totalPage = $results['totalPage'];
        
        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/index', 
            'sinhviens' => $sinhviens, 
            'title' => 'Quản lý sinh viên', 
            'totalPage' => $totalPage,
            'search' => $search,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder
        ]);
    }
    public function create() {
        $lophocModel = $this->model('lophocModel');
        $lophocs = $lophocModel->getAll(); 

        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/create',
            'lophocs' => $lophocs,
            'title' => 'Thêm sinh viên mới'
        ]);
    }


    public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';
            $malop = $_POST['malop'] ?? '';
            
            $sinhvienModel = $this->model('sinhvienModel');

            $result = $sinhvienModel->create($hoten, $mssv, $gioitinh, $malop);

            if($result){
            header("Location: /sinhvien/index"); 
            exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        }
    }

    public function edit($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel->getSinhvienById($id);

        $lophocModel = $this->model('lophocModel');
        $lophocs = $lophocModel->getAll();

        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/edit',
            'sinhvien' => $sinhvien,
            'lophocs' => $lophocs,
            'title' => 'Chỉnh sửa sinh viên'
        ]);
    }


    public function update($id){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';
            $malop = $_POST['malop'] ?? '';
            
            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->update($id, $hoten, $mssv, $gioitinh, $malop);

            if($result){
                header("Location: /sinhvien/index");
                exit();
            } else {
                echo "Lỗi khi cập nhật dữ liệu.";
            }
        }
    }

    public function delete($id){
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->delete($id);
        
        if($result){
            header("Location: /sinhvien/index");
            exit();
        } else {
            echo "Lỗi khi xóa sinh viên.";
        }
    }


}
?>