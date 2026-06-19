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
    .form-group textarea {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 15px;
        color: #334155;
        box-sizing: border-box; 
        transition: border-color 0.2s, box-shadow 0.2s;
        font-family: inherit;
    }

    .form-group input:focus, 
    .form-group textarea:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    .form-group input:disabled {
        background-color: #f1f5f9;
        color: #64748b;
        cursor: not-allowed;
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

    /* Định dạng nút Hủy bỏ */
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
</style>

<h1 style="color: #2c3e50; margin: 0 0 10px 0; font-size: 28px; font-weight: 600; border-bottom: 2px solid #3498db; padding-bottom: 10px; display: inline-block;">
    Chỉnh sửa lớp học
</h1>

<div class="form-container">
    <form action="/lophoc/update/<?php echo $lop['id']; ?>" method="POST">
        
        <div class="form-group">
            <label>ID Hệ thống</label>
            <input type="text" value="<?php echo htmlspecialchars($lop['id']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="malop">Mã Lớp <span style="color: #ef4444;">*</span></label>
            <input type="text" id="malop" name="malop" value="<?php echo htmlspecialchars($lop['malop']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="tenlop">Tên Lớp Học <span style="color: #ef4444;">*</span></label>
            <input type="text" id="tenlop" name="tenlop" value="<?php echo htmlspecialchars($lop['tenlop']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="ghichu">Ghi chú</label>
            <textarea id="ghichu" name="ghichu" rows="4"><?php echo htmlspecialchars($lop['ghichu'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn-save">Cập nhật</button>
            <a href="/lophoc/index" class="btn-cancel">Hủy bỏ</a>
        </div>
    </form>
</div>