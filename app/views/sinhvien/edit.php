<style>
    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        max-width: 600px;
        margin-top: 20px;
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

    .form-group input, 
    .form-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 15px;
        color: #334155;
        box-sizing: border-box;
        transition: border-color 0.2s, box-shadow 0.2s;
        font-family: inherit;
        background-color: #fff;
    }

    .form-group input:focus, 
    .form-group select:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 25px;
    }

    .btn-save {
        background-color: #f59e0b;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(245, 158, 11, 0.2);
        transition: all 0.2s ease;
    }

    .btn-save:hover {
        background-color: #d97706;
        box-shadow: 0 4px 6px rgba(245, 158, 11, 0.3);
    }

    .btn-cancel {
        color: #64748b;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: color 0.2s;
    }

    .btn-cancel:hover {
        color: #1e293b;
    }

    .select2-container .select2-selection--single {
        height: 42px !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 6px !important;
        padding: 6px 10px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #334155 !important;
        font-size: 15px !important;
        padding-left: 0 !important;
    }
    .select2-container {
        width: 100% !important;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h1 style="color: #2c3e50; margin: 0 0 10px 0; font-size: 28px; font-weight: 600; border-bottom: 2px solid #3498db; padding-bottom: 10px; display: inline-block;">
    Sửa thông tin sinh viên
</h1>

<div class="form-container">
    <form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="POST">
        
        <div class="form-group">
            <label for="hoten">Tên sinh viên <span style="color: #ef4444;">*</span></label>
            <input type="text" name="hoten" id="hoten" value="<?php echo htmlspecialchars($sinhvien['hoten']); ?>" required placeholder="Nhập họ và tên sinh viên">
        </div>

        <div class="form-group">
            <label for="mssv">MSSV <span style="color: #ef4444;">*</span></label>
            <input type="text" name="mssv" id="mssv" value="<?php echo htmlspecialchars($sinhvien['mssv']); ?>" required placeholder="Nhập mã số sinh viên">
        </div>

        <div class="form-group">
            <label for="gioitinh">Giới tính</label>
            <select name="gioitinh" id="gioitinh">
                <option value="nam" <?php echo ($sinhvien['gioitinh'] == 'nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="nữ" <?php echo ($sinhvien['gioitinh'] == 'nữ' || $sinhvien['gioitinh'] == 'nu') ? 'selected' : ''; ?>>Nữ</option>
                <option value="lgbt" <?php echo ($sinhvien['gioitinh'] == 'lgbt') ? 'selected' : ''; ?>>LGBT</option>
            </select>
        </div>

        <div class="form-group">
            <label for="malop">Lớp học học tập <span style="color: #ef4444;">*</span></label>
            <select name="malop" id="malop" class="select2-enable" required>
                <option value="">-- Chọn lớp học --</option>
                <?php if(!empty($lophocs)): ?>
                    <?php foreach($lophocs as $lop): ?>
                        <option value="<?php echo htmlspecialchars($lop['malop']); ?>" <?php echo ($sinhvien['malop'] == $lop['malop']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lop['malop'] . ' - ' . $lop['tenlop']); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Cập nhật thông tin</button>
            <a href="/sinhvien/index" class="btn-cancel">Hủy bỏ</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2-enable').select2({
            placeholder: "-- Chọn lớp học --",
            allowClear: true
        });
    });
</script>