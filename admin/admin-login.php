<?php
include_once("db_connection.php");
$err_message="";
if(isset($_POST['submit'])){
    $txtusername = $_POST['txtloginid'];
	$txtpassword = $_POST['txtpassword'];
    $user_id = 0;
    $status = "";

    $stmt = $con->prepare("SELECT id, name, username, password,role, status FROM tbl_admin WHERE username=? LIMIT 1");
    $stmt->bind_param('s', $txtusername);
    $stmt->execute();
    $stmt->bind_result($id, $name,$username, $password,$role, $status);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {
                if($password!=$txtpassword){
                    $err_message= "Incorrect Password.";  
                }
                else if ($status != 'Active') {
				    $err_message= "YOUR account has been DEACTIVATED.";                   
                } else {
				   session_start();
				   $_SESSION['admin_user_id'] = $id;
				   $_SESSION['admin_user_name'] = $name;
                   $_SESSION['role'] = $role;                   
                   //$err_message= 'Success!';
                   header("location:./admin-application-list.php");
                }
           }

    }
    else {
        $err_message= "INVALID USERNAME/PASSWORD !";
    }
    $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Education Master Template</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Education master is one of the best educational html template, it's suitable for all education websites like university,college,school,online education,tution center,distance education,computer education">
    <meta name="keyword" content="education html template, university template, college template, school template, online education template, tution center template">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>

   <section>
		<div class="ad-log-main" style="position:relative !important;">
			<div class="ad-log-in" style="margin-bottom: 50px;" >
				<div class="ad-log-in-logo" >
					<a href="index.php"><img src="images/log.png" alt=""></a>
				</div>
                <div class="lg-12 md-12 sm-12 ad-log-in-con">
                    <div class="log-in-pop-right" style="width:100%;">
                        <h4>Login</h4>
                        <!--<p>Don't have an account? Create your account. It's take less then a minutes</p>-->
                        <form method="post" action="">
                            <div>
                                <div class="input-field s12">
                                    <input type="text" id="txtloginid" name="txtloginid" data-ng-model="name" class="validate">
                                    <label class="">User name</label>
                                </div>
                            </div>
                            <div>
                                <div class="input-field s12">
                                    <input type="password" id="txtpassword" name="txtpassword" class="validate">
                                    <label>Password</label>
                                </div>
                                <p style="color:red;"><?php echo $err_message; ?></p>
                            </div>
                            <div>
                                <div class="s12 log-ch-bx">
                                    <p>
                                        <input type="checkbox" id="test5">
                                        <label for="test5">Remember me</label>
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div class="input-field s4">
                                    <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style="">
                                        <input type="submit" id="submit" name="submit" value="Login" class="waves-button-input"></i> 
                                </div>
                            </div>
                            <div>
                                <div class="input-field s12"> <a href="admin-forgot.php">Forgot password</a>  
                                <!-- |<a href="#">Create a new account</a>--> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>		
   </section>

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>