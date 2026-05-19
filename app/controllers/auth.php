<?php
class auth{
    protected $user = [
    'admin' => '123456',
    'khangduy' => '123456',
];
    public function login(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SERVER['REQUEST_METHOD'])&& $_SERVER['REQUEST_METHOD']=== 'POST'){
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            if(isset($this->user[$username])&& $this->user[$username]=== $password){
                //đăng nhập thành công: lưu session và chuyển hướng
                $_SESSION['username'] = $username;
                header('Location: /home/index');
                exit();
            }
            else {
                //đăng nhập thất bại thì trở lại trang login kèm thông báo lỗi
                header('Location: /home/login');
                exit();
            }
        }
    }
}
?>