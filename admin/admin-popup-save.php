<?php
/**
 * admin-popup-save.php — INSERT or UPDATE a popup record
 */
include("adminsession.php");
include_once("db_connection.php");
ob_clean();
header('Content-Type: application/json');

$hdid              = isset($_POST['hdid'])              ? (int)$_POST['hdid']                     : 0;
$title             = isset($_POST['title'])             ? trim($_POST['title'])                    : '';
$content           = isset($_POST['content'])           ? trim($_POST['content'])                  : '';
$link_url          = isset($_POST['link_url'])          ? trim($_POST['link_url'])                 : '';
$link_text         = isset($_POST['link_text'])         ? trim($_POST['link_text'])                : '';
$display_pages     = isset($_POST['display_pages'])     && trim($_POST['display_pages']) !== ''     ? trim($_POST['display_pages'])     : 'home';
$display_frequency = isset($_POST['display_frequency']) && trim($_POST['display_frequency']) !== '' ? trim($_POST['display_frequency']) : 'always';
$start_date        = (isset($_POST['start_date']) && $_POST['start_date'] !== '')                 ? $_POST['start_date']             : null;
$end_date          = (isset($_POST['end_date'])   && $_POST['end_date']   !== '')                 ? $_POST['end_date']               : null;
$is_active         = isset($_POST['is_active'])         ? (int)$_POST['is_active']                : 1;
$sort_order        = isset($_POST['sort_order'])        ? (int)$_POST['sort_order']                : 0;
$keep_image        = isset($_POST['keep_image'])        ? (int)$_POST['keep_image']                : 1;

// Upload directory
$uploadDir = "../uploads/popup/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$imageName = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowedExt = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt)) {
        echo json_encode(array('status' => 'fail', 'msg' => 'Invalid image type. Use jpg, png, gif or webp.'));
        exit;
    }
    if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
        echo json_encode(array('status' => 'fail', 'msg' => 'Image exceeds 5 MB limit'));
        exit;
    }
    $imageName = 'popup_' . time() . '_' . uniqid() . '.' . $ext;
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName)) {
        echo json_encode(array('status' => 'fail', 'msg' => 'Image upload failed'));
        exit;
    }
}

// Optional validation: ensure popup isn't completely empty
$hasExistingImage = false;
if ($hdid > 0 && $keep_image === 1) {
    $chk = $con->prepare("SELECT image FROM tbl_news_popup WHERE popup_id = ?");
    $chk->bind_param("i", $hdid);
    $chk->execute();
    $chkRes = $chk->get_result()->fetch_assoc();
    $chk->close();
    if (!empty($chkRes['image'])) {
        $hasExistingImage = true;
    }
}

if ($title === '' && $content === '' && $imageName === '' && !$hasExistingImage) {
    echo json_encode(array('status' => 'fail', 'msg' => 'Please provide at least a title, message content, or an image.'));
    exit;
}

if ($hdid > 0) {
    // UPDATE
    if ($imageName !== '') {
        // Remove old image first
        $sel = $con->prepare("SELECT image FROM tbl_news_popup WHERE popup_id = ?");
        $sel->bind_param("i", $hdid);
        $sel->execute();
        $r = $sel->get_result()->fetch_assoc();
        $sel->close();
        if (!empty($r['image'])) {
            $old = $uploadDir . basename($r['image']);
            if (file_exists($old)) unlink($old);
        }
        $stmt = $con->prepare("UPDATE tbl_news_popup SET title=?, content=?, image=?, link_url=?, link_text=?, display_pages=?, display_frequency=?, start_date=?, end_date=?, is_active=?, sort_order=?, updatedat=?, updatedby=? WHERE popup_id=?");
        $stmt->bind_param("sssssssssiisii", $title, $content, $imageName, $link_url, $link_text, $display_pages, $display_frequency, $start_date, $end_date, $is_active, $sort_order, $present, $user_id, $hdid);
    } elseif ($keep_image === 0) {
        // User explicitly removed the image
        $sel = $con->prepare("SELECT image FROM tbl_news_popup WHERE popup_id = ?");
        $sel->bind_param("i", $hdid);
        $sel->execute();
        $r = $sel->get_result()->fetch_assoc();
        $sel->close();
        if (!empty($r['image'])) {
            $old = $uploadDir . basename($r['image']);
            if (file_exists($old)) unlink($old);
        }
        $emptyImage = null;
        $stmt = $con->prepare("UPDATE tbl_news_popup SET title=?, content=?, image=?, link_url=?, link_text=?, display_pages=?, display_frequency=?, start_date=?, end_date=?, is_active=?, sort_order=?, updatedat=?, updatedby=? WHERE popup_id=?");
        $stmt->bind_param("sssssssssiisii", $title, $content, $emptyImage, $link_url, $link_text, $display_pages, $display_frequency, $start_date, $end_date, $is_active, $sort_order, $present, $user_id, $hdid);
    } else {
        $stmt = $con->prepare("UPDATE tbl_news_popup SET title=?, content=?, link_url=?, link_text=?, display_pages=?, display_frequency=?, start_date=?, end_date=?, is_active=?, sort_order=?, updatedat=?, updatedby=? WHERE popup_id=?");
        $stmt->bind_param("ssssssssiisii", $title, $content, $link_url, $link_text, $display_pages, $display_frequency, $start_date, $end_date, $is_active, $sort_order, $present, $user_id, $hdid);
    }
} else {
    // INSERT
    $stmt = $con->prepare("INSERT INTO tbl_news_popup (title, content, image, link_url, link_text, display_pages, display_frequency, start_date, end_date, is_active, sort_order, createdat, createdby) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssiisi", $title, $content, $imageName, $link_url, $link_text, $display_pages, $display_frequency, $start_date, $end_date, $is_active, $sort_order, $present, $user_id);
}

if (!$stmt) {
    echo json_encode(array('status' => 'fail', 'msg' => 'Prepare failed: ' . $con->error));
    exit;
}

if ($stmt->execute()) {
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'fail', 'msg' => $stmt->error));
}
$stmt->close();
$con->close();
