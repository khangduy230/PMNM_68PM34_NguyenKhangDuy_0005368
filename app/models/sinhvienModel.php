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
    public function create($hoten, $mssv, $gioitinh){ 
        $query = "INSERT INTO tbl_sinhviens (hoten, mssv, gioitinh) VALUES (:hoten, :mssv, :gioitinh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':gioitinh', $gioitinh);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}
?>