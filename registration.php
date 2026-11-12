<style>
    #image_captcha {
        margin-top: 0px;
        box-shadow: 2px 2px 6px gray;
        padding: 6px 14px;
        font-weight: 600;
        user-select: none;
        text-decoration: line-through;
        font-style: italic;
        font-size: x-large;
        border: #dc3545 2px solid;
        margin-left: 10px;
        background: #fff;
        letter-spacing: 3px;
    }
    .inline {
        display: inline-block;
    }
    label.error {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 4px;
        display: block;
    }
    .cert-label {
        font-weight: 600;
        color: #091E3E;
        display: flex;
        align-items: center;
    }
</style>
<?php
include("header.php");
?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Registration Form</h1>
                    <a href="index.php" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="registration.php" class="h5 text-white">Registration</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible;animation-delay: 0.1s;animation-name: fadeInUp;background-image: url(img/bb1.jpg);background-size: cover;">
        <div class="container py-5">
            <div id="alert_container" class="mb-4">
                <div class="alert alert-dismissible" role="alert" style="display:none;">
                    <strong></strong>
                    <p class="mb-0"></p>
                </div>
            </div>

            <form name="form_save" id="form_save" method="post" action="adminssion_save.php" enctype="multipart/form-data">
                <div class="row g-5">
                    <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                        <h4 class="mb-3 text-primary">Applicant Details</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="name" id="name" placeholder="Applicant Name *" style="height: 55px;" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="contact" id="contact" placeholder="Contact Number *" style="height: 55px;" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" name="email" id="email" placeholder="Applicant Email" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="course" id="course" placeholder="Course *" style="height: 55px;" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="college" id="college" placeholder="College" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="parentname" id="parentname" placeholder="Parent Name *" style="height: 55px;" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="parentoccupation" id="parentoccupation" placeholder="Parent Occupation" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="parentcontact" id="parentcontact" placeholder="Parent Number" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" name="address" id="address" placeholder="Address"></textarea>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control border-0 bg-light px-4" name="dateofbirth" id="dateofbirth" placeholder="Date of Birth *" title="Date of Birth" style="height: 55px;" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="aadhar" id="aadhar" placeholder="Aadhar Number" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="nationality" id="nationality" placeholder="Nationality" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="religion" id="religion" placeholder="Religion" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="community" id="community" placeholder="Community" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="cast" id="cast" placeholder="Name of Caste" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="bloodgroup" id="bloodgroup" placeholder="Blood Group" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="hseschoolname" id="hseschoolname" placeholder="HSE School Name" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="hseboard" id="hseboard" placeholder="HSE Board" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="hsemark" id="hsemark" placeholder="HSE Mark" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="passoutyear" id="passoutyear" placeholder="Passout Year" style="height: 55px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                        <h4 class="mb-3 text-primary">Upload Certificates &amp; Documents</h4>
                        <p class="text-muted small mb-3">Accepted formats: PDF, JPG, JPEG, PNG, DOC, DOCX (Max size: 5MB each)</p>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-4 cert-label">
                                10th Certificate
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control border-0 bg-light px-4 py-3" name="cert_10th" id="cert_10th" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                            </div>

                            <div class="col-md-4 cert-label">
                                12th Certificate
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control border-0 bg-light px-4 py-3" name="cert_12th" id="cert_12th" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                            </div>

                            <div class="col-md-4 cert-label">
                                Aadhar Card
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control border-0 bg-light px-4 py-3" name="aadhar_file" id="aadhar_file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                            </div>

                            <div class="col-md-4 cert-label">
                                Passport Size Photo
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control border-0 bg-light px-4 py-3" name="passport_photo" id="passport_photo" accept=".jpg,.jpeg,.png,.gif,.webp">
                                <div id="imgholder" class="mt-2" style="display:none;">
                                    <img id="imgPreview" src="" alt="Passport Photo Preview" style="max-height: 120px; border-radius: 6px; border: 1px solid #ccc; padding: 3px; background: #fff;">
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div id="user-input" class="inline me-2">
                                        <input type="text" class="form-control border-0 bg-light px-4" id="txtcaptcha" name="txtcaptcha" placeholder="Enter Captcha Code *" style="height: 50px; width: 220px;" />
                                    </div>
                                    <div id="image_captcha" selectable="False" title="Click to refresh captcha" style="cursor: pointer;"></div>
                                    <button type="button" id="btn_refresh_captcha" class="btn btn-sm btn-outline-secondary ms-2" title="Refresh Captcha"><i class="fa fa-sync-alt"></i></button>
                                </div>
                                <p id="key" class="text-danger fw-bold mt-1 mb-0"></p>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" id="btnapplynow" name="btnapplynow" class="btn btn-primary w-100 py-3">Submit Registration</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact End -->

