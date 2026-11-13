<?php
/**
 * admin-popup-get.php — Returns a single popup record by ID for edit form
 */
include("adminsession.php");
include_once("db_connection.php");
ob_clean();
header('Content-Type: application/json');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    echo json_encode(array('status' => 'fail', 'msg' => 'Invalid ID'));
    exit;
}

$stmt = $con->prepare("SELECT * FROM tbl_news_popup WHERE popup_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    echo json_encode(array('status' => 'success', 'data' => $row));
} else {
    echo json_encode(array('status' => 'fail', 'msg' => 'Not found'));
}
$stmt->close();
$con->close();
