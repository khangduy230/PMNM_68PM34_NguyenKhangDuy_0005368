<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
        /* Toàn bộ phông chữ hệ thống hiện đại */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 30px;
            margin: 0;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 600;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            display: inline-block;
        }

        /* Khung chứa bảng để làm hiệu ứng bo góc và đổ bóng mượt hơn */
        .table-container {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Xóa khoảng cách giữa các viền ô */
            text-align: left;
        }

        /* Định dạng thanh tiêu đề (Header) */
        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
            padding: 14px 16px;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        /* Định dạng các ô dữ liệu */
        td {
            padding: 12px 16px;
            border-bottom: 1px solid #eef2f3;
            color: #4f5d73;
            font-size: 15px;
        }

        /* Đổ màu xen kẽ cho các hàng (Zebra Striping) */
        tr:nth-child(even) {
            background-color: #fdfdfd;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Hiệu ứng nổi bật khi di chuột vào hàng */
        tr:hover td {
            background-color: #f1f7fc;
            color: #2c3e50;
            cursor: pointer;
        }

        /* Định dạng riêng cho cột STT để căn giữa */
        td:first-child, th:first-child {
            text-align: center;
            width: 70px;
        }
    </style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>MSSV</th>
            <th>Giới tính</th>
        </tr>
        <?php foreach ($sinhviens as $index => $sinhvien): ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo $sinhvien['hoten']; ?></td>
            <td><?php echo $sinhvien['mssv']; ?></td>
            <td><?php echo $sinhvien['gioitinh']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>