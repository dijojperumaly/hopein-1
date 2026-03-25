<?php
ob_start();
date_default_timezone_set('Asia/Kolkata');
$present=date('Y-m-d H:i');
function currentDateTime(){
  $present=date('Y-m-d H:i');
}

//local server
$servername = "localhost";
$username = "root";
$password ="root";
$dbname = "db_gracepath";

//production server 1

/*$servername = "Localhost";
$username = "pothanicadchurch_db_vidyadhiraja";
//$password ="EJnP7JIypmPE";
$password ="B7Qc70M!1ff9";
$dbname = "pothanicadchurch_db_vidyadhiraja";*/

//production server 2

/*$servername = "Localhost";
$username = "n754b65_root";
$password ="root@edendesigns.in";
$dbname = "n754b65_db_donswebadmin";*/ 


// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
  die("Connection failed: DB Server not responding" );// $conn->connect_error);
}

?>