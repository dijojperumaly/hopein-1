<?php
//include_once("adminsession.php");
include_once("db_connection.php");

// Set the INSERT SQL data
$sql = "SELECT  appid, 
        admissionyear,
        appno,
        name,
        regionallanguage, 
        sex,
        aadharno,
        bloodgroup,
        admissionstandard,	
        contact,
        alternatecontact,
        email,
        fathername,
        fatheroccupation,
        address,
        mothername,
        motheroccupation,
        guardianname,
        guardianrelation,
        guardianoccupation,
        guardianaddress,
        previousschool,
        yearstuded,
        standaredstuded,
        dateadmission,
        dateleaving,
        remarks,
        dateofbirth,
        age,
        religion,
        caste,
        placebirth,
        nationality,
        state,
        community,
        mothertongue,
        tcno,
        vaccinationdate,
        bodymark1,
        bodymark2,
        isreaded
        FROM tbl_applications
        ORDER BY IFNULL(appid,0) DESC";

// Process the query so that we will save the date of birth
$results_data = $con->query($sql);
$outp = array();    
while ($row = $results_data->fetch_array(MYSQLI_ASSOC)) {
    $outp[] = $row;
}

//$results_data = $stmt->get_result();
//$row_application = $results_data->fetch_all(MYSQLI_ASSOC);
//$row_application=$results_data -> fetch_assoc();

// Free result set
//$results_data->free_result();

// Close the connection after using it

echo json_encode($outp);
$con->close();


?>