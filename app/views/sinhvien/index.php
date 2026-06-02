<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
<style>

    .content-container {
        padding: 30px; 
        padding-bottom: 100px; 
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