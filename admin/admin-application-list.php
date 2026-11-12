<?php 
include("adminsession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("admin-header-links.php"); ?>
    <title>GracePath - Application / Registration List</title>
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
                        <li class="active-bre"><a href="#">Application / Registration List</a>
                        </li>
                        <li class="page-back"><a href="../index.php"><i class="fa fa-backward" aria-hidden="true"></i> Back to Website</a>
                        </li>
                    </ul>
                </div>
                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Application / Registration List</h4>
                                </div>
                                <div class="tab-inn">
                                    <div class="alert alert-dismissible" role="alert" style="display:none;">
                                        <strong></strong>
                                        <p></p>
                                    </div>
                                    <div class="table-responsive table-desi" id="table_div">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Registration No</th>
                                                    <th>Contact</th>
                                                    <th>Course</th>
                                                    <th>College</th>
                                                    <th>Certificates</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include("admin-fooder.php"); ?>

<script>
window.applicationsData = [];
window.dataTableInstance = null;

function loadImageAsDataURL(url) {
    return new Promise(function(resolve) {
        if (!url) {
            resolve(null);
            return;
        }
        var img = new Image();
        img.crossOrigin = "Anonymous";
        img.onload = function() {
            try {
                var canvas = document.createElement("canvas");
                canvas.width = img.width;
                canvas.height = img.height;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0);
                resolve(canvas.toDataURL("image/png"));
            } catch (e) {
                resolve(null);
            }
        };
        img.onerror = function() {
            resolve(null);
        };
        img.src = url;
    });
}

