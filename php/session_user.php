<?php   
include("connect.php");
session_start();
   if(isset($_POST['login'])) {
      // username and password sent from form

      $sdt = $_POST['sdt'];     

      $mypassword = $_POST['password'];

      $sql = "SELECT * FROM user WHERE sdt_user='$sdt' and matkhau = '$mypassword'";

      $result = $conn->query($sql);

      $count = mysqli_num_rows($result);


      // If result matched $sdt and $mypassword, table row must be 1 row

      if($count == 1) {

          $_SESSION['login_user'] = $sdt;
           $sql2="SELECT * FROM user where sdt_user = ".$_SESSION['login_user'];
                $result2 = $conn->query($sql2);
                $data = $result2->fetch_assoc();
          if($data['quyen_user']==0){
       
                echo "<script type='text/javascript'> window.location.assign('admin.php')</script>";
          }else{
         
            echo "<script type='text/javascript'> window.location.assign('check_book.php')</script>";
          }
      }else {
      
           echo "<script type='text/javascript'> window.location.assign('login.php')</script>";
         $_SESSION['error'] = "Bạn nhập sai số điện thoại hoặc mật khẩu";

      }

   }
 ?>

