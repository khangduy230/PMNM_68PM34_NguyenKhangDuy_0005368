<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="POST">
        
        <label for="hoten">Tên sinh viên</label><br>
        <input type="text" name="hoten" id="hoten" value="<?php echo $sinhvien['hoten']; ?>"><br><br>

        <label for="mssv">MSSV</label><br>
        <input type="text" name="mssv" id="mssv" value="<?php echo $sinhvien['mssv']; ?>"><br><br>

        <label for="gioitinh">Giới tính</label><br>
        <select name="gioitinh" id="gioitinh">
            <option value="nam" <?php echo ($sinhvien['gioitinh'] == 'nam') ? 'selected' : ''; ?>>Nam</option>
            <option value="nữ" <?php echo ($sinhvien['gioitinh'] == 'nữ') ? 'selected' : ''; ?>>Nữ</option>
            <option value="lgbt" <?php echo ($sinhvien['gioitinh'] == 'lgbt') ? 'selected' : ''; ?>>lgbt</option>
        </select><br><br>


        <input type="submit" value="Cập nhật thông tin">
    </form>
</body>
</html>