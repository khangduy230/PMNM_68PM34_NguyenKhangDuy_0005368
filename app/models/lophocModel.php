<?php
require_once '../app/core/DB.php';

class lophocModel {
    private $conn;

    public function __construct() {
        $this->conn = ConnectDB::Connect();
    }

    // Lấy toàn bộ danh sách lớp học
    public function getAll() {
        $query = "SELECT * FROM tbl_lops ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function paging($limit = 5, $offset = 0, $search=""){
        $query = "SELECT * FROM tbl_lops LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // tính tổng số bản ghi
        $selectAllQuery = $this->conn->prepare("SELECT COUNT(*) FROM tbl_lops");
        $selectAllQuery->execute();
        $totalRecord = $selectAllQuery->fetchColumn();
        $totalPage = ceil($totalRecord / $limit);
        return ['lophocs' => $results, 'totalPage' => $totalPage];
    }

    public function create($malop, $tenlop, $ghichu){ 
        $query = "INSERT INTO tbl_lops (malop, tenlop, ghichu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop, PDO::PARAM_STR);
        $stmt->bindParam(':tenlop', $tenlop, PDO::PARAM_STR);
        $stmt->bindParam(':ghichu', $ghichu, PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($id){
        $query = "DELETE FROM tbl_lops WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute(); 
    }
    public function getLopHocById($id){
    $query = "SELECT * FROM tbl_lops WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    
}

    public function update($id, $malop, $tenlop, $ghichu){
    $query = "UPDATE tbl_lops 
              SET malop = :malop, tenlop = :tenlop, ghichu = :ghichu 
              WHERE id = :id";
              
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':malop', $malop, PDO::PARAM_STR);
    $stmt->bindParam(':tenlop', $tenlop, PDO::PARAM_STR);
    $stmt->bindParam(':ghichu', $ghichu, PDO::PARAM_STR);
    
    return $stmt->execute();
}
}
?>