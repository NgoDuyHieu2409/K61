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
        <title>Trang Quản Lý Bàn Ăn</title>

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
        <h1 style="margin-bottom: 50px;" class="mt-4 text-center">Thông Tin Bàn Ăn</h1>
        <button class="btn btn-success button " style='margin-bottom:10px;'><a href="insert_table_form.php" style="color:white;">Thêm bàn ăn</a></button>
        <div >
              <table class="table table-dark table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Bàn</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require("connect.php");
                        //  select * from ql_nhanvien
                        $sql = "SELECT * FROM banan";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0){
                                                
                        while ($row = mysqli_fetch_assoc($result)){
                ?>            
                    <tr>
                        <td><?php echo $row['id_banan'] ?></td>
                        <td><?php echo $row['ten_banan'] ?></td>
                        <td><a class="btn btn-danger" onclick='return(confirm(`Bạn xác nhận muốn xóa ?`))' href="delete_manage_table.php?id=<?php echo $row['id_banan']; ?>">xóa</a></td>
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </body>
<script type="text/javascript">
    $(document).ready( function () {
  
    $('#myTable').DataTable();
} );
</script>
</html>