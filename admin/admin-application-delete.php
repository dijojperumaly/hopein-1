<?php
include_once("adminsession.php");
include_once("db_connection.php");
error_reporting(0);
$status=array('status'=>'success');

//if (isset($_POST["submit"])) {

	if(isset($_GET["delid"])){		
		$id=$_GET["delid"];
		
		$stmt = $con->prepare("DELETE FROM tbl_applications
			WHERE 	appid IN($id)");
		//$stmt->bind_param("s", $id);
	
		if($stmt->execute()){
			$status=['status'=>'success'];
		}
		else{
			$status=['status'=>'fail'];
		}
		$stmt->close();
	}		
//}
$con->close();
echo json_encode($status);
?>
