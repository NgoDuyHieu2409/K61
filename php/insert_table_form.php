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
    <title>Trang Thêm Bàn Ăn</title>
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
        <h2 style="text-align:center; color:red;">Thêm Bàn</h2>
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên Bàn :</label>
            <input type="text" class="form-control"  placeholder="Bàn 1" name="ten_banan" >
        </div>
        <button type="submit" class="btn btn-primary button " name ="submit">Thêm</button>
         <a href="manage_table.php" class="btn btn-info">Quay lại</a>  
    </form>
    
</body>
</html>
<?php
    require("connect.php");
    $id_banan="";
    $ten_banan_moi="";
    $sql1="select * FROM banan";
    $result = mysqli_query($conn,$sql1);
    while ($row = mysqli_fetch_assoc($result)){
        $ten_banan_cu = $row['ten_banan'];
    }
    if (isset($_POST["submit"])) {
        if(isset($_POST["ten_banan"])) { $ten_banan_moi = $_POST['ten_banan']; }
        if($ten_banan_moi=="")
        {
            echo "<script type='text/javascript'> window.location.assign('insert_table_form.php')</script>";
        }
        if($ten_banan_moi==$ten_banan_cu){
            echo "<script>alert('Tên bàn đã tồn tại !')</script>";
        }else{
            $insert="INSERT INTO `banan`(`ten_banan`) VALUES ('$ten_banan_moi')";
            $connect =mysqli_query($conn,$insert);
        
        if ($connect === TRUE) {
            // hàm chuyển đến trang khác
              echo "<script type='text/javascript'> window.location.assign('manage_table.php')</script>";
        
            echo '<script language="javascript">';
            echo 'alert("thêm thành công!")';
            echo '</script>';
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_connect_error();
    }
    }
}
?>