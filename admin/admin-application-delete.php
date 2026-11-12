<?php
include_once("adminsession.php");
include_once("db_connection.php");
error_reporting(0);
$status = array('status' => 'success');

if (isset($_GET["delid"])) {
    $raw_ids = explode(",", $_GET["delid"]);
    $clean_ids = array();
    foreach ($raw_ids as $val) {
        $int_val = intval(trim($val));
        if ($int_val > 0) {
            $clean_ids[] = $int_val;
        }
    }

    if (count($clean_ids) > 0) {
        $id_list = implode(",", $clean_ids);

        // Remove associated uploaded files if present
        $res = $con->query("SELECT cert_10th, cert_12th, aadhar_file, passport_photo FROM tbl_applications WHERE appid IN($id_list)");
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                foreach (array('cert_10th', 'cert_12th', 'aadhar_file', 'passport_photo') as $col) {
                    if (!empty($row[$col])) {
                        $filepath = dirname(__DIR__) . "/" . ltrim($row[$col], "/");
                        if (is_file($filepath)) {
                            @unlink($filepath);
                        }
                    }
                }
            }
        }

        $stmt = $con->prepare("DELETE FROM tbl_applications WHERE appid IN($id_list)");
        if ($stmt && $stmt->execute()) {
            $status = ['status' => 'success'];
        } else {
            $status = ['status' => 'fail'];
        }
        if ($stmt) {
            $stmt->close();
        }
    } else {
        $status = ['status' => 'fail'];
    }
}

$con->close();
echo json_encode($status);
?>
