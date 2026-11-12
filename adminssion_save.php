<?php
//error_reporting(0);
include_once(__DIR__ . "/admin/db_connection.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user_id = isset($_SESSION['admin_user_id']) ? intval($_SESSION['admin_user_id']) : null;

$appno = "";
$status = ["status" => "success", "appno" => $appno, "name" => ""];

$allowed_cert_ext = array('pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx', 'gif', 'webp');
$allowed_photo_ext = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf');
$max_file_size = 5 * 1024 * 1024; // 5 MB

$upload_dir = __DIR__ . "/uploads/certificates/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

function validateAndUploadFile($field_name, $prefix, $allowed_ext, $max_size, $upload_dir, &$error_status) {
    if (!isset($_FILES[$field_name]) || $_FILES[$field_name]['error'] === UPLOAD_ERR_NO_FILE || empty($_FILES[$field_name]['name'])) {
        return null;
    }
    if ($_FILES[$field_name]['error'] !== UPLOAD_ERR_OK) {
        $error_status = "upload_error";
        return false;
    }
    if ($_FILES[$field_name]['size'] > $max_size) {
        $error_status = "filesize_error";
        return false;
    }
    $orig_name = $_FILES[$field_name]['name'];
    $ext = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed_ext)) {
        $error_status = "filetype_error";
        return false;
    }
    $new_filename = $prefix . "_" . $field_name . "_" . uniqid() . "." . $ext;
    $target_path = $upload_dir . $new_filename;
    if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $target_path)) {
        return "uploads/certificates/" . $new_filename;
    } else {
        $error_status = "upload_error";
        return false;
    }
}

$con->begin_transaction();

