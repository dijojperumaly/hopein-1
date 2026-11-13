<?php
/**
 * admin-popup-delete.php — Deletes a popup record and its image file
 */
include("adminsession.php");
include_once("db_connection.php");
ob_clean();
header('Content-Type: application/json');

$delid = isset($_GET['delid']) ? (int)$_GET['delid'] : 0;
if ($delid <= 0) {
    echo json_encode(array('status' => 'fail', 'msg' => 'Invalid ID'));
    exit;
}

// Get image before deleting
$stmt = $con->prepare("SELECT image FROM tbl_news_popup WHERE popup_id = ?");
$stmt->bind_param("i", $delid);
$stmt->execute();
$res = $stmt->get_result();
if ($row = $res->fetch_assoc()) {
    if (!empty($row['image'])) {
        $imgPath = "../uploads/popup/" . basename($row['image']);
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
    }
}
$stmt->close();

$del = $con->prepare("DELETE FROM tbl_news_popup WHERE popup_id = ?");
$del->bind_param("i", $delid);
if ($del->execute()) {
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'fail', 'msg' => 'Delete failed'));
}
$del->close();
$con->close();
