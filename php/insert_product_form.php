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
    <title>Thêm Sản Phẩm</title>
    <?php  require("../css/style.php")?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    
</head>
<body>
    <form style="margin:auto;width:80%;padding-top:20px;" action='' method='post' enctype="multipart/form-data">
        <h2 style="text-align:center; color:red;">Thêm Sản Phẩm</h2>
        <div class="form-group">
            <label for="exampleFormControlInput1">SẢN PHẨM:</label>
            <input type="text" class="form-control"  name="ten_sp" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">GIÁ SẢN PHẨM :</label>
            <input type="text" class="form-control"  name="gia_sp">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">KHUYẾN MÃI :</label>
            <input type="khuyenmai_sp" class="form-control"   name="khuyenmai_sp">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">LOẠI SẢN PHẨM</label>
            <select class="form-control" name='loai_sp' >
            <option value='1' >gà</option>
            <option value='2' >vịt</option>
            <option value="3" >bò</option>
            <option value="4" >dê</option>
            <option value="5" >lẩu</option>
            <option value="6" >khai vị</option>
            <option value="7" >đồ uống</option>
            <option value="8" >hải sản</option>
            </select>
        </div>
        <div class="mb-4">
            <label class=""> ẢNH :</label>
        <input type="file" class="" id="" name="img" >
        
        </div>
        <br>
      
        <button type="submit" class="btn btn-primary button " name="submit" >Thêm mới</button>  
         <a href="manage_product.php" class="btn btn-info">Quay lại</a>  
    </body>
</html>
<?php
    require("connect.php");

    // insert database staff
    $ten_sp = "";
    $gia_sp = "";
    $khuyenmai_sp = "";
    $file = "";
    $loai_sp="";
     $img="";
    function randomString()
    {
        $random = substr(md5(mt_rand()), 0, 7);
        return $random;
    }
    if (isset($_POST['submit'])) {
        if(isset($_POST["ten_sp"])) { $ten_sp = $_POST['ten_sp']; }
        if(isset($_POST["gia_sp"])) { $gia_sp = $_POST['gia_sp']; }
        if(isset($_POST["khuyenmai_sp"])) { $khuyenmai_sp = $_POST['khuyenmai_sp']; }
        if(isset($_FILES['img'])){

            $img = $_FILES["img"]["name"];
            if($img ==""){
                $random="job.jpg";
            }else {$random =randomString().$img;}

}



        if(isset($_POST["loai_sp"])) { $loai_sp = $_POST['loai_sp']; }
        
        //Code xử lý, insert dữ liệu vào table
        
        if($ten_sp=="")
        {
           
            echo "<script type='text/javascript'> window.location.assign('insert_product_form.php')</script>";
            
        }
        else{
            move_uploaded_file($_FILES['img']['tmp_name'], '../image/'.$random);
        $insert = "INSERT INTO sp (ten_sp, gia_sp, khuyenmai_sp,img_sp,loai_sp)
        VALUES ('$ten_sp', '$gia_sp', '$khuyenmai_sp','$random','$loai_sp' )";
        $connect =mysqli_query($conn,$insert);
        if ($connect === TRUE) {
                // hàm chuyển đến trang khác
                  echo "<script type='text/javascript'> window.location.assign('manage_product.php?err=false')</script>";     
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_connect_error();
        }
        }
    }
    //Đóng database
    mysqli_close($conn);

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
</script>  -->