<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h1>Đăng nhập</h1>
    <?php if(isset($_GET['error'])): ?>
        <p style="color: red;">Sai tài khoản hoặc mật khẩu!</p>
    <?php endif; ?>

    <form action="/auth/login" method="POST">
        <label>Tài khoản:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>