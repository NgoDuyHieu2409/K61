<?php
require("session_user.php");
if (isset($_SESSION['login_user'])) {
  $sql2 = "SELECT * FROM user where sdt_user = " . $_SESSION['login_user'];
  $result2 = $conn->query($sql2);
  $data = $result2->fetch_assoc();
  if ($data['quyen_user'] == 1) {
  } else {

    echo "<script type='text/javascript'> window.location.assign('admin.php')</script>";
  }
} else {
  echo "<script type='text/javascript'> window.location.assign('login.php')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check book</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/header_user.css">
  <!-- <link rel="stylesheet" href="../css/index.css"> -->
  <link rel="stylesheet" href="../css/book_product.css">
  <link rel="stylesheet" href="../css/check_book.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/header_user.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <?php require("../css/style.php"); ?>
</head>

<body>

  <div class="loader">
    <img src="../image/loading.svg">
  </div>

  <?php



  require("header_checkbook.php")
  ?>
  <div class="checkbook__body ">

    <div class="checkbook__header">
      <h4 class="header__text" style="text-align:center;">DANH SÁCH BÀN ĐẶT</h4>
    </div>
    <div class="row " id="row-item">

    </div>
  </div>

</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(window).on('load', function(event) {
    $('body').removeClass('preloading');
    $('.loader').delay(200).fadeOut('fast');
  });
  load();
  $(document).ready(function() {

    setInterval(function() {

      load();

    }, 3000);
  });

  function load() {
    $.ajax({
      url: "ajax_admin.php",
      success: function(result) {
        $("#load").html(result);

      }
    });

    $.ajax({

      url: "select_book.php",
      success: function(result) {
        $("#row-item").html(result);

      }
    });
  }
</script>