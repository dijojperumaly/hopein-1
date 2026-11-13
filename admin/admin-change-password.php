<?php
include("adminsession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("admin-header-links.php"); ?>
    <title>GracePath - Change Password</title>
    <style>
        .pwd-card {
            max-width: 560px;
            margin: 10px auto;
            background: #f9fafc;
            border: 1px solid #e2e8f0;
            border-top: 3px solid #1a237e;
            border-radius: 6px;
            padding: 24px;
        }
        .pwd-input-wrap {
            position: relative;
        }
        .pwd-input-wrap input.form-control {
            padding-right: 40px;
        }
        .pwd-toggle-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 4px 6px;
            font-size: 15px;
        }
        .pwd-toggle-btn:hover {
            color: #1a237e;
        }
        .pwd-strength-bar {
            height: 5px;
            border-radius: 3px;
            background: #e2e8f0;
            margin-top: 6px;
            overflow: hidden;
        }
        .pwd-strength-fill {
            height: 100%;
            width: 0%;
            transition: width 0.25s ease, background-color 0.25s ease;
        }
        .pwd-strength-text {
            font-size: 11px;
            margin-top: 4px;
            display: block;
            color: #64748b;
        }
    </style>
</head>
<body>
    <?php include("admin-header-topmenu.php"); ?>

    <div class="container-fluid sb2">
        <div class="row">
            <?php include("admin-header-sidemenu.php"); ?>

            <div class="sb2-2">
                <!-- Breadcrumbs -->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="admin-application-list.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active-bre"><a href="#">Change Password</a></li>
                        <li class="page-back"><a href="../index.php"><i class="fa fa-backward"></i> Back to Website</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4><i class="fa fa-key"></i> Change Admin Password</h4>
                                    <p>Update your account password to keep your admin panel secure.</p>
                                </div>

                                <div class="tab-inn">
                                    <div class="pwd-card">
                                        <!-- Alert -->
                                        <div id="pwdAlert" class="alert alert-dismissible" role="alert" style="display:none;">
                                            <button type="button" class="close" onclick="$('#pwdAlert').hide();"><span>&times;</span></button>
                                            <strong></strong> <span class="alert-msg"></span>
                                        </div>

                                        <form id="changePasswordForm" autocomplete="off">
                                            <div class="form-group">
                                                <label for="current_password"><b>Current Password</b> <span class="text-danger">*</span></label>
                                                <div class="pwd-input-wrap">
                                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password" required>
                                                    <button type="button" class="pwd-toggle-btn" data-target="#current_password" title="Show/Hide Password">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="new_password"><b>New Password</b> <span class="text-danger">*</span></label>
                                                <div class="pwd-input-wrap">
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password (min 6 characters)" minlength="6" required>
                                                    <button type="button" class="pwd-toggle-btn" data-target="#new_password" title="Show/Hide Password">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="pwd-strength-bar">
                                                    <div id="pwdStrengthFill" class="pwd-strength-fill"></div>
                                                </div>
                                                <small id="pwdStrengthText" class="pwd-strength-text">Minimum 6 characters</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="confirm_password"><b>Confirm New Password</b> <span class="text-danger">*</span></label>
                                                <div class="pwd-input-wrap">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter new password" minlength="6" required>
                                                    <button type="button" class="pwd-toggle-btn" data-target="#confirm_password" title="Show/Hide Password">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                                <small id="pwdMatchMsg" style="display:none;font-size:11px;margin-top:4px;"></small>
                                            </div>

                                            <div class="form-group" style="margin-top:20px;margin-bottom:0;">
                                                <button type="submit" id="btnUpdatePassword" class="btn btn-primary">
                                                    <i class="fa fa-save"></i> Update Password
                                                </button>
                                                <button type="reset" id="btnResetPassword" class="btn btn-default" style="margin-left:8px;">
                                                    <i class="fa fa-refresh"></i> Reset
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /tab-inn -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /sb2-2 -->
        </div>
    </div>

    <?php include("admin-fooder.php"); ?>

    <script>
    $(document).ready(function () {
        function showPwdAlert(title, message, type) {
            var $alert = $('#pwdAlert');
            $alert.removeClass('alert-success alert-danger alert-warning alert-info')
                  .addClass('alert-' + type);
            $alert.find('strong').text(title);
            $alert.find('.alert-msg').text(message);
            $alert.fadeIn(200);
        }

        // Toggle password visibility
        $('.pwd-toggle-btn').on('click', function () {
            var target = $($(this).data('target'));
            var icon   = $(this).find('i');
            if (target.attr('type') === 'password') {
                target.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                target.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Password strength indicator
        $('#new_password').on('input', function () {
            var val = $(this).val();
            var score = 0;
            if (val.length >= 6) score++;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
            if (/[0-9]/.test(val) || /[^A-Za-z0-9]/.test(val)) score++;

            var widths = ['0%', '25%', '50%', '75%', '100%'];
            var colors = ['#e2e8f0', '#ef4444', '#f59e0b', '#3b82f6', '#10b981'];
            var labels = ['Minimum 6 characters', 'Weak', 'Fair', 'Good', 'Strong'];

            $('#pwdStrengthFill').css({ width: widths[score], backgroundColor: colors[score] });
            $('#pwdStrengthText').text(val.length ? 'Strength: ' + labels[score] : 'Minimum 6 characters')
                                 .css('color', val.length ? colors[score] : '#64748b');

            checkMatch();
        });

        $('#confirm_password').on('input', checkMatch);

        function checkMatch() {
            var np = $('#new_password').val();
            var cp = $('#confirm_password').val();
            var $msg = $('#pwdMatchMsg');
            if (!cp) {
                $msg.hide();
                return;
            }
            if (np === cp) {
                $msg.text('Passwords match').css('color', '#10b981').show();
            } else {
                $msg.text('Passwords do not match').css('color', '#ef4444').show();
            }
        }

        $('#btnResetPassword').on('click', function () {
            $('#pwdAlert').hide();
            $('#pwdMatchMsg').hide();
            $('#pwdStrengthFill').css({ width: '0%', backgroundColor: '#e2e8f0' });
            $('#pwdStrengthText').text('Minimum 6 characters').css('color', '#64748b');
        });

        $('#changePasswordForm').on('submit', function (e) {
            e.preventDefault();
            $('#pwdAlert').hide();

            var curr = $('#current_password').val();
            var nw   = $('#new_password').val();
            var conf = $('#confirm_password').val();

            if (!curr || !nw || !conf) {
                showPwdAlert('Validation:', 'Please fill in all password fields.', 'warning');
                return;
            }
            if (nw.length < 6) {
                showPwdAlert('Validation:', 'New password must be at least 6 characters long.', 'warning');
                return;
            }
            if (nw !== conf) {
                showPwdAlert('Validation:', 'New password and confirm password do not match.', 'warning');
                return;
            }

            var $btn = $('#btnUpdatePassword');
            $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Updating...');

            $.ajax({
                url: 'admin-change-password-save.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    current_password: curr,
                    new_password: nw,
                    confirm_password: conf
                },
                success: function (res) {
                    $btn.prop('disabled', false).html('<i class="fa fa-save"></i> Update Password');
                    if (res.status === 'success') {
                        showPwdAlert('Success!', res.msg, 'success');
                        $('#changePasswordForm')[0].reset();
                        $('#pwdMatchMsg').hide();
                        $('#pwdStrengthFill').css({ width: '0%', backgroundColor: '#e2e8f0' });
                        $('#pwdStrengthText').text('Minimum 6 characters').css('color', '#64748b');
                    } else {
                        showPwdAlert('Error!', res.msg || 'Failed to update password.', 'danger');
                    }
                },
                error: function () {
                    $btn.prop('disabled', false).html('<i class="fa fa-save"></i> Update Password');
                    showPwdAlert('Error!', 'Server error. Please try again.', 'danger');
                }
            });
        });
    });
    </script>
</body>
</html>

