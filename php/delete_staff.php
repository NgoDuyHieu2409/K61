<?php
    require("connect.php");

    // select id data
    $id = $_GET["id"];
    $sql = "DELETE FROM `user` WHERE id_user=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
    	header("location:manage_admin.php?err=false");
    }else{
    		header("location:manage_admin.php?err=true");
    }
    
    echo "$sql";
    mysqli_close($conn);
?>