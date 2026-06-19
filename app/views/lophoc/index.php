<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Danh sách lớp học'; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
        }

        .content-container {
            padding: 10px 30px 100px 30px; 
            max-width: 95%; 
            margin: 0 auto;
        }

        .page-title {
            color: #2c3e50;
            margin: 0 0 20px 0; 
            font-size: 26px;
            font-weight: 600;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            display: inline-block;
        }

        .toolbar-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .search-form {
            display: flex;
            gap: 6px;
            align-items: center;
            background: #fff;
            padding: 4px 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            margin: 0;
        }

        .pagesize-container {
            display: flex;
            align-items: center;
            gap: 4px;
            padding-right: 8px;
            border-right: 1px solid #cbd5e1;
        }

        .pagesize-input {
            width: 50px;
            padding: 5px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font-size: 13px;
            color: #334155;
            text-align: center;
            outline: none;
        }

        .pagesize-input:focus {
            border-color: #3498db;
        }

        .pagesize-label {
            font-size: 13px;
            color: #64748b;
            white-space: nowrap;
        }

        .search-input {
            padding: 6px 10px;
            border: none;
            font-size: 14px;
            color: #334155;
            width: 250px;
            outline: none;
        }

        .btn-search {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 7px 16px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
            white-space: nowrap;
        }

        .btn-search:hover {
            background-color: #2980b9;
        }

        .btn-add {
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            padding: 0 16px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(46, 204, 113, 0.2);
            transition: background 0.2s;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            height: 38px;
            box-sizing: border-box;
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
            padding: 14px 12px;
            text-transform: uppercase;
            font-size: 13px;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #eef2f3;
            color: #4f5d73;
            font-size: 14px;    
            white-space: nowrap;
        }

        tr:nth-child(even) { background-color: #fdfdfd; }
        tr:hover td { background-color: #f1f7fc; cursor: pointer; }
        td:first-child, th:first-child { text-align: center; width: 60px; }

        .action-links {
            text-align: center;
            width: 140px;
        }

        .action-links-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .action-links a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            white-space: nowrap;
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
        
        <div>
            <h1 class="page-title">Danh sách lớp học</h1>
        </div>
        
        <div class="toolbar-area">
            <form action="/lophoc/index" method="GET" class="search-form">
                <div class="pagesize-container">
                    <input type="number" name="pageSize" class="pagesize-input" min="1" max="100" value="<?php echo htmlspecialchars($pageSize ?? 5); ?>" onchange="this.form.submit()">
                    <span class="pagesize-label">dòng/Trang</span>
                </div>
            </form>

            <a href="/lophoc/create" class="btn-add">+ Thêm lớp học</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Ghi chú</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $uri = explode('/', $_SERVER['REQUEST_URI']);
                $current_offset = (isset($uri[4]) && is_numeric($uri[4])) ? (int)$uri[4] : 0;
                $stt = $current_offset + 1;

                if (!empty($lophocs)):
                    foreach ($lophocs as $lop): 
                ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <input type="hidden" value="<?php echo $lop['id']; ?>">
                    <td style="font-weight: bold;"><?php echo htmlspecialchars($lop['malop']); ?></td>
                    <td><?php echo htmlspecialchars($lop['tenlop']); ?></td>
                    <td><?php echo htmlspecialchars($lop['ghichu']); ?></td>
                    <td class="action-links">
                        <div class="action-links-container">
                            <a href="/lophoc/edit/<?php echo $lop['id']; ?>" class="btn-edit">Sửa</a>
                            <a href="/lophoc/delete/<?php echo $lop['id']; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này không?')">Xóa</a>
                        </div>
                    </td>
                </tr>
                <?php 
                    endforeach; 
                else: 
                ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 30px; color: #94a3b8;">Không có dữ liệu lớp học.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php
                if (isset($totalPage) && $totalPage > 1) {
                    $activeSize = isset($pageSize) ? $pageSize : 5;
                    $searchQuery = "?search=" . urlencode($search ?? '') . "&pageSize=" . urlencode($activeSize);
                    for ($i = 1; $i <= $totalPage; $i++) {
                        $offset = ($i - 1) * $activeSize;
                        echo "<a href='/lophoc/index/$activeSize/$offset$searchQuery'>$i</a>";
                    }
                }
            ?>
        </div>

    </div>
</body>
</html>