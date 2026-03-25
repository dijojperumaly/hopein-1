<?php
ob_start();
//error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$allowed_imagetype = array('gif', 'png', 'jpg','jpeg','GIF','JPG','JPEG','PNG');
$allowed_documenttype = array('doc', 'docx', 'xls','xlsx','pdf','txt','DOC','DOCX','XLS','XLSX','PDF','TXT');
session_start();

if(isset($_SESSION['admin_user_id']) && $_SESSION['admin_user_id']!=""){
    $user_id=$_SESSION['admin_user_id'];
    $user_name=$_SESSION['admin_user_name'] ;
    $role=$_SESSION['role'] ;
}
else{
    header("location:admin-login.php");
}

?>