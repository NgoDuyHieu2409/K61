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
    <title>Quản Lý Đăng Nhập</title>
    <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header_user.css">
    <link rel="stylesheet" href="../css/admin.css">
     <link rel="stylesheet" href="../css/datatable.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="../script/datatable.js"></script>
   
</head>
<body>
 
    <div class="container-fuild">
            <div>
                <?php  require("header_admin.php");?>
            </div>
            <div class="container__body">
                <h1 style="margin-bottom: 50px;" class="mt-4 text-center">Quản lý tài khoản truy cập</h1>

                <?php 
                    if(isset($_GET['err'])){
                      
                        if($_GET['err']=='false'){
                             echo '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Thông báo !</strong> Xóa tài khoản thành công !</strong>
                                  </div>';
                        }else{
                           
                            echo '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Thông báo!</strong> Tài khoản này đã có dữ liệu order không thể xóa 
                                  </div>';
                        }
                    }
                 ?>
                
                <div >
                    <button type="button" class="btn btn-success button "><a href="insert_form_staff.php" class="" style="color:white;">Thêm tài khoản</a></button>
                </div>
                <table class="table table-dark table-hover" id="myTable">
                    <thead class='thead-purple'>
                        <tr>
                            <th>Họ tên</th>    
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Chức vụ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php 
                            require("connect.php");
                            $sql = "SELECT * FROM user";
                            $result = mysqli_query($conn,$sql);
                            
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id=$row['id_user'];
                                    $quyen="";
                                    if($row["quyen_user"]){
                                        $quyen="nhân viên ";
                                    }else{
                                        $quyen="admin"; 
                                    } 
                                 
                                    echo"<tr><td>"
                                    .$row["ten_user"].
                                    "</td><td>"
                                    .$row["sdt_user"].
                                    "</td><td>"
                                    .$row["email_user"].
                                    "</td><td>"
                                    .$quyen.
                                    "</td>
                                    <td><a class='btn btn-primary' href='edit_form_staff.php?id=$id'\">Sửa</a></td>
                                    <td><a class='btn btn-danger' onclick='return(confirm(`Bạn xác nhận muốn xóa ?`))' href='delete_staff.php?id=$id'\">Xóa</a></td>
                                    </tr>";

                                }
                            }    
                        ?>
                    </tbody>
                </table>
            </div>        
    </div>
</body>
<script type="text/javascript">
    $(document).ready( function () {
   setTimeout(function(){ $(".alert").hide(); }, 2000);
    $('#myTable').DataTable();
} );

</script>
</html>