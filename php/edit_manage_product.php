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
<?php
    require("connect.php");

    // select id data
    $id =$_GET['id'];
    $sql = "SELECT * FROM sp WHERE id_sp= $id";
    $result = mysqli_query($conn,$sql);
    
    $row = mysqli_fetch_array($result);
      $id_sp=$row['id_sp'];
      $ten_sp = $row['ten_sp'];
      $gia_sp = $row['gia_sp'];
      $khuyenmai_sp = $row['khuyenmai_sp'];
      $file = $row['img_sp'];
      $loai_sp=$row['loai_sp'];
       
   

    mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa Thông Tin Sản Phẩm</title>
  <?php  require("../css/style.php")?>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<form style="margin:auto;width:80%;padding-top:20px;" action='' method='post'  enctype="multipart/form-data">
        <h2 style="text-align:center; color:red;">Sửa Thông Tin Sản Phẩm</h2>
        <div class="form-group">
            <label for="exampleFormControlInput1">ID:</label>
            <input type="text" class="form-control"   name="id_sp"  readonly value="<?php echo  $id_sp;?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">SẢN PHẨM:</label>
            <input type="text" class="form-control"   name="ten_sp" value="<?php echo  $ten_sp;?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">GIÁ SẢN PHẨM :</label>
            <input type="text" class="form-control"   name="gia_sp" value="<?php echo  $gia_sp;?>"/>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">KHUYẾN MÃI :</label>
            <input type="khuyenmai_sp" class="form-control"  placeholder="0$" name="khuyenmai_sp" value="<?php echo  $khuyenmai_sp;?>"/>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">LOẠI SẢN PHẨM</label>
            <select class="form-control" name='loai_sp' >
            <option value='1' >gà</option>
            <option value='2' >vịt</option>
            <option value="3" class="value">bò</option>
            <option value="4" class="value">dê</option>
            <option value="5" class="value">lẩu</option>
            <option value="6" class="value">khai vị</option>
            <option value="7" class="value">đồ uống</option>
            <option value="8" class="value">hải sản</option>
            </select>
        </div>
        <label class="" > ẢNH :</label>

        <div class="mb-4">
           <img id="image-product" style="width: 100px;" src="<?php echo "../image/".$file ?>" alt="your image" />
        <input type="file" name="img">
        
        </div>
        
        
        <button type="submit" class="btn btn-primary button " name="submit">Chỉnh sửa</button>  
        <a href="manage_product.php" class="btn btn-info">Quay lại</a>  
</form>
</body>
</html>
<?php
require("connect.php");

// insert database staff
   
 
  


if (isset($_POST['submit'])) {
        if(isset($_POST["ten_sp"])) { $ten_sp2 = $_POST['ten_sp'];}else {$ten_sp2 = $ten_sp; }
        if(isset($_POST["gia_sp"])) { $gia_sp2 = $_POST['gia_sp'];}else {$gia_sp2 = $gia_sp; }
        if(isset($_POST["khuyenmai_sp"])) { $khuyenmai_sp2 = $_POST['khuyenmai_sp'];}else {$gia_sp2 = $gia_sp; }
        if(isset($_FILES['img'])){

            $img = $_FILES["img"]["name"];
            if($img ==""){
                $random=$file;
            }else {$random =$img;}
            move_uploaded_file($_FILES['img']['tmp_name'], '../image/'.$random);
        }else{
           $random=$file;
        }

    //Code xử lý, insert dữ liệu vào table
    $insert = "UPDATE sp SET ten_sp='$ten_sp2', gia_sp=$gia_sp2,khuyenmai_sp='$khuyenmai_sp2', img_sp='$random'
   WHERE id_sp = $id_sp";
   $result = mysqli_query($conn,$insert);
 

      if ($result === TRUE) {
           // hàm chuyển đến trang khác
         
             echo "<script type='text/javascript'> window.location.assign('manage_product.php')</script>";
           // end
           echo '<script language="javascript">';
           echo 'alert("sửa  thành công!")';
           echo '</script>';

       } else {
           echo "Error: " . $insert . "<br>" . mysqli_connect_error();
       }
    

//Đóng database
mysqli_close($conn);
}
?>

<!-- <script type="text/javascript"> 
   function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image-product').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#input-image").change(function() {
  readURL(this);
});
</script> 
 -->