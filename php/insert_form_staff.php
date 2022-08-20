<?php 
    include('session_user.php');
    if(isset($_SESSION['login_user'])){
          $sql="SELECT * FROM user where sdt_user = ".$_SESSION['login_user'];
                $result = $conn->query($sql);
                $data = $result->fetch_assoc();
                if($data['quyen_user']==0){
                    
                    
                }else{
                  echo "<script type='text/javascript'> window.location.assign('check_book.php')</script>";

                }
    }else{
       echo "<script type='text/javascript'> window.location.assign('login.php')</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
   <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header_user.css">
    <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
       <div>
                <?php  require("header_admin.php");?>
            </div>
    <form style="margin:auto;width:80%;padding-top:20px;" action='' method='post'>
        <h2 style="text-align:center; color:red;">Thêm Nhân Viên</h2>
    <div class="form-group">
        <label >HỌ VÀ TÊN :</label>
        <input type="text" class="form-control"  placeholder="" name="hoten" >
    </div>
    <div class="form-group">
        <label >SỐ ĐIỆN THOẠI :</label>
        <input type="text" class="form-control"  placeholder="" name="sdt">
    </div>
    <div class="form-group">
        <label >EMAIL :</label>
        <input type="email" class="form-control"  placeholder="" name="email">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">CHỨC VỤ</label>
        <select class="form-control" name='chucvu' >
        <option value='0' >Admin</option>
        <option value='1' selected>Nhân viên</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">MẬT KHẨU :</label>
        <input type="password" class="form-control"  placeholder="" name='matkhau'>
    </div>

    <a href="manage_admin.php" class="btn btn-info">Quay lại</a>  
    <button type="submit" class="btn btn-primary button ">Thêm</button>  

    </form>
    
</body>
</html>
<?php
    require("connect.php");

    // insert database staff
    $hoten = "";
    $sdt = "";
    $email = "";
    $chucvu = "";
    $matkhau = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["hoten"])) { $hoten = $_POST['hoten']; }
        if(isset($_POST["sdt"])) { $sdt = $_POST['sdt']; }
        if(isset($_POST["email"])) { $email = $_POST['email']; }
        if(isset($_POST["chucvu"])) { $chucvu = $_POST['chucvu']; }
        if(isset($_POST["matkhau"])) { $matkhau = $_POST['matkhau']; }
        //Code xử lý, insert dữ liệu vào table
        
        if($hoten=="")
        {
            header("location:insert_form_staff.php"); 
            
            
        }
        else{
        $insert = "INSERT INTO user (ten_user, sdt_user, email_user,matkhau, quyen_user)
        VALUES ('$hoten', '$sdt', '$email', '$matkhau', '$chucvu' )";
        $connect =mysqli_query($conn,$insert);
        if ($connect === TRUE) {
                // hàm chuyển đến trang khác
              
                echo '<script language="javascript">';
                echo 'alert("thêm thành công!")';
                echo '</script>';
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_connect_error();
        }
        }
    }
    //Đóng database
    mysqli_close($conn);

?>