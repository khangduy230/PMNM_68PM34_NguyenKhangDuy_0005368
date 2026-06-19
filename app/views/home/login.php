<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - HUCE System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-wrapper {
            display: flex;
            background: #ffffff;
            width: 900px;
            max-width: 95%;
            height: 550px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .login-image-side {
            flex: 1.2;
            background-image: url('https://xdcs.cdnchinhphu.vn/446259493575335936/2023/1/6/xd-16730160092041954299375.jpg');
            background-size: cover;
            background-position: 90% center;
            position: relative;
        }

        .login-image-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.4), rgba(44, 62, 80, 0.7));
        }

        .login-form-side {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-title {
            color: #2c3e50;
            margin: 0 0 5px 0;
            font-size: 26px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            color: #64748b;
            margin: 0 0 30px 0;
            font-size: 14px;
        }

        .error-message {
            background-color: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
            padding: 12px;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 15px;
            color: #334155;
            box-sizing: border-box;
            transition: all 0.2s ease;
            background-color: #fff;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
        }

        .btn-submit {
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.2);
            transition: all 0.2s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #2980b9;
            box-shadow: 0 6px 12px rgba(52, 152, 219, 0.3);
        }

        .footer-text {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        
        <div class="login-image-side"></div>

        <div class="login-form-side">
            
            <h1 class="brand-title">Hệ thống HUCE</h1>
            <p class="brand-subtitle">Vui lòng đăng nhập để tiếp tục quản lý</p>

            <?php if(isset($_GET['error'])): ?>
                <div class="error-message">
                    Mật khẩu hoặc tài khoản không chính xác!
                </div>
            <?php endif; ?>

            <form action="/auth/login" method="POST">
                
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" name="username" id="username" required placeholder="Nhập mã định danh hoặc email">
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" required placeholder="••••••••">
                </div>

                <button type="submit" class="btn-submit">Đăng nhập</button>

            </form>

            <div class="footer-text">
                &copy; <?php echo date('Y'); ?> Hanoi University of Civil Engineering
            </div>

        </div>

    </div>

</body>
</html>