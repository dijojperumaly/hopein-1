<?php
/**
 * admin-popup-all.php — Returns all popup records as JSON for DataTables
 */
include("adminsession.php");
include_once("db_connection.php");
ob_clean(); // discard any stray output from includes
header('Content-Type: application/json');

$sql = "SELECT popup_id, title, is_active, 
        IFNULL(image,'') AS image,
        IFNULL(display_pages, 'home') AS display_pages,
        IFNULL(display_frequency, 'always') AS display_frequency,
        IFNULL(start_date,'') AS start_date, 
        IFNULL(end_date,'') AS end_date, 
        sort_order, 
        IFNULL(createdat,'') AS createdat
        FROM tbl_news_popup
        ORDER BY sort_order DESC, popup_id DESC";

$result = $con->query($sql);
$rows = array();
if ($result) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $rows[] = $row;
    }
}
echo json_encode($rows);
$con->close();
