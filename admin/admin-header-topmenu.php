<?php
include_once("db_connection.php");
$count= "0";
$stmt_read_status = $con->prepare("SELECT count(*) FROM tbl_applications WHERE isreaded=0");
$stmt_read_status->execute();
$stmt_read_status->bind_result($count);
$stmt_read_status->store_result();
if($stmt_read_status->num_rows >= 1)  //To check if the row exists
{
    if($stmt_read_status->fetch()) //fetching the contents of the row
    {            
    }

}
else {
    $count= "0";
}
$stmt_read_status->close();
//$con->close();
?>
<!--== MAIN CONTRAINER ==-->
<div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="#" class="logo"><img src="images/admin_logo.png" alt="" /></a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="admin-application-list.php" title="new applications"><i class="fa fa-commenting-o" aria-hidden="true"></i><span><?php echo $count; ?></span></a>
                    <!--<a class='waves-effect btn-noti' href="" title="course booking messages"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="" title="admission enquiry"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a> -->
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="images/admin.png" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="#" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="admin-logout.php" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>