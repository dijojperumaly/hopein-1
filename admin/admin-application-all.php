<?php
//include_once("adminsession.php");
include_once("db_connection.php");

$sql = "SELECT
        appid,
        IFNULL(admissionyear, '') AS admissionyear,
        IFNULL(regno, '') AS regno,
        IFNULL(name, '') AS name,
        IFNULL(contact, '') AS contact,
        IFNULL(email, '') AS email,
        IFNULL(course, '') AS course,
        IFNULL(college, '') AS college,
        IFNULL(parentname, '') AS parentname,
        IFNULL(parentoccupation, '') AS parentoccupation,
        IFNULL(parentcontact, '') AS parentcontact,
        IFNULL(address, '') AS address,
        IFNULL(dateofbirth, '') AS dateofbirth,
        IFNULL(aadhar, '') AS aadhar,
        IFNULL(nationality, '') AS nationality,
        IFNULL(religion, '') AS religion,
        IFNULL(community, '') AS community,
        IFNULL(cast, '') AS cast,
        IFNULL(bloodgroup, '') AS bloodgroup,
        IFNULL(hseschoolname, '') AS hseschoolname,
        IFNULL(hseboard, '') AS hseboard,
        IFNULL(hsemark, '') AS hsemark,
        IFNULL(passoutyear, '') AS passoutyear,
        IFNULL(cert_10th, '') AS cert_10th,
        IFNULL(cert_12th, '') AS cert_12th,
        IFNULL(aadhar_file, '') AS aadhar_file,
        IFNULL(passport_photo, '') AS passport_photo,
        IFNULL(createdat, '') AS createdat,
        IFNULL(isreaded, 0) AS isreaded
        FROM tbl_applications
        ORDER BY IFNULL(appid,0) DESC";

$results_data = $con->query($sql);
$outp = array();
if ($results_data) {
    while ($row = $results_data->fetch_array(MYSQLI_ASSOC)) {
        $outp[] = $row;
    }
}

echo json_encode($outp);
$con->close();
?>
