<style>
    .welcome-banner {
        background: linear-gradient(135deg, #3498db, #2c3e50);
        color: white;
        padding: 20px 30px; 
        border-radius: 10px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .welcome-banner h2 {
        margin: 0 0 4px 0;
        font-size: 24px; 
        font-weight: 700;
    }

    .welcome-banner p {
        margin: 0;
        font-size: 14px; 
        opacity: 0.85;
    }

    .dashboard-stats {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }

    .stat-card {
        flex: 1;
        background: #ffffff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-left: 5px solid #3498db;
    }

    .stat-card.classes {
        border-left-color: #2ecc71;
    }

    .stat-info h3 {
        margin: 0 0 5px 0;
        color: #64748b;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-info .stat-number {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #1e293b;
    }

    .quick-actions {
        background: #ffffff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .quick-actions h3 {
        margin: 0 0 15px 0;
        color: #2c3e50;
        font-size: 16px;
        font-weight: 600;
    }

    .action-grid {
        display: flex;
        gap: 12px;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .btn-blue {
        background-color: #3498db;
        color: white;
    }
    .btn-blue:hover {
        background-color: #2980b9;
    }

    .btn-green {
        background-color: #2ecc71;
        color: white;
    }
    .btn-green:hover {
        background-color: #27ae60;
    }
</style>

<div class="welcome-banner">
    <h2>Xin chào, Quản trị viên!</h2>
    <p>Chào mừng bạn đến với hệ thống quản lý đào tạo HUCE System. Hãy lựa chọn các tác vụ bên dưới để bắt đầu làm việc.</p>
</div>

<div class="dashboard-stats">
    <div class="stat-card">
        <div class="stat-info">
            <h3>Tổng số sinh viên</h3>
            <p class="stat-number">
                <?php echo isset($totalSinhVien) ? $totalSinhVien : '--'; ?>
            </p>
        </div>
    </div>

    <div class="stat-card classes">
        <div class="stat-info">
            <h3>Tổng số lớp học</h3>
            <p class="stat-number">
                <?php echo isset($totalLopHoc) ? $totalLopHoc : '--'; ?>
            </p>
        </div>
    </div>
</div>

<div class="quick-actions">
    <h3>Thao tác xử lý nhanh</h3>
    <div class="action-grid">
        <a href="/sinhvien/index" class="action-btn btn-blue">Quản lý sinh viên</a>
        <a href="/lophoc/index" class="action-btn btn-green">Quản lý lớp học</a>
    </div>
</div>