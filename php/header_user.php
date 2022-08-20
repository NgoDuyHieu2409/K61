<div class="menu navbar-custom d-flex navbar-light bg-light justify-content-between">
    <div>
         <a class="navbar-brand"  href="../index.php">
                        <img src="../images/logo.png" alt="Logo" style="width: 200px;margin-top: -5px;" />
                    </a>
    </div>
    <nav class="navbar navbar-expand-xl ">
        <button id="btnmenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav nav">
                <li class="header__notify-list-item notify__menu">
                <a href="check_book.php" class="header__notify-list-link" >Chọn bàn</a>
            </li>
            <li class="header__notify-list-item notify__menu">
                <a href="#1" class="header__notify-list-link" >Món Gà</a>
            </li>
            <li class="header__notify-list-item">
                <a href="#2" class="header__notify-list-link">Món Vịt</a>
            </li>
            <li class="header__notify-list-item">
                <a href="#3" class="header__notify-list-link">Món Bò </a>
            </li>
            <li class="header__notify-list-item">
                <a href="#4" class="header__notify-list-link">Món Dê</a>
            </li>
            <li class="header__notify-list-item">
                <a href="#5" class="header__notify-list-link">Món Lẩu </a>
            </li>
            <li class="header__notify-list-item">
                <a href="#8" class="header__notify-list-link">Món Hải Sản</a>
            </li>
            <li class="header__notify-list-item">
                <a href="#6" class="header__notify-list-link">Món Khai Vị</a>
            </li>
            <li class="header__notify-list-item">
                <a href="#7" class="header__notify-list-link">Đồ Uống</a>
            </li>
            <li class="header__notify-list-item">
                    <a href="thongkebanchay.php" class="header__notify-list-link"  >Thống Kê Món Bán Chạy</a>
                </li>
        </ul>   
        </div>
    </nav>
    <?php if(isset($_SESSION['login_user'])): ?>
            <ul class="navbar-nav nav mr-5 mt-2">
            
            <li class="reg_form ml-5"> 
                <label for="" style="margin-right: 20px;color: white; display: inline; text-transform: capitalize;">Nhân viên: <?=$data['ten_user']?></label>  
                <a class="btn btn-warning mt-1" href="logout.php" style="display: inherit; padding: 0; margin: 0; font-size:12px;">Logout</a> 
                </li>
            </ul>
        <?php endif; ?>
</div>

<!--  -->