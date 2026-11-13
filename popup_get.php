<?php
/**
 * popup_get.php — Public endpoint: returns the latest active popup for the requested page as JSON
 */
header('Content-Type: application/json');
include_once("admin/db_connection.php");
ob_clean();

function normalize_page_slug($page) {
    $p = strtolower(trim((string)$page));
    $p = basename(parse_url($p, PHP_URL_PATH) ?: $p);
    $p = preg_replace('/\.php$/i', '', $p);
    if ($p === '' || $p === '/' || $p === 'index' || $p === 'home') {
        return 'home';
    }
    return $p;
}

$today = date('Y-m-d');

// Determine requested page slug (works with or without .php extension)
$rawPage = isset($_GET['page']) ? trim($_GET['page']) : 'index.php';
$currentSlug = normalize_page_slug($rawPage);

$sql = "SELECT popup_id, title, content, image, link_url, link_text, 
               IFNULL(display_pages, 'home') AS display_pages,
               IFNULL(display_frequency, 'always') AS display_frequency
        FROM tbl_news_popup
        WHERE is_active = 1
          AND (start_date IS NULL OR start_date <= ?)
          AND (end_date IS NULL OR end_date >= ?)
        ORDER BY sort_order DESC, popup_id DESC";

$stmt = $con->prepare($sql);
if (!$stmt) {
    echo json_encode(array('status' => 'fail', 'msg' => 'DB error'));
    exit;
}
$stmt->bind_param("ss", $today, $today);
$stmt->execute();
$result = $stmt->get_result();

$matchedRow = null;
while ($row = $result->fetch_assoc()) {
    $pagesConfig = strtolower(trim($row['display_pages']));

    // 1. All pages option
    if ($pagesConfig === 'all' || $pagesConfig === '*') {
        $matchedRow = $row;
        break;
    }

    // 2. Comma-separated or specific page option (normalized with/without .php)
    $allowedPages = array_map('normalize_page_slug', explode(',', $pagesConfig));
    if (in_array($currentSlug, $allowedPages, true)) {
        $matchedRow = $row;
        break;
    }
}

$stmt->close();
$con->close();

if ($matchedRow !== null) {
    echo json_encode(array('status' => 'success', 'data' => $matchedRow));
} else {
    echo json_encode(array('status' => 'empty'));
}
