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
    $id =$_GET["id"];
    $sql = "DELETE FROM banan WHERE id_banan=$id";
    $result = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'> window.location.assign('manage_table.php')</script>";
    mysqli_close($conn);
?>                              