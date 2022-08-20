<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <?php require("../css/style.php");?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="header"><?php require("header.php"); ?></div>
        <div class="login__body container">
            <div class="row">
                <div class="login_form col-md-6">
                    <h1 class="display-5" style="font-weight:150; border-bottom: 1px solid white; padding-bottom: 13px;">Đăng nhập</h1>
                    <form action="session_user.php" method="post">
                    <div class="form-group">
                        <label >Số điện thoại :</label>
                        <input type="number" class="form-control"   value="" name="sdt" placeholder="Số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <label >Mật khẩu :</label>
                        <input type="password" class="form-control"  value="" name="password" placeholder="Mật khẩu" required>
                    </div>
                    <input type="submit" value=" Ðăng nhập" class="btn btn-info mb-3" name ="login" >
                    </form>
                    <div style = "font-size:15px;text-align: center; color:red; margin-top:10px 0px 30px 0px;"><?php if(isset($_SESSION['error'])){echo  $_SESSION['error'];unset($_SESSION['error']);} ?></div>
                </div>
            </div>
        </div>
   <div class="login__footer"></div>

</body>

</html>