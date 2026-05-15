<?php
class ConnectDB {
    public static function Connect(){
        //khởi tạo tham số câu hình kết nối
        $server = "localhost";
        $user = "root";
        $password = "123456";
        $db = "68pm4";

        $conn = new mysqli($server, $user, $password, $db);
        if($conn->connect_error){
        die("lỗi kết nối: ".$conn->connect_error);
        }
        echo"kết nối thành công ";
        return $conn;
    }
}
?>