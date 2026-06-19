<?php
require_once '../app/core/Controller.php';

class lophoc extends Controller {
    public function index($limit = null, $offset = 0) {
        $chosenPageSize = $_GET['pageSize'] ?? $limit;
        $limit = is_numeric($chosenPageSize) ? (int)$chosenPageSize : 5;
        $offset = is_numeric($offset) ? (int)$offset : 0;

        $search = $_GET['search'] ?? "";
        
        $lophocModel = $this->model('lophocModel');
        $results = $lophocModel->paging($limit, $offset, $search);
        $lophocs = $results['lophocs'];
        $totalPage = $results['totalPage'];

        $this->view("layout/masterlayout", [
            'viewname' => 'lophoc/index', 
            'lophocs' => $lophocs, 
            'title' => 'Quản lý lớp học', 
            'totalPage' => $totalPage,
            'search' => $search,
            'pageSize' => $limit
        ]);
    }

    public function create(){
        $lophocModel = $this->model('lophocModel');
        $lophocs = $lophocModel->getAll(); 
        
        require_once '../app/views/partial/header.php';
        require_once '../app/views/lophoc/create.php';
        require_once '../app/views/partial/footer.php';
    }

    public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $malop = $_POST['malop'] ?? '';
            $tenlop = $_POST['tenlop'] ?? '';
            $ghichu = $_POST['ghichu'] ?? '';
            
            $lophocModel = $this->model('lophocModel');
            
            $result = $lophocModel->create($malop, $tenlop, $ghichu);
            
            if($result){
                header("Location: /lophoc/index"); 
                exit();
            } else {
                echo "Lỗi khi thêm lớp học.";
            }
        }
    }

    public function edit($id){
        $lophocModel = $this->model('lophocModel');
        $lop = $lophocModel->getLopHocById($id);
        
        if(!$lop) {
            echo "Lớp học không tồn tại trên hệ thống.";
            return;
        }

        $this->view("layout/masterlayout", [
            'viewname' => 'lophoc/edit', 
            'lop' => $lop, 
            'title' => 'Chỉnh sửa lớp học'
        ]);
    }

    public function update($id){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $malop = $_POST['malop'] ?? '';
            $tenlop = $_POST['tenlop'] ?? '';
            $ghichu = $_POST['ghichu'] ?? '';
            
            $lophocModel = $this->model('lophocModel');
            
            $result = $lophocModel->update($id, $malop, $tenlop, $ghichu);
            
            if($result){
                header("Location: /lophoc/index"); 
                exit();
            } else {
                echo "Lỗi khi cập nhật thông tin lớp học.";
            }
        }
    }

    public function delete($id){
        $lophocModel = $this->model('lophocModel');
        $result = $lophocModel->delete($id);
        
        if($result){
            header("Location: /lophoc/index"); 
            exit();
        } else {
            echo "Lỗi khi xóa lớp học.";
        }
    }
}
?>