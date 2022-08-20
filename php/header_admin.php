


    <div class="menu navbar-custom d-flex navbar-light bg-light justify-content-between">
    <div>
        <a class="navbar-brand"  href="../index.php">
                        <img src="../images/logo.png" alt="Logo" style="width: 200px;margin-top: -5px;" />
                    </a>

    </div>
    <nav class="navbar navbar-expand-xl ">
        <button class="navbar-toggler" id="btnmenu" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav nav">

            <li class="header__notify-list-item">
                    <a href="admin.php" class="header__notify-list-link notification"  >Quản Lý Thực Đơn </a>
                </li>
                <li class="header__notify-list-item">
                    <a href="manage_table.php" class="header__notify-list-link notification"  >Quản Lý Bàn Ăn </a>
                </li>
                <li class="header__notify-list-item">
                    <a href="manage_admin.php" class="header__notify-list-link notification"  >Quản Lý Truy Cập </a>
                </li>
                <li class="header__notify-list-item">
                    <a href="manage_product.php" class="header__notify-list-link"  >Quản Lý Món Ăn</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="quanlyhoadon.php" class="header__notify-list-link"  >Quản Lý Hóa Đơn</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="thongke.php" class="header__notify-list-link"  >Thống Kê Doanh Thu</a>
                </li>
                 <li class="header__notify-list-item">
                    <a href="thongkenhanviendatban.php" class="header__notify-list-link"  >Thống Kê Nhân Viên Đặt Bàn</a>
                </li>
                <li class="header__notify-list-item">
                    <a href="thongkebanchay.php" class="header__notify-list-link"  >Thống Kê Món Bán Chạy</a>
                </li>

        </ul>   
        </div>
    </nav>
    <?php if(isset($_SESSION['login_user'])): ?>
            <ul class="navbar-nav nav mr-5 mt-1" id="info_login">
            
            <li class="reg_form ml-5"> 
                <label for="" style="color: white;"><?=isset($data)?$data['ten_user']:'Admin'?></label>  
                <a class="btn btn-warning" href="logout.php" style="display: inherit; padding: 0; margin: 0; font-size:12px;">Logout</a> 
                </li>
            </ul>
        <?php endif; ?>
</div>

<!--  -->