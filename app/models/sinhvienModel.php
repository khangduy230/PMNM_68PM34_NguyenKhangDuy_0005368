<?php
require_once '../app/core/DB.php';
class sinhvienModel {
    private $conn;
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }

    public function getAllSinhvien(){
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($hoten, $mssv, $gioitinh,){ 
        $query = "INSERT INTO tbl_sinhviens (hoten, mssv, gioitinh) VALUES (:hoten, :mssv, :gioitinh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':hoten', $hoten, PDO::PARAM_STR);
        $stmt->bindParam(':mssv', $mssv , PDO::PARAM_STR);
        $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function paging($limit = 5, $offset = 0, $search=""){
        $query = "SELECT * FROM tbl_sinhviens LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // tính tổng số bản ghi
        $selectAllQuery = $this->conn->prepare("SELECT COUNT(*) FROM tbl_sinhviens");
        $selectAllQuery->execute();
        $totalRecord = $selectAllQuery->fetchColumn();
        $totalPage = ceil($totalRecord / $limit);
        return ['sinhviens' => $results, 'totalPage' => $totalPage];
    }


    public function getSinhvienById($id){
    $query = "SELECT * FROM tbl_sinhviens WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    
}

    public function update($id, $hoten, $mssv, $gioitinh,){
    $query = "UPDATE tbl_sinhviens 
              SET hoten = :hoten, mssv = :mssv, gioitinh = :gioitinh, 
              WHERE id = :id";
              
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':hoten', $hoten, PDO::PARAM_STR);
    $stmt->bindParam(':mssv', $mssv, PDO::PARAM_STR);
    $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
    
    return $stmt->execute();
}
}
?>