$name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
$contact = isset($_POST["contact"]) ? trim($_POST["contact"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$course = isset($_POST["course"]) ? trim($_POST["course"]) : "";
$college = isset($_POST["college"]) ? trim($_POST["college"]) : "";
$parentname = isset($_POST["parentname"]) ? trim($_POST["parentname"]) : "";
$parentoccupation = isset($_POST["parentoccupation"]) ? trim($_POST["parentoccupation"]) : "";
$parentcontact = isset($_POST["parentcontact"]) ? trim($_POST["parentcontact"]) : "";
$address = isset($_POST["address"]) ? trim($_POST["address"]) : "";
$dateofbirth = isset($_POST["dateofbirth"]) ? trim($_POST["dateofbirth"]) : "";
$aadhar = isset($_POST["aadhar"]) ? trim($_POST["aadhar"]) : "";
$nationality = isset($_POST["nationality"]) ? trim($_POST["nationality"]) : "";
$religion = isset($_POST["religion"]) ? trim($_POST["religion"]) : "";
$community = isset($_POST["community"]) ? trim($_POST["community"]) : "";
$cast = isset($_POST["cast"]) ? trim($_POST["cast"]) : "";
$bloodgroup = isset($_POST["bloodgroup"]) ? trim($_POST["bloodgroup"]) : "";
$hseschoolname = isset($_POST["hseschoolname"]) ? trim($_POST["hseschoolname"]) : "";
$hseboard = isset($_POST["hseboard"]) ? trim($_POST["hseboard"]) : "";
$hsemark = isset($_POST["hsemark"]) ? trim($_POST["hsemark"]) : "";
$passoutyear = isset($_POST["passoutyear"]) ? trim($_POST["passoutyear"]) : "";
$admissionyear = (isset($_POST["admissionyear"]) && $_POST["admissionyear"] !== "") ? intval($_POST["admissionyear"]) : intval(date("Y"));

$regno = date("y") . date("m") . date("d") . floor(((double) microtime() * 100000000));
$file_prefix = (!empty($_POST["hdid"])) ? "app_" . intval($_POST["hdid"]) : $regno;

$error_status = "";
$cert_10th_path = validateAndUploadFile("cert_10th", $file_prefix, $allowed_cert_ext, $max_file_size, $upload_dir, $error_status);
if ($error_status === "") {
    $cert_12th_path = validateAndUploadFile("cert_12th", $file_prefix, $allowed_cert_ext, $max_file_size, $upload_dir, $error_status);
}
if ($error_status === "") {
    $aadhar_file_path = validateAndUploadFile("aadhar_file", $file_prefix, $allowed_cert_ext, $max_file_size, $upload_dir, $error_status);
}
if ($error_status === "") {
    $passport_photo_path = validateAndUploadFile("passport_photo", $file_prefix, $allowed_photo_ext, $max_file_size, $upload_dir, $error_status);
}

if ($error_status !== "") {
    $status = ["status" => $error_status, "appno" => $appno, "name" => $name];
}

if ($status['status'] == "success") {
    if (!isset($_POST["hdid"]) || trim($_POST["hdid"]) === "") {
        $stmt = $con->prepare("INSERT INTO tbl_applications(
            admissionyear,
            regno,
            name,
            contact,
            email,
            course,
            college,
            parentname,
            parentoccupation,
            parentcontact,
            address,
            dateofbirth,
            aadhar,
            nationality,
            religion,
            community,
            cast,
            bloodgroup,
            hseschoolname,
            hseboard,
            hsemark,
            passoutyear,
            cert_10th,
            cert_12th,
            aadhar_file,
            passport_photo,
            createdat)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("issssssssssssssssssssssssss",
            $admissionyear,
            $regno,
            $name,
            $contact,
            $email,
            $course,
            $college,
            $parentname,
            $parentoccupation,
            $parentcontact,
            $address,
            $dateofbirth,
            $aadhar,
            $nationality,
            $religion,
            $community,
            $cast,
            $bloodgroup,
            $hseschoolname,
            $hseboard,
            $hsemark,
            $passoutyear,
            $cert_10th_path,
            $cert_12th_path,
            $aadhar_file_path,
            $passport_photo_path,
            $present);

        if ($stmt->execute()) {
            $status = ['status' => 'success', 'appno' => $regno, 'regno' => $regno, "name" => $name];
            $con->commit();
        } else {
            $status = ['status' => 'fail', 'message' => $stmt->error, 'appno' => $appno, "name" => $name];
            $con->rollback();
        }
        $stmt->close();
    } else {
        $id = intval($_POST["hdid"]);

        // Fetch existing certificate paths so we retain them if no new file is uploaded
        $existing_cert_10th = null;
        $existing_cert_12th = null;
        $existing_aadhar_file = null;
        $existing_passport_photo = null;
        $existing_regno = "";

        $stmt_old = $con->prepare("SELECT regno, cert_10th, cert_12th, aadhar_file, passport_photo FROM tbl_applications WHERE appid = ?");
        $stmt_old->bind_param("i", $id);
        $stmt_old->execute();
        $stmt_old->bind_result($existing_regno, $existing_cert_10th, $existing_cert_12th, $existing_aadhar_file, $existing_passport_photo);
        $stmt_old->fetch();
        $stmt_old->close();

        $final_cert_10th = ($cert_10th_path !== null) ? $cert_10th_path : $existing_cert_10th;
        $final_cert_12th = ($cert_12th_path !== null) ? $cert_12th_path : $existing_cert_12th;
        $final_aadhar_file = ($aadhar_file_path !== null) ? $aadhar_file_path : $existing_aadhar_file;
        $final_passport_photo = ($passport_photo_path !== null) ? $passport_photo_path : $existing_passport_photo;

        $stmt = $con->prepare("UPDATE tbl_applications SET
            admissionyear=?,
            name=?,
            contact=?,
            email=?,
            course=?,
            college=?,
            parentname=?,
            parentoccupation=?,
            parentcontact=?,
            address=?,
            dateofbirth=?,
            aadhar=?,
            nationality=?,
            religion=?,
            community=?,
            cast=?,
            bloodgroup=?,
            hseschoolname=?,
            hseboard=?,
            hsemark=?,
            passoutyear=?,
            cert_10th=?,
            cert_12th=?,
            aadhar_file=?,
            passport_photo=?,
            updatedat=?,
            updatedby=?
        WHERE appid=?");

        $stmt->bind_param("isssssssssssssssssssssssssii",
            $admissionyear,
            $name,
            $contact,
            $email,
            $course,
            $college,
            $parentname,
            $parentoccupation,
            $parentcontact,
            $address,
            $dateofbirth,
            $aadhar,
            $nationality,
            $religion,
            $community,
            $cast,
            $bloodgroup,
            $hseschoolname,
            $hseboard,
            $hsemark,
            $passoutyear,
            $final_cert_10th,
            $final_cert_12th,
            $final_aadhar_file,
            $final_passport_photo,
            $present,
            $user_id,
            $id);

        if ($stmt->execute()) {
            $status = ['status' => 'success', 'appno' => $existing_regno, 'regno' => $existing_regno, "name" => $name];
            $con->commit();
        } else {
            $status = ['status' => 'fail', 'message' => $stmt->error, 'appno' => $existing_regno, "name" => $name];
            $con->rollback();
        }
        $stmt->close();
    }
} else {
    $con->rollback();
}

$con->close();
echo json_encode($status);
?>
