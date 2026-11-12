<?php 
include_once("db_connection.php");
include("adminsession.php");

$appid = 0;
$admissionyear = "";
$regno = "";
$name = "";
$contact = "";
$email = "";
$course = "";
$college = "";
$parentname = "";
$parentoccupation = "";
$parentcontact = "";
$address = "";
$dateofbirth = "";
$aadhar = "";
$nationality = "";
$religion = "";
$community = "";
$cast = "";
$bloodgroup = "";
$hseschoolname = "";
$hseboard = "";
$hsemark = "";
$passoutyear = "";
$cert_10th = "";
$cert_12th = "";
$aadhar_file = "";
$passport_photo = "";
$createdat = "";

if (isset($_REQUEST["id"])) {
    $id = intval($_REQUEST["id"]);
    $sql = "SELECT
        appid,
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
        createdat
        FROM tbl_applications
        WHERE appid=?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result(
        $appid,
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
        $cert_10th,
        $cert_12th,
        $aadhar_file,
        $passport_photo,
        $createdat
    );
    $stmt->store_result();
    if ($stmt->num_rows == 1) {
        if ($stmt->fetch()) {
            $stmt_read = $con->prepare("UPDATE tbl_applications SET isreaded=1 WHERE appid=?");
            $stmt_read->bind_param("i", $id);
            $stmt_read->execute();
            $stmt_read->close();
        }
    }
    $stmt->close();
}

function renderCertBadge($filepath, $label) {
    if (!empty($filepath)) {
        $url = "../" . ltrim($filepath, "/");
        $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        $is_img = in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'webp'));
        $html = "<a href='" . htmlspecialchars($url) . "' target='_blank' class='btn btn-sm btn-info' style='margin-right:8px; color:#fff;'><i class='fa fa-eye'></i> View " . htmlspecialchars($label) . "</a>";
        $html .= "<a href='" . htmlspecialchars($url) . "' download class='btn btn-sm btn-success' style='color:#fff;'><i class='fa fa-download'></i> Download</a>";
        if ($is_img) {
            $html .= "<div style='margin-top:8px;'><a href='" . htmlspecialchars($url) . "' target='_blank'><img src='" . htmlspecialchars($url) . "' alt='" . htmlspecialchars($label) . "' style='max-height:100px; border:1px solid #ddd; padding:3px; border-radius:4px; background:#fff;'/></a></div>";
        }
        return $html;
    }
    return "<span class='text-muted'>Not Uploaded</span>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("admin-header-links.php"); ?>
    <title>GracePath - Application Details</title>
</head>

