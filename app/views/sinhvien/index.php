<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Danh sách sinh viên'; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
        }

        .content-container {
            padding: 30px; 
            padding-bottom: 100px; 
            max-width: 1200px;
            margin: 0 auto;
        }

        .header-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 28px;
            font-weight: 600;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            display: inline-block;
        }

        .btn-add {
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.2s;
        }
        .btn-add:hover { background-color: #27ae60; }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
            padding: 14px 16px;
            text-transform: uppercase;
            font-size: 13px;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #eef2f3;
            color: #4f5d73;
            font-size: 15px;    
        }

        tr:nth-child(even) { background-color: #fdfdfd; }
        tr:hover td { background-color: #f1f7fc; cursor: pointer; }
        td:first-child, th:first-child { text-align: center; width: 70px; }

        /* Định dạng các nút Sửa / Xóa */
        .action-links a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            margin-right: 5px;
        }
        .btn-edit { background-color: #f1c40f; color: #fff; }
        .btn-edit:hover { background-color: #f39c12; }
        .btn-delete { background-color: #e74c3c; color: #fff; }
        .btn-delete:hover { background-color: #c0392b; }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 25px;
            gap: 5px;
        }
        .pagination a {
            color: #3498db;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            transition: all 0.3s;
            font-weight: 600;
        }
        .pagination a:hover {
            background-color: #3498db;
            color: white;
            border-color: #3498db;
        }
    </style>
</head>
<body>
    <div class="content-container">
        
        <div class="header-area">
            <h1>Danh sách sinh viên</h1>
            <a href="/sinhvien/create" class="btn-add">+ Thêm sinh viên</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>MSSV</th>
                    <th>Giới tính</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $uri = explode('/', $_SERVER['REQUEST_URI']);
                $current_offset = (isset($uri[4]) && is_numeric($uri[4])) ? (int)$uri[4] : 0;
                $stt = $current_offset + 1;

                if (!empty($sinhviens)):
                    foreach ($sinhviens as $sinhvien): 
                ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <input type="hidden" value="<?php echo $sinhvien['id']; ?>">
                    <td><?php echo htmlspecialchars($sinhvien['hoten']); ?></td>
                    <td><?php echo htmlspecialchars($sinhvien['mssv']); ?></td>
                    <td><?php echo htmlspecialchars($sinhvien['gioitinh']); ?></td>
                    <td class="action-links">
                        <a href="/sinhvien/edit/<?php echo $sinhvien['id']; ?>" class="btn-edit">Sửa</a>
                        <a href="/sinhvien/delete/<?php echo $sinhvien['id']; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?')">Xóa</a>
                    </td>
                </tr>
                <?php 
                    endforeach; 
                else: 
                ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Không có dữ liệu sinh viên.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php
                if (isset($totalPage) && $totalPage > 1) {
                    $pageSize = 5;
                    for ($i = 1; $i <= $totalPage; $i++) {
                        $offset = ($i - 1) * $pageSize;
                        echo "<a href='/sinhvien/index/$pageSize/$offset'>$i</a>";
                    }
                }
            ?>
        </div>

    </div>
</body>
</html>