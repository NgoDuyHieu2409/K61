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
<?php require("header_admin.php") ?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h1 class="mt-4">Thống kê nhân viên đặt bàn</h1>
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
                      <th>Tên nhân viên</th>
                      <th>SDT</th>
                      <th>Số lượng bàn</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $sql = "select user.ten_user,user.sdt_user,count(`id_ban`) as soluongban from order_table  
                            left join user on order_table.id_user=user.id_user 
                            WHERE Day(order_table.`crate_at`) = DAY(CURDATE()) GROUP by  order_table.id_user order by soluongban desc";
                          $result = $conn->query($sql);
                       ?>
                       <?php foreach ($result as $value ): ?>
                        <tr>
                          <td><?=$value["ten_user"]?></td>
                          <td><?=$value["sdt_user"]?></td>
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
                      <th>Tên nhân viên</th>
                      <th>SDT</th>
                      <th>Số lượng bàn</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $sql = "select user.ten_user,user.sdt_user,count(`id_ban`) as soluongban from order_table  
                            left join user on order_table.id_user=user.id_user 
                            WHERE Month(order_table.`crate_at`) = Month(CURDATE()) GROUP by  order_table.id_user order by soluongban desc";
                          $result = $conn->query($sql);
                       ?>
                       <?php foreach ($result as $value ): ?>
                        <tr>
                          <td><?=$value["ten_user"]?></td>
                          <td><?=$value["sdt_user"]?></td>
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
                      <th>Tên nhân viên</th>
                      <th>SDT</th>
                      <th>Số lượng bàn</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $sql = "select user.ten_user,user.sdt_user,count(`id_ban`) as soluongban from order_table  
                            left join user on order_table.id_user=user.id_user 
                            WHERE year(order_table.`crate_at`) = year(CURDATE()) GROUP by  order_table.id_user order by soluongban desc";
                          $result = $conn->query($sql);
                       ?>
                       <?php foreach ($result as $value ): ?>
                        <tr>
                          <td><?=$value["ten_user"]?></td>
                          <td><?=$value["sdt_user"]?></td>
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