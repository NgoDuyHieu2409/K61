<?php 
include('session_user.php');
if(isset($_SESSION['login_user'])){
  $sql="SELECT * FROM user where sdt_user = ".$_SESSION['login_user'];
  $result = $conn->query($sql);
  $data = $result->fetch_assoc();
  if($data['quyen_user']==0||$data['quyen_user']==1){


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
  <title>Trang Quản Lý</title>
  <?php  require("../css/style.php")?>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/header_user.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="../script/print.min.js"></script>
  <style type="text/css">
    .dataTables_filter,.dataTables_paginate {
      float: right;
    }
  </style>
</head>
<?php 
 if($data['quyen_user']==0){
   require("header_admin.php");

  }else{
    ?> 
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
  <?php  
  }
 ?>


<body class="sb-nav-fixed">

    <div id="layoutSidenav">
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h1 class="mt-4">Thống kê món ăn bán chạy</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Thống kê số lượng bán theo ngày / tháng / năm </li>
            </ol>
           
           </div>
           <div class="card mb-4 m-3">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Hôm nay :</div>
            <div class="card-body">
                    
                <table class="table  table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>Tên món</th>
                      <th>Số lượng bán</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $sql = "select sp.ten_sp,sum(oder_item.soluong_sp) as soluongban from oder_item left join sp on oder_item.id_sp = sp.id_sp WHERE Day(oder_item.create_date) = DAY(CURDATE()) GROUP by ten_sp order by soluongban desc ";
                          $result = $conn->query($sql);
                       ?>
                       <?php foreach ($result as $value ): ?>
                        <tr>
                          <td><?=$value["ten_sp"]?></td>
                          <td><?=$value["soluongban"]?></td>
                          </tr>
                       <?php endforeach; ?>
                  </tbody>
                </table>
             
            </div>
          </div>
      
           <div class="card mb-4 m-3">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Tháng này :</div>
            <div class="card-body">
                    
                <table class="table  table-hover" id="myTable2">
                  <thead>
                    <tr>
                      <th>Tên món</th>
                      <th>Số lượng bán</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $sql = "select sp.ten_sp,sum(oder_item.soluong_sp) as soluongban from oder_item left join sp on oder_item.id_sp = sp.id_sp WHERE Month(oder_item.create_date) = Month(CURDATE()) GROUP by ten_sp order by soluongban desc ";
                          $result = $conn->query($sql);
                       ?>
                       <?php foreach ($result as $value ): ?>
                        <tr>
                          <td><?=$value["ten_sp"]?></td>
                          <td><?=$value["soluongban"]?></td>
                          </tr>
                       <?php endforeach; ?>
                  </tbody>
                </table>
             
            </div>
            
       </div>
       <div class="card mb-4 m-3">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Năm này :</div>
            <div class="card-body">
                    
                <table class="table  table-hover" id="myTable3">
                  <thead>
                    <tr>
                      <th>Tên món</th>
                      <th>Số lượng bán</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $sql = "select sp.ten_sp,sum(oder_item.soluong_sp) as soluongban from oder_item left join sp on oder_item.id_sp = sp.id_sp WHERE Year(oder_item.create_date) = Year(CURDATE()) GROUP by ten_sp order by soluongban desc ";
                          $result = $conn->query($sql);
                       ?>
                       <?php foreach ($result as $value ): ?>
                        <tr>
                          <td><?=$value["ten_sp"]?></td>
                          <td><?=$value["soluongban"]?></td>
                          </tr>
                       <?php endforeach; ?>
                  </tbody>
                </table>
             
            </div>
          </div>
     </main>

   </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 <script src="js/scripts.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
 <script src="assets/demo/chart-area-demo.js"></script>
 <script src="assets/demo/chart-bar-demo.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
 <script src="assets/demo/datatables-demo.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
    $('#click').change(function(){
      var value = $("#click").val();
      $.ajax({
        url:'static/ajax_admin_thongkenam.php',
        method : 'POST',
        dataType: 'html',
        data: {
         value:value,
       }
     }).done(function(ketqua){
      $("#data").html(ketqua);
    });
   })
  });
</script>
   <script type="text/javascript">
    $(document).ready( function () {
   setTimeout(function(){ $(".alert").hide(); }, 2000);
    $('#myTable').dataTable({ "bSort" : false } );
     $('#myTable2').dataTable({ "bSort" : false } );
      $('#myTable3').dataTable({ "bSort" : false } );
} );
</script>
</body>
</html>