$(document).ready(function() {

        function buildCertLinks(value) {
            var links = [];
            if (value.cert_10th && value.cert_10th !== "") {
                links.push("<a href='../" + value.cert_10th + "' target='_blank' class='label label-info' style='display:inline-block;margin:2px;'>10th</a>");
            }
            if (value.cert_12th && value.cert_12th !== "") {
                links.push("<a href='../" + value.cert_12th + "' target='_blank' class='label label-info' style='display:inline-block;margin:2px;'>12th</a>");
            }
            if (value.aadhar_file && value.aadhar_file !== "") {
                links.push("<a href='../" + value.aadhar_file + "' target='_blank' class='label label-primary' style='display:inline-block;margin:2px;'>Aadhar</a>");
            }
            if (value.passport_photo && value.passport_photo !== "") {
                links.push("<a href='../" + value.passport_photo + "' target='_blank' class='label label-success' style='display:inline-block;margin:2px;'>Photo</a>");
            }
            if (links.length === 0) {
                return "<span class='text-muted'>None</span>";
            }
            return links.join(" ");
        }

        window.all = function() {
            $.ajax({
                type: "GET",
                url: 'admin-application-all.php',
                beforeSend: function() {
                    $("#table_div").html("<center><img src='images/loader.gif' width='50px'/></center>");
                },
                success: function(response) {
                    response = JSON.parse(response);
                    window.applicationsData = response;

                    var html = '<table class="table table-hover tableData" id="tablepaging">';
   
                    html += "<thead>" +
                        "<tr>" +
                        "<th><input type='checkbox' name='selectAll' id='selectAll' class='select-checkbox' onclick='selectAll(this)' style='position: relative !important; opacity: 1 !important;left: unset !important;'></th>" +
                        "<th style='display:none;'>Admission Year</th>" +
                        "<th>Name</th>" +
                        "<th>Reg No</th>" +
                        "<th>Contact</th>" +
                        "<th>Course</th>" +
                        "<th>College</th>" +
                        "<th>Certificates</th>" +
                        "<th style='display:none;'>Email</th>" +
                        "<th style='display:none;'>Parent Name</th>" +
                        "<th style='display:none;'>Parent Occupation</th>" +
                        "<th style='display:none;'>Parent Contact</th>" +
                        "<th style='display:none;'>Address</th>" +
                        "<th style='display:none;'>Date of Birth</th>" +
                        "<th style='display:none;'>Aadhar No</th>" +
                        "<th style='display:none;'>Nationality</th>" +
                        "<th style='display:none;'>Religion</th>" +
                        "<th style='display:none;'>Community</th>" +
                        "<th style='display:none;'>Caste</th>" +
                        "<th style='display:none;'>Blood Group</th>" +
                        "<th style='display:none;'>HSE School Name</th>" +
                        "<th style='display:none;'>HSE Board</th>" +
                        "<th style='display:none;'>HSE Mark</th>" +
                        "<th style='display:none;'>Passout Year</th>" +
                        "<th>View</th>" +
                        "<th>Edit</th>" +
                        "<th>Delete</th>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody>";

                    if (response.length) {
                        $.each(response, function(key, value) {
                            if (value.isreaded == 0) {
                                html += "<tr>";
                            } else {
                                html += "<tr style='background-color:#e3e8ea;'>";
                            }
                            var contactDisplay = value.contact || "";
                            if (value.parentcontact && value.parentcontact !== "") {
                                contactDisplay += (contactDisplay ? ", <br>" : "") + value.parentcontact;
                            }
                            html +=
                                "<td width='4%'>" +
                                "<input type='checkbox' name='chkselect' id='chkselect' value='" + value.appid + "' style='position: relative !important; opacity: 1 !important;left: unset !important;'></td>" +
                                "<td style='display:none;'><b>" + value.admissionyear + "</b></td>" +
                                "<td width='16%'><a href='admin-application-details.php?id=" + value.appid + "'><b>" + (value.name || "-") + "</b></a></td>" +
                                "<td width='14%'><a href='admin-application-details.php?id=" + value.appid + "'>" + value.regno + "</a></td>" +
                                "<td width='14%'>" + contactDisplay + "</td>" +
                                "<td width='12%'>" + value.course + "</td>" +
                                "<td width='12%'>" + value.college + "</td>" +
                                "<td width='16%'>" + buildCertLinks(value) + "</td>" +
                                "<td style='display:none;'>" + value.email + "</td>" +
                                "<td style='display:none;'>" + value.parentname + "</td>" +
                                "<td style='display:none;'>" + value.parentoccupation + "</td>" +
                                "<td style='display:none;'>" + value.parentcontact + "</td>" +
                                "<td style='display:none;'>" + value.address + "</td>" +
                                "<td style='display:none;'>" + value.dateofbirth + "</td>" +
                                "<td style='display:none;'>" + value.aadhar + "</td>" +
                                "<td style='display:none;'>" + value.nationality + "</td>" +
                                "<td style='display:none;'>" + value.religion + "</td>" +
                                "<td style='display:none;'>" + value.community + "</td>" +
                                "<td style='display:none;'>" + value.cast + "</td>" +
                                "<td style='display:none;'>" + value.bloodgroup + "</td>" +
                                "<td style='display:none;'>" + value.hseschoolname + "</td>" +
                                "<td style='display:none;'>" + value.hseboard + "</td>" +
                                "<td style='display:none;'>" + value.hsemark + "</td>" +
                                "<td style='display:none;'>" + value.passoutyear + "</td>" +
                                "<td><a href='admin-application-details.php?id=" + value.appid + "' class='ad-st-view'>view</a></td>" +
                                "<td><a href='admin-application-edit.php?id=" + value.appid + "' class='ad-st-edit'>edit</a></td>" +
                                "<td><a href='#' class='ad-st-delete' onClick='deleteItem(" + value.appid + ",this)'>delete</a></td>" +
                                "</tr>";
                        });
                        html += "</tbody></table>";
                        html += '<div style="margin-top: 10px; overflow: hidden;">' +
                                '<input type="button" name="btndeleteall" id="btndeleteall" class="btn btn-danger" value="Delete Selected" onclick="getSelected(this)" style="float:left;margin:2px 6px;">' +
                                '<input type="button" name="btndownloadpdf" id="btndownloadpdf" class="btn btn-primary" value="Download Selected Candidates PDF" onclick="downloadSelectedCandidatesPDF(this)" style="float:left;margin:2px 6px;">' +
                                '</div>';
                    } else {
                        html += '</tbody></table>';
                        html += '<div class="alert alert-warning">No records found!</div>';
                    }
                    
                    $("#table_div").html(html);
                    $(".se-pre-con").fadeOut("slow");
                    if (response.length) {
                        tablePagination();
                    }
                },
                complete: function(data) {
                    $(".se-pre-con").fadeOut("slow");
                }
            });
        }

        window.tablePagination = function() {
            window.dataTableInstance = new DataTable('#tablepaging', {
                layout: {
                    topStart: {
                        buttons: [
                            'pageLength',
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'Table PDF',
                                exportOptions: {
                                    columns: [2, 3, 4, 5, 6, 13]
                                }
                            },
                            {
                                text: 'Download Candidates PDF (1 Page / Candidate)',
                                action: function (e, dt, node, config) {
                                    downloadSelectedCandidatesPDF(node[0]);
                                }
                            }
                        ]
                    }
                },
                responsive: true,
                columnDefs: [{
                    'targets': [0, 7, 24, 25, 26],
                    'orderable': false
                }]
            });
        }

    window.deleteItem = function (id, obj, delbtn=0) {
        let caption = obj.value;
        bootbox.confirm({
            onEscape: true,
            size: 'small',
            message: 'Are you sure you want to delete this application?',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result) {
                    obj.value = "Processing...";
                    obj.disabled = true;
                    $.ajax({
                        type: "GET",
                        url: "admin-application-delete.php?delid=" + id,
                        timeout: 10000,
                        beforeSend: function() {
                            $(".se-pre-con").fadeIn("slow");
                        },
                        success: function(response) {
                            try {
                                var json = $.parseJSON(response);
                                var res_status = json["status"];
                                if (res_status == "success") {
                                    ShowAlert("", "Successfully Deleted", "success");
                                    $(obj).closest('tr').remove();
                                    if (delbtn == 1) {
                                        all();
                                    }
                                } else {
                                    ShowAlert("", "Could not delete record", "danger");
                                    obj.value = caption;
                                    obj.disabled = false;
                                }
                            } catch (e) {
                                ShowAlert("", "Error deleting record", "danger");
                                obj.value = caption;
                                obj.disabled = false;
                            }
                        },
                        complete: function(data) {
                            $(".se-pre-con").fadeOut("slow");
                            obj.value = caption;
                            obj.disabled = false;
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            ShowAlert(textStatus, errorThrown, "danger");
                            $(".se-pre-con").fadeOut("slow");
                            obj.value = caption;
                            obj.disabled = false;
                        }
                    });
                }
            }
        });
    }

    all();
});

