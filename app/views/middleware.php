<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    
    class middleware {
        function checklogin(){
            //Trang vào mà không cần đăng nhập
            $publicPages = ['/home/login'];
            $publicPages = ['/auth/login'];

            // Lấy đường dẫn hiện tại mà user đang truy cập
            $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            // Nếu chưa đăng nhập VÀ trang đang vào không nằm trong danh sách public
            if(!isset($_SESSION['username']) && !in_array($currentUrl, $publicPages)){
                // trở về trang đăng nhập
                header('Location: /home/login');
                exit();
            }
        }
    }
?>