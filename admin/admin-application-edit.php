<?php 
include_once("db_connection.php");
include("adminsession.php");
$prv = 0;

if (isset($_REQUEST["prv"])) {
    $prv = intval($_REQUEST["prv"]);
}

$appid = 0;
$admissionyear = date("Y");
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
        passport_photo
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
        $passport_photo
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("admin-header-links.php"); ?>
    <title>GracePath - Edit Application</title>
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
                        <li>
                            <a href="admin-application-list.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <?php if ($prv != 0) { ?>
                            <li class="active-bre">
                                <a href="admin-application-details.php?id=<?php echo $appid; ?>">Application Details</a>
                            </li>
                        <?php } ?>
                        <li class="active-bre">
                            <a href="#"> Application Edit</a>
                        </li>
                        <li class="page-back">
                            <a href="admin-application-list.php"><i class="fa fa-backward" aria-hidden="true"></i> Back to List</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Edit Application - <?php echo htmlspecialchars($regno); ?></h4>
                                </div>
                                <div class="tab-inn">
                                    <div class="alert alert-dismissible" role="alert" style="display:none;">
                                        <strong></strong>
                                        <p></p>
                                    </div>
                                    <form name="form_save" id="form_save" method="post" action="../adminssion_save.php" enctype="multipart/form-data">
                                        <input type="hidden" name="hdid" id="hdid" value="<?php echo $appid; ?>">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Academic Year:</b>
                                                <input type="number" id="admissionyear" name="admissionyear" value="<?php echo htmlspecialchars($admissionyear ? $admissionyear : date('Y')); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Registration No:</b>
                                                <input type="text" value="<?php echo htmlspecialchars($regno); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Applicant Name *:</b>
                                                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" class="validate" required>
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Contact Number *:</b>
                                                <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($contact); ?>" class="validate" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Applicant Email:</b>
                                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Course *:</b>
                                                <input type="text" id="course" name="course" value="<?php echo htmlspecialchars($course); ?>" class="validate" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>College:</b>
                                                <input type="text" id="college" name="college" value="<?php echo htmlspecialchars($college); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Date of Birth *:</b>
                                                <input type="date" id="dateofbirth" name="dateofbirth" value="<?php echo htmlspecialchars($dateofbirth); ?>" class="validate" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Parent Name *:</b>
                                                <input type="text" id="parentname" name="parentname" value="<?php echo htmlspecialchars($parentname); ?>" class="validate" required>
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Parent Occupation:</b>
                                                <input type="text" id="parentoccupation" name="parentoccupation" value="<?php echo htmlspecialchars($parentoccupation); ?>" class="validate">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Parent Contact Number:</b>
                                                <input type="text" id="parentcontact" name="parentcontact" value="<?php echo htmlspecialchars($parentcontact); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Address:</b>
                                                <textarea rows="3" id="address" name="address"><?php echo htmlspecialchars($address); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Aadhar Number:</b>
                                                <input type="text" id="aadhar" name="aadhar" value="<?php echo htmlspecialchars($aadhar); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Blood Group:</b>
                                                <input type="text" id="bloodgroup" name="bloodgroup" value="<?php echo htmlspecialchars($bloodgroup); ?>" class="validate">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Nationality:</b>
                                                <input type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($nationality); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Religion:</b>
                                                <input type="text" id="religion" name="religion" value="<?php echo htmlspecialchars($religion); ?>" class="validate">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>Community:</b>
                                                <input type="text" id="community" name="community" value="<?php echo htmlspecialchars($community); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Caste:</b>
                                                <input type="text" id="cast" name="cast" value="<?php echo htmlspecialchars($cast); ?>" class="validate">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>HSE School Name:</b>
                                                <input type="text" id="hseschoolname" name="hseschoolname" value="<?php echo htmlspecialchars($hseschoolname); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>HSE Board:</b>
                                                <input type="text" id="hseboard" name="hseboard" value="<?php echo htmlspecialchars($hseboard); ?>" class="validate">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <b>HSE Mark:</b>
                                                <input type="text" id="hsemark" name="hsemark" value="<?php echo htmlspecialchars($hsemark); ?>" class="validate">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Passout Year:</b>
                                                <input type="text" id="passoutyear" name="passoutyear" value="<?php echo htmlspecialchars($passoutyear); ?>" class="validate">
                                            </div>
                                        </div>

                                        <hr style="margin: 25px 0;" />
                                        <h4>Certificates &amp; Documents (Upload to replace existing)</h4>
                                        <div class="row" style="margin-top: 15px;">
                                            <div class="input-field col s6">
                                                <b>10th Certificate:</b>
                                                <?php if (!empty($cert_10th)) { ?>
                                                    <a href="../<?php echo htmlspecialchars($cert_10th); ?>" target="_blank" class="label label-info" style="margin-left:10px;">View Current</a>
                                                <?php } ?>
                                                <input type="file" name="cert_10th" id="cert_10th" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" style="margin-top:8px;">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>12th Certificate:</b>
                                                <?php if (!empty($cert_12th)) { ?>
                                                    <a href="../<?php echo htmlspecialchars($cert_12th); ?>" target="_blank" class="label label-info" style="margin-left:10px;">View Current</a>
                                                <?php } ?>
                                                <input type="file" name="cert_12th" id="cert_12th" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" style="margin-top:8px;">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 15px;">
                                            <div class="input-field col s6">
                                                <b>Aadhar Card:</b>
                                                <?php if (!empty($aadhar_file)) { ?>
                                                    <a href="../<?php echo htmlspecialchars($aadhar_file); ?>" target="_blank" class="label label-primary" style="margin-left:10px;">View Current</a>
                                                <?php } ?>
                                                <input type="file" name="aadhar_file" id="aadhar_file" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" style="margin-top:8px;">
                                            </div>
                                            <div class="input-field col s6">
                                                <b>Passport Size Photo:</b>
                                                <?php if (!empty($passport_photo)) { ?>
                                                    <a href="../<?php echo htmlspecialchars($passport_photo); ?>" target="_blank" class="label label-success" style="margin-left:10px;">View Current</a>
                                                <?php } ?>
                                                <input type="file" name="passport_photo" id="passport_photo" class="form-control" accept=".jpg,.jpeg,.png,.gif,.webp" style="margin-top:8px;">
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top: 25px;">
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper">
                                                    <input type="button" id="btnapplynow" name="btnapplynow" class="waves-button-input" style="font-size: medium;" value="Update Now">
                                                </i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php include("admin-fooder.php"); ?>

    <script>
    $(document).ready(function() {
        $("#form_save").validate({
            rules: {
                name: {
                    required: true
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 12
                },
                email: {
                    email: true
                },
                course: {
                    required: true
                },
                parentname: {
                    required: true
                },
                parentcontact: {
                    number: true,
                    minlength: 10,
                    maxlength: 12
                },
                dateofbirth: {
                    required: true
                },
                aadhar: {
                    number: true,
                    minlength: 12,
                    maxlength: 12
                }
            },
            messages: {
                name: {
                    required: "Enter applicant full name"
                },
                contact: {
                    required: "Enter contact mobile number",
                    number: "Numbers only",
                    minlength: "Phone number must be at least 10 digits",
                    maxlength: "Phone number maximum 12 digits"
                },
                email: {
                    email: "Please enter a valid email address"
                },
                course: {
                    required: "Enter course"
                },
                parentname: {
                    required: "Enter parent name"
                },
                aadhar: {
                    number: "Numbers only",
                    minlength: "Aadhar number must be 12 digits",
                    maxlength: "Aadhar number must be 12 digits"
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });

        $('#btnapplynow').click(function() {
            if ($("#form_save").valid()) {
                var $this = $("#btnapplynow");
                var $caption = $this.val();
                var form = $("#form_save")[0];
                var route = $("#form_save").attr('action');
                var formData = new FormData(form);

                $this.prop('disabled', true).val("Processing...");

                $.ajax({
                    type: "POST",
                    url: route,
                    data: formData,
                    timeout: 60000,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $this.prop('disabled', true).val("Processing...");
                        $(".se-pre-con").fadeIn("slow");
                    },
                    success: function(response) {
                        $this.prop('disabled', false).val($caption);
                        try {
                            var json = JSON.parse(response);
                            if (json["status"] == "success") {
                                ShowAlert("", "Application successfully updated!", "success");
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1200);
                            } else if (json["status"] == "filetype_error") {
                                ShowAlert("", "Not saved! Invalid file type.", "danger");
                            } else if (json["status"] == "filesize_error") {
                                ShowAlert("", "Not saved! File size exceeds 5MB limit.", "danger");
                            } else {
                                ShowAlert("", "Not saved! Please enter correct data.", "danger");
                            }
                        } catch (e) {
                            ShowAlert("", "Not saved! Please enter correct data.", "danger");
                        }
                    },
                    complete: function(data) {
                        $this.prop('disabled', false).val($caption);
                        $(".se-pre-con").fadeOut("slow");
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $this.prop('disabled', false).val($caption);
                        ShowAlert(textStatus, errorThrown, "danger");
                        $(".se-pre-con").fadeOut("slow");
                    }
                });
            } else {
                ShowAlert("", "Please enter valid data for all required fields.", "danger");
            }
        });
    });
    </script>

</body>
</html>