<body>
    <?php include("admin-header-topmenu.php"); ?>
    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <?php include("admin-header-sidemenu.php"); ?>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="admin-application-list.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Application Details</a>
                        </li>
                        <li class="page-back"><a href="admin-application-list.php"><i class="fa fa-backward" aria-hidden="true"></i> Back to List</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="row">
                    <div class="input-field col s12">
                        <input type="button" id="btnprinttop" name="btnprinttop" class="btn-primary" value="Print">
                    </div>
                </div>
                <div class="sb2-2-3">
                    <div class="row" id="print">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title" style="overflow:hidden;">
                                    <img src="../img/logo.png" style="float:left; max-width:75px;" />
                                    <h3 style="text-align:center;color:white;margin:5px 0;">GracePath Education<br><small style="color:#e0e0e0;font-size:15px;">Ponkunnam, Kottayam, Kerala | +91 8086859526</small></h3>
                                </div>
                                <div class="tab-inn">
                                    <div class="row" style="margin-bottom:20px; align-items:center;">
                                        <div class="col s8">
                                            <h4>Registration Information - <?php echo htmlspecialchars($regno); ?></h4>
                                            <?php if (!empty($createdat)) { ?>
                                                <p class="text-muted">Submitted on: <?php echo htmlspecialchars($createdat); ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="col s4" style="text-align:right;">
                                            <?php if (!empty($passport_photo)) { ?>
                                                <img src="../<?php echo htmlspecialchars($passport_photo); ?>" alt="Applicant Photo" style="max-height:120px; max-width:120px; border:2px solid #ccc; border-radius:6px; padding:3px;" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Registration No</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($regno); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Academic Year</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($admissionyear); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Applicant Name</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($name); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Contact Number</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($contact); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Email</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($email); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Course</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($course); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">College</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($college); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Date of Birth</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($dateofbirth); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Parent Name</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($parentname); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Parent Occupation</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($parentoccupation); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Parent Contact</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($parentcontact); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Address</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo nl2br(htmlspecialchars($address)); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Aadhar Number</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($aadhar); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Blood Group</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($bloodgroup); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Nationality</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($nationality); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Religion</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($religion); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Community</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($community); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Caste</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($cast); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">HSE School Name</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($hseschoolname); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">HSE Board</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($hseboard); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">HSE Mark</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($hsemark); ?>
                                            </div>
                                            <div class="input-field col s6">
                                                <b style="display: inline-block; width: 40%;">Passout Year</b>
                                                <span style="display: inline-block; width: 10%;">:</span>
                                                <?php echo htmlspecialchars($passoutyear); ?>
                                            </div>
                                        </div>

                                        <hr style="margin: 25px 0;" />
                                        <h4 style="margin-bottom: 15px;">Uploaded Certificates &amp; Documents</h4>
                                        <div class="row">
                                            <div class="input-field col s6" style="margin-bottom: 15px;">
                                                <b style="display: inline-block; width: 40%; vertical-align: top;">10th Certificate</b>
                                                <span style="display: inline-block; width: 5%; vertical-align: top;">:</span>
                                                <div style="display: inline-block; width: 50%;">
                                                    <?php echo renderCertBadge($cert_10th, "10th Certificate"); ?>
                                                </div>
                                            </div>
                                            <div class="input-field col s6" style="margin-bottom: 15px;">
                                                <b style="display: inline-block; width: 40%; vertical-align: top;">12th Certificate</b>
                                                <span style="display: inline-block; width: 5%; vertical-align: top;">:</span>
                                                <div style="display: inline-block; width: 50%;">
                                                    <?php echo renderCertBadge($cert_12th, "12th Certificate"); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6" style="margin-bottom: 15px;">
                                                <b style="display: inline-block; width: 40%; vertical-align: top;">Aadhar Card</b>
                                                <span style="display: inline-block; width: 5%; vertical-align: top;">:</span>
                                                <div style="display: inline-block; width: 50%;">
                                                    <?php echo renderCertBadge($aadhar_file, "Aadhar Card"); ?>
                                                </div>
                                            </div>
                                            <div class="input-field col s6" style="margin-bottom: 15px;">
                                                <b style="display: inline-block; width: 40%; vertical-align: top;">Passport Photo</b>
                                                <span style="display: inline-block; width: 5%; vertical-align: top;">:</span>
                                                <div style="display: inline-block; width: 50%;">
                                                    <?php echo renderCertBadge($passport_photo, "Passport Photo"); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top:20px;">
                                            <div class="input-field col s12">
                                                <a href="admin-application-edit.php?id=<?php echo $appid; ?>&prv=1" class='ad-st-edit' style="padding:8px 16px;">Edit Application</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" style="text-align:center;">
                            <i class="waves-effect waves-light btn-large waves-input-wrapper"><input type="button" id="btnprint" name="btnprint" class="waves-button-input" value="Print"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("admin-fooder.php"); ?>

    <script>
        $(document).ready(function() {
            function printDiv() {
                var divToPrint = document.getElementById('print');
                var anotherWindow = window.open('GracePath Education', 'Print-Window');
                anotherWindow.document.open();
                anotherWindow.document.write('<html><style>.function-print{height: 99%;}.function-print body{height: 99%;} input[type="button"], input[type="submit"], input[type="reset"] {display: none;} a.ad-st-edit, a.btn {display: none;} h3{color:black !important;}</style><body onload="window.print()">' + divToPrint.innerHTML + '<br><p style="float:left;">Date:</p><p align="right">Signature of Applicant</p></body></html>');
                anotherWindow.document.close();
                setTimeout(function() {
                    anotherWindow.close();
                }, 10);
            }

            $('#btnprint, #btnprinttop').click(function() {
                printDiv();
            });
        });
    </script>

</body>
</html>
