<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang create</title>
</head>
<body>
    <h1>Thêm sinh viên</h1>
    <form action="/sinhvien/store" method="POST">
        <label for="hoten">Tên sinh viên</label><br>
        <input type="text" name="hoten" id="hoten">
        <br><br>
        <label for="mssv">MSSV</label><br>
        <input type="text" name="mssv" id="mssv">
        <br><br>
        <label for="gioitinh">Giới tính</label><br>
        <select name="gioitinh" id="gioitinh">
            <option value="nam">Nam</option>
            <option value="nữ">Nữ</option>
            <option value="lgbt">lgbt</option>
        </select>
        <br><br>
        <input type="submit" value="Thêm sinh viên">
    </form>
</body>
</html>