function getSelectedIds() {
    var selectedIds = [];
    if (window.dataTableInstance) {
        window.dataTableInstance.$('input[name="chkselect"]:checked').each(function() {
            selectedIds.push(String(this.value));
        });
    } else {
        $('input[name="chkselect"]:checked').each(function() {
            selectedIds.push(String(this.value));
        });
    }
    return selectedIds;
}

function getSelected(obj) {
    var selectedIds = getSelectedIds();
    if (selectedIds.length > 0) {
        deleteItem("0," + selectedIds.join(","), obj, 1);
    } else {
        bootbox.alert('Please select at least one item to delete!');
    }
}

function selectAll(obj) {
    var isChecked = obj.checked;
    if (window.dataTableInstance) {
        window.dataTableInstance.$('input[name="chkselect"]').prop('checked', isChecked);
    } else {
        $('#tablepaging').find('input:checkbox').prop('checked', isChecked);
    }
}

async function downloadSelectedCandidatesPDF(btnObj) {
    var selectedIds = getSelectedIds();
    if (selectedIds.length === 0) {
        bootbox.alert('Please select at least one candidate to download PDF!');
        return;
    }

    var selectedCandidates = window.applicationsData.filter(function(item) {
        return selectedIds.indexOf(String(item.appid)) !== -1;
    });

    if (selectedCandidates.length === 0) {
        bootbox.alert('Selected candidate data not found!');
        return;
    }

    var origLabel = "";
    if (btnObj && btnObj.value) {
        origLabel = btnObj.value;
        btnObj.value = "Generating PDF...";
        btnObj.disabled = true;
    }

    try {
        var logoDataUrl = await loadImageAsDataURL('../img/logo.png');
        var content = [];

        for (var i = 0; i < selectedCandidates.length; i++) {
            var c = selectedCandidates[i];
            var photoDataUrl = null;
            if (c.passport_photo && c.passport_photo !== "") {
                photoDataUrl = await loadImageAsDataURL('../' + c.passport_photo);
            }

            // Header columns
            var headerCols = [];
            if (logoDataUrl) {
                headerCols.push({
                    image: logoDataUrl,
                    width: 55,
                    alignment: 'left'
                });
            }
            headerCols.push({
                stack: [
                    { text: 'GRACEPATH EDUCATION', fontSize: 18, bold: true, color: '#091E3E', alignment: 'center' },
                    { text: 'Ponkunnam, Kottayam, Kerala | Phone: +91 8086859526 | Email: info@gracepath.in', fontSize: 9, color: '#555555', alignment: 'center', margin: [0, 3, 0, 0] },
                    { text: 'CANDIDATE APPLICATION / REGISTRATION FORM', fontSize: 12, bold: true, color: '#06A3DA', alignment: 'center', margin: [0, 6, 0, 0] }
                ],
                width: '*'
            });

            content.push({
                columns: headerCols,
                margin: [0, 0, 0, 8]
            });

            content.push({
                canvas: [{ type: 'line', x1: 0, y1: 0, x2: 515, y2: 0, lineWidth: 1.5, lineColor: '#06A3DA' }],
                margin: [0, 0, 0, 12]
            });

            // Registration Meta + Photo Row
            var photoBlock;
            if (photoDataUrl) {
                photoBlock = {
                    image: photoDataUrl,
                    width: 75,
                    height: 90,
                    alignment: 'right'
                };
            } else {
                photoBlock = {
                    table: {
                        widths: [75],
                        heights: [80],
                        body: [[{ text: 'Passport\nPhoto', alignment: 'center', fontSize: 9, color: '#888888', margin: [0, 28, 0, 0] }]]
                    },
                    alignment: 'right'
                };
            }

            content.push({
                columns: [
                    {
                        width: '*',
                        table: {
                            widths: [110, '*'],
                            body: [
                                [{ text: 'Registration No:', bold: true, fontSize: 10 }, { text: c.regno || '-', fontSize: 10, bold: true, color: '#091E3E' }],
                                [{ text: 'Academic Year:', bold: true, fontSize: 10 }, { text: String(c.admissionyear || '-'), fontSize: 10 }],
                                [{ text: 'Course Applied:', bold: true, fontSize: 10 }, { text: c.course || '-', fontSize: 10, bold: true }],
                                [{ text: 'College:', bold: true, fontSize: 10 }, { text: c.college || '-', fontSize: 10 }],
                                [{ text: 'Submitted On:', bold: true, fontSize: 10 }, { text: c.createdat || '-', fontSize: 10 }]
                            ]
                        },
                        layout: 'noBorders'
                    },
                    {
                        width: 90,
                        stack: [photoBlock]
                    }
                ],
                margin: [0, 0, 0, 12]
            });

            // Section 1: Personal Details
            content.push({
                text: '1. Applicant Personal Details',
                style: 'sectionHeader'
            });

            content.push({
                table: {
                    widths: ['23%', '27%', '23%', '27%'],
                    body: [
                        [
                            { text: 'Applicant Name', style: 'fieldLabel' },
                            { text: c.name || '-', style: 'fieldValue' },
                            { text: 'Contact Number', style: 'fieldLabel' },
                            { text: c.contact || '-', style: 'fieldValue' }
                        ],
                        [
                            { text: 'Email Address', style: 'fieldLabel' },
                            { text: c.email || '-', style: 'fieldValue' },
                            { text: 'Date of Birth', style: 'fieldLabel' },
                            { text: c.dateofbirth || '-', style: 'fieldValue' }
                        ],
                        [
                            { text: 'Aadhar Number', style: 'fieldLabel' },
                            { text: c.aadhar || '-', style: 'fieldValue' },
                            { text: 'Blood Group', style: 'fieldLabel' },
                            { text: c.bloodgroup || '-', style: 'fieldValue' }
                        ],
                        [
                            { text: 'Nationality', style: 'fieldLabel' },
                            { text: c.nationality || '-', style: 'fieldValue' },
                            { text: 'Religion', style: 'fieldLabel' },
                            { text: c.religion || '-', style: 'fieldValue' }
                        ],
                        [
                            { text: 'Community', style: 'fieldLabel' },
                            { text: c.community || '-', style: 'fieldValue' },
                            { text: 'Caste', style: 'fieldLabel' },
                            { text: c.cast || '-', style: 'fieldValue' }
                        ],
                        [
                            { text: 'Address', style: 'fieldLabel' },
                            { text: (c.address || '-').replace(/\r\n/g, ', ').replace(/\n/g, ', '), colSpan: 3, style: 'fieldValue' },
                            {},
                            {}
                        ]
                    ]
                },
                layout: {
                    hLineColor: function() { return '#CCCCCC'; },
                    vLineColor: function() { return '#CCCCCC'; }
                },
                margin: [0, 0, 0, 12]
            });

            // Section 2: Parent Details
            content.push({
                text: '2. Parent / Guardian Details',
                style: 'sectionHeader'
            });

            content.push({
                table: {
                    widths: ['23%', '27%', '23%', '27%'],
                    body: [
                        [
                            { text: 'Parent Name', style: 'fieldLabel' },
                            { text: c.parentname || '-', style: 'fieldValue' },
                            { text: 'Parent Occupation', style: 'fieldLabel' },
                            { text: c.parentoccupation || '-', style: 'fieldValue' }
                        ],
                        [
                            { text: 'Parent Contact', style: 'fieldLabel' },
                            { text: c.parentcontact || '-', colSpan: 3, style: 'fieldValue' },
                            {},
                            {}
                        ]
                    ]
                },
                layout: {
                    hLineColor: function() { return '#CCCCCC'; },
                    vLineColor: function() { return '#CCCCCC'; }
                },
                margin: [0, 0, 0, 12]
            });

            // Section 3: Academic / HSE Details
            content.push({
                text: '3. Academic (HSE) Details',
                style: 'sectionHeader'
            });

            content.push({
                table: {
                    widths: ['23%', '27%', '23%', '27%'],
                    body: [
                        [
                            { text: 'HSE School Name', style: 'fieldLabel' },
                            { text: c.hseschoolname || '-', style: 'fieldValue' },
                            { text: 'HSE Board', style: 'fieldLabel' },
                            { text: c.hseboard || '-', style: 'fieldValue' }
                        ],
                        [
                            { text: 'HSE Mark', style: 'fieldLabel' },
                            { text: c.hsemark || '-', style: 'fieldValue' },
                            { text: 'Passout Year', style: 'fieldLabel' },
                            { text: c.passoutyear || '-', style: 'fieldValue' }
                        ]
                    ]
                },
                layout: {
                    hLineColor: function() { return '#CCCCCC'; },
                    vLineColor: function() { return '#CCCCCC'; }
                },
                margin: [0, 0, 0, 12]
            });

            // Section 4: Certificates Submitted
            content.push({
                text: '4. Submitted Certificates & Documents',
                style: 'sectionHeader'
            });

            content.push({
                table: {
                    widths: ['23%', '27%', '23%', '27%'],
                    body: [
                        [
                            { text: '10th Certificate', style: 'fieldLabel' },
                            { text: c.cert_10th ? 'Uploaded' : 'Not Uploaded', style: 'fieldValue', color: c.cert_10th ? '#198754' : '#777777' },
                            { text: '12th Certificate', style: 'fieldLabel' },
                            { text: c.cert_12th ? 'Uploaded' : 'Not Uploaded', style: 'fieldValue', color: c.cert_12th ? '#198754' : '#777777' }
                        ],
                        [
                            { text: 'Aadhar Card', style: 'fieldLabel' },
                            { text: c.aadhar_file ? 'Uploaded' : 'Not Uploaded', style: 'fieldValue', color: c.aadhar_file ? '#198754' : '#777777' },
                            { text: 'Passport Photo', style: 'fieldLabel' },
                            { text: c.passport_photo ? 'Uploaded' : 'Not Uploaded', style: 'fieldValue', color: c.passport_photo ? '#198754' : '#777777' }
                        ]
                    ]
                },
                layout: {
                    hLineColor: function() { return '#CCCCCC'; },
                    vLineColor: function() { return '#CCCCCC'; }
                },
                margin: [0, 0, 0, 18]
            });

            // Declaration & Signature Footer
            content.push({
                text: 'Declaration: I hereby declare that the particulars entered in this application form are true and correct to the best of my knowledge.',
                fontSize: 9,
                italics: true,
                color: '#444444',
                margin: [0, 5, 0, 30]
            });

            var footerItem = {
                columns: [
                    { text: 'Date: ___________________', fontSize: 10, alignment: 'left' },
                    { text: 'Signature of Applicant: ___________________', fontSize: 10, alignment: 'right' }
                ]
            };

            if (i < selectedCandidates.length - 1) {
                footerItem.pageBreak = 'after';
            }

            content.push(footerItem);
        }

        var docDefinition = {
            pageSize: 'A4',
            pageMargins: [40, 35, 40, 35],
            content: content,
            styles: {
                sectionHeader: {
                    fontSize: 11,
                    bold: true,
                    color: '#FFFFFF',
                    fillColor: '#091E3E',
                    margin: [0, 4, 0, 6]
                },
                fieldLabel: {
                    fontSize: 9.5,
                    bold: true,
                    color: '#222222',
                    fillColor: '#F4F6F9',
                    margin: [4, 4, 4, 4]
                },
                fieldValue: {
                    fontSize: 9.5,
                    color: '#000000',
                    margin: [4, 4, 4, 4]
                }
            }
        };

        var fileName = selectedCandidates.length === 1
            ? 'GracePath_Application_' + (selectedCandidates[0].regno || selectedCandidates[0].appid) + '.pdf'
            : 'GracePath_Selected_Applications_' + selectedCandidates.length + '.pdf';

        pdfMake.createPdf(docDefinition).download(fileName);
    } catch (err) {
        bootbox.alert('Error generating PDF: ' + err.message);
    } finally {
        if (btnObj && origLabel) {
            btnObj.value = origLabel;
            btnObj.disabled = false;
        }
    }
}
</script>

</body>
</html>
