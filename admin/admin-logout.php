<?php
ob_start();
session_start();
if(isset($_SESSION['admin_user_id'])){
    unset($_SESSION['admin_user_id']);
    unset($_SESSION['admin_user_name']);
    unset($_SESSION['role']);
    $_SESSION['admin_user_id']="";
    session_destroy();
    header("location:admin-login.php");
}
else{
    header("location:admin-login.php");
}

?>