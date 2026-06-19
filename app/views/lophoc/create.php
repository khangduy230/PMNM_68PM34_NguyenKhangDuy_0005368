<style>
    .page-title {
        color: #2c3e50;
        margin-bottom: 24px;
        font-size: 26px;
        font-weight: 700;
        border-bottom: 3px solid #38bdf8;
        padding-bottom: 8px;
        display: inline-block;
    }

    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        max-width: 600px;
        margin-top: 10px;
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
        transition: border-color 0.2s;
    }

    .form-group input:focus, 
    .form-group textarea:focus {
        outline: none;
        border-color: #3498db;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 25px;
    }

    .btn-save {
        background-color: #10b981;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        transition: all 0.2s ease;
    }

    .btn-save:hover {
        background-color: #059669;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);
    }

    .btn-cancel {
        color: #64748b;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: color 0.2s;
    }

    .btn-cancel:hover {
        color: #334155;
    }
</style>

<h1 class="page-title">Thêm lớp học mới</h1>

<div class="form-container">
    <form action="/lophoc/store" method="POST">
        <div class="form-group">
            <label for="malop">Mã Lớp <span style="color: #ef4444;">*</span></label>
            <input type="text" id="malop" name="malop" required placeholder="Ví dụ: 35IT1">
        </div>
        
        <div class="form-group">
            <label for="tenlop">Tên Lớp Học <span style="color: #ef4444;">*</span></label>
            <input type="text" id="tenlop" name="tenlop" required placeholder="Ví dụ: Công nghệ thông tin">
        </div>
        
        <div class="form-group">
            <label for="ghichu">Ghi chú</label>
            <textarea id="ghichu" name="ghichu" rows="4" placeholder="Nhập thông tin ghi chú bổ sung..."></textarea>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn-save">Lưu dữ liệu</button>
            <a href="/lophoc/index" class="btn-cancel">Hủy bỏ</a>
        </div>
    </form>
</div>