<?php
include("footer.php");
?>
<script src="admin/js/jquery.validate.min.js"></script>
<script>
    function ShowAlert(msg_title, msg_body, msg_type) {
        var AlertMsg = $('div[role="alert"]');
        $(AlertMsg).find('strong').html(msg_title);
        $(AlertMsg).find('p').html(msg_body);
        $(AlertMsg).removeAttr('class');
        $(AlertMsg).addClass('alert alert-' + msg_type + ' alert-dismissible fade show');
        $(AlertMsg).show();
        $('html, body').animate({
            scrollTop: $("#alert_container").offset().top - 100
        }, 400);
    }

    $(document).ready(function() {
        let captcha;
        function generate() {
            captcha = document.getElementById("image_captcha");
            let uniquechar = "";
            const randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for (let i = 1; i < 5; i++) {
                uniquechar += randomchar.charAt(Math.floor(Math.random() * randomchar.length));
            }
            captcha.innerHTML = uniquechar;
        }
        generate();

        $('#image_captcha, #btn_refresh_captcha').on('click', function() {
            generate();
        });

        function check_captcha() {
            let flag = 0;
            const usr_input = document.getElementById("txtcaptcha").value.trim();
            let captcha = document.getElementById("image_captcha");
            document.getElementById("key").innerHTML = "";

            if (usr_input !== "" && usr_input === captcha.innerHTML) {
                flag = 1;
                generate();
            } else {
                document.getElementById("key").innerHTML = "Captcha not Matched";
                flag = 0;
                generate();
            }
            return flag;
        }

        $('#txtcaptcha').on('blur input', function () {
            document.getElementById("key").innerHTML = "";
        });

        $('#passport_photo').on('change', function() {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgPreview').attr('src', e.target.result);
                    $('#imgholder').show();
                };
                reader.readAsDataURL(file);
            } else {
                $('#imgPreview').attr('src', '');
                $('#imgholder').hide();
            }
        });

        function resetForm() {
            $('#form_save')[0].reset();
            $("#imgPreview").attr("src", "");
            $("#imgholder").css("display", "none");
        }

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
                    required: "Please enter applicant full name"
                },
                contact: {
                    required: "Please enter contact mobile number",
                    number: "Numbers only",
                    minlength: "Phone number must be at least 10 digits",
                    maxlength: "Phone number maximum 12 digits"
                },
                email: {
                    email: "Please enter a valid email address"
                },
                course: {
                    required: "Please enter course"
                },
                parentname: {
                    required: "Please enter parent name"
                },
                parentcontact: {
                    number: "Numbers only",
                    minlength: "Phone number must be at least 10 digits",
                    maxlength: "Phone number maximum 12 digits"
                },
                dateofbirth: {
                    required: "Please select date of birth"
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

        $('#form_save').on('submit', function(e) {
            e.preventDefault();
            if ($("#form_save").valid()) {
                if (check_captcha() == 1) {
                    var $this = $("#btnapplynow");
                    var $caption = $this.html();
                    var route = $("#form_save").attr('action');
                    var formData = new FormData(this);

                    $.ajax({
                        type: "POST",
                        url: route,
                        data: formData,
                        timeout: 60000,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $this.prop('disabled', true).html("Processing...");
                        },
                        success: function(response) {
                            try {
                                var json = JSON.parse(response);
                                if (json["status"] == "success") {
                                    resetForm();
                                    ShowAlert("Success! ", "Your registration has been received! Your Registration No is: <b>" + json["appno"] + "</b>. We will contact you shortly.", "success");
                                } else if (json["status"] == "exists") {
                                    ShowAlert("Notice: ", "Application already exists!", "danger");
                                } else if (json["status"] == "filetype_error") {
                                    ShowAlert("Error: ", "Not saved! Invalid file type uploaded. Allowed: PDF, JPG, PNG, DOC, DOCX.", "danger");
                                } else if (json["status"] == "filesize_error") {
                                    ShowAlert("Error: ", "Not saved! Uploaded file size exceeds 5MB limit.", "danger");
                                } else if (json["status"] == "upload_error") {
                                    ShowAlert("Error: ", "Not saved! Error uploading certificate file.", "danger");
                                } else {
                                    ShowAlert("Error: ", "Not saved! Please enter correct data.", "danger");
                                }
                            } catch (err) {
                                ShowAlert("Error: ", "Not saved! Please enter correct data.", "danger");
                            }
                        },
                        complete: function() {
                            $this.prop('disabled', false).html($caption);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $this.prop('disabled', false).html($caption);
                            ShowAlert(textStatus, errorThrown, "danger");
                        }
                    });
                } else {
                    ShowAlert("Error: ", "Captcha not Matched! Please enter the correct captcha code.", "danger");
                }
            } else {
                ShowAlert("Error: ", "Please enter valid data for all required fields.", "danger");
            }
        });
    });
</script>
