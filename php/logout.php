<?php 
include("session_user.php");
session_destroy();
  echo "<script type='text/javascript'> window.location.assign('login.php')</script>";
 ?>