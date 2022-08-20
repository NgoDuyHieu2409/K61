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
    <title>Quản Lý Sản Phẩm</title>
     <?php  require("../css/style.php")?>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header_user.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <link rel="stylesheet" href="../css/datatable.css">
        <script type="text/javascript" src="../script/datatable.js"></script>
</head>
<body>
  
    <div class="container-fuild">
            <div>
                <?php require("header_admin.php");?>
            </div>
        <div style='margin-top:70px;' class="m-3">     
            <h1 style="margin-bottom: 50px;" class="mt-4 text-center">Quản Lý Món Ăn</h1>
             <?php 
                    if(isset($_GET['err'])){
                      
                        if($_GET['err']=='false'){
                             echo '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Thông báo !</strong> Thêm mới món ăn thành công !</strong>
                                  </div>';
                        }else{
                           
                            echo '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Thông báo!</strong> Thêm mới món ăn thất bại
                                  </div>';
                        }
                    }
                 ?>
            <button class="btn btn-success button " style='margin-bottom:10px;'><a href="insert_product_form.php" style="color:white;">Thêm món ăn</a></button>
            <table class="table table-dark table-hover" id="myTable">
                <thead class="thead-purple">
                    <th>Tên món ăn</th>
                    <th>Giá sản phẩm</th>
                    <th>Khuyến mãi</th>
                    <th>Giá khuyến mãi</th>
                    <th>Hình ảnh</th>
                    <th>Tình trạng</th>
                    <th>Sửa</th>
                    <th>Xóa</th>

                </thead>
                <tbody>
                <?php
                    require("connect.php");
                    //  select * from ql_nhanvien
                    $sql = "SELECT * FROM sp";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0){
                                            
                    while ($row = mysqli_fetch_assoc($result)){
                    $khuyenmai=$row["khuyenmai_sp"];
                    $gia_sp=$row["gia_sp"];
                    $giakhuyenmai=$gia_sp-(($gia_sp * $khuyenmai)/100);
                    $id= $row["id_sp"];
                    $image=$row['img_sp'];
                    $image_src='../image/'.$image;
                    
                    echo "<tr><td>"
                    .$row["ten_sp"].
                    "</td><td>"
                    .$row["gia_sp"].
                    " đ</td><td>"
                    .$row["khuyenmai_sp"].
                    "%</td><td>"
                    .$giakhuyenmai.
                    " đ</td><td>";
                    
                    echo "<div> <img  src=$image_src  style=' width:100px'></div></td>";
                    if($row["trangthai"]=="1"){
                        echo "<td><a class='btn btn-success' href='update_product_status.php?id=$id&status=0'\">Còn hàng</a>
                    </td>";
                    }else{
                        echo "<td><a class='btn btn-warning' href='update_product_status.php?id=$id&status=1'\">Hết hàng</a>
                    </td>";
                    }
                    echo" <td><a class='btn btn-primary' href='edit_manage_product.php?id=$id'\">Sửa</a>
                    </td><td>
                    <a class='btn btn-danger' onclick='return(confirm(`Bạn xác nhận muốn xóa ?`))'  href='delete_manage_product.php?id=$id'\">Xóa</a>
                    </td></tr>";
                    }
                    }
                    else{
                        echo" 0 result";
                        }
                    mysqli_close($conn);

                ?>
                </tbody>
            </table>  
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready( function () {
   setTimeout(function(){ $(".alert").hide(); }, 2000);
    $('#myTable').DataTable();
} );
</script>
</body>
</html>