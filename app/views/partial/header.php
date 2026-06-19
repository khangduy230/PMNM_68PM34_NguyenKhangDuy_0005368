<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Hệ thống quản lý'; ?></title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f1f5f9; 
            display: flex;
            flex-direction: column; 
        }

        .header {
            width: 100%;
            height: 70px;
            background-color: #1e293b; 
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            box-sizing: border-box;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 1000;
        }

        .header-brand {
            color: #f8fafc;
            font-size: 18px;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .header-brand::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 24px;
            background-color: #38bdf8; 
            border-radius: 2px;
        }

        .header-nav {
            display: flex;
            gap: 10px;
        }

        .nav-link {
            color: #94a3b8; 
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover {
            color: #f1f5f9;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            color: #38bdf8; 
            background-color: rgba(56, 189, 248, 0.1); 
            box-shadow: inset 0 0 0 1px rgba(56, 189, 248, 0.2);
        }

        .main-content {
            flex: 1; 
            padding: 40px;
            max-width: 1300px;
            width: 100%;
            box-sizing: border-box;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="/home/index" class="header-brand">HUCE SYSTEM</a>
        
        <div class="header-nav">
            <a href="/sinhvien/index" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/sinhvien') !== false) ? 'active' : ''; ?>">
                <span>👨‍🎓</span> Quản lý sinh viên
            </a>
            
            <a href="/lophoc/index" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/lophoc') !== false) ? 'active' : ''; ?>">
                <span>🏫</span> Quản lý lớp học
            </a>
        </div>
    </div>
    
    <div class="main-content">