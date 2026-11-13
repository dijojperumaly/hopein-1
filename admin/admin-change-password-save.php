<?php
ob_start();
include("adminsession.php");
include_once("db_connection.php");
ob_clean();

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'msg' => 'Invalid request method.']);
    exit;
}

if (empty($user_id)) {
    echo json_encode(['status' => 'error', 'msg' => 'Unauthorized session. Please login again.']);
    exit;
}

$current_password = $_POST['current_password'] ?? '';
$new_password     = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if ($current_password === '' || $new_password === '' || $confirm_password === '') {
    echo json_encode(['status' => 'error', 'msg' => 'All password fields are required.']);
    exit;
}

if (strlen($new_password) < 6) {
    echo json_encode(['status' => 'error', 'msg' => 'New password must be at least 6 characters long.']);
    exit;
}

if ($new_password !== $confirm_password) {
    echo json_encode(['status' => 'error', 'msg' => 'New password and confirm password do not match.']);
    exit;
}

if ($current_password === $new_password) {
    echo json_encode(['status' => 'error', 'msg' => 'New password must be different from your current password.']);
    exit;
}

$stmt = $con->prepare("SELECT password FROM tbl_admin WHERE id = ? LIMIT 1");
if (!$stmt) {
    echo json_encode(['status' => 'error', 'msg' => 'Database error. Please try again.']);
    exit;
}

$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($db_password);

if (!$stmt->fetch()) {
    $stmt->close();
    echo json_encode(['status' => 'error', 'msg' => 'Admin account not found.']);
    exit;
}
$stmt->close();

$is_valid_current = password_verify($current_password, $db_password) || hash_equals((string)$db_password, (string)$current_password);
if (!$is_valid_current) {
    echo json_encode(['status' => 'error', 'msg' => 'Current password is incorrect.']);
    exit;
}

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
$upd = $con->prepare("UPDATE tbl_admin SET password = ? WHERE id = ?");
if (!$upd) {
    echo json_encode(['status' => 'error', 'msg' => 'Failed to prepare update statement.']);
    exit;
}

$upd->bind_param('si', $hashed_password, $user_id);
if ($upd->execute()) {
    echo json_encode(['status' => 'success', 'msg' => 'Your password has been updated successfully!']);
} else {
    echo json_encode(['status' => 'error', 'msg' => 'Could not update password. Please try again.']);
}
$upd->close();
?>

