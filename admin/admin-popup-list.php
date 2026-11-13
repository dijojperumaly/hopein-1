<?php 
include("adminsession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("admin-header-links.php"); ?>
    <title>GracePath - News / Popup Management</title>

    <!-- Cropper.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">

    <style>
        .popup-form-card  { border-top:3px solid #1a237e; }
        .btn-add-popup    { background:#ffc107;color:#000;font-weight:600; }
        .btn-add-popup:hover { background:#e0a800; }

        /* Image picker area */
        .img-pick-wrap {
            border:2px dashed #aaa;border-radius:6px;padding:12px;text-align:center;
            cursor:pointer;background:#fafafa;transition:.2s;
        }
        .img-pick-wrap:hover { border-color:#1a237e;background:#f0f4ff; }
        .img-pick-wrap .pick-icon { font-size:2rem;color:#aaa; }
        .img-pick-wrap p { margin:4px 0 0;color:#888;font-size:13px; }

        /* ============================================================
           CROP MODAL (STRICT VIEWPORT RESPONSIVE)
           Guaranteed to fit 100% within any laptop, tablet, or phone screen!
        ============================================================ */
        #cropModal.modal {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            max-height: 100vh !important;
            background: rgba(0, 0, 0, 0.8) !important;
            z-index: 99999 !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow-x: hidden !important;
            overflow-y: auto !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }
        #cropModal .modal-dialog {
            position: relative !important;
            width: 95% !important;
            max-width: 820px !important;
            margin: 2vh auto !important;
        }
        #cropModal .modal-content {
            border-radius: 8px !important;
            overflow: hidden !important;
            background: #ffffff !important;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.6) !important;
            border: none !important;
            padding: 0 !important;
        }
        #cropModal .modal-header {
            background: #1a237e !important;
            color: #ffffff !important;
            padding: 8px 16px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border-bottom: none !important;
        }
        #cropModal .modal-header .modal-title {
            margin: 0 !important;
            font-size: 15px !important;
            color: #ffffff !important;
            font-weight: 600 !important;
        }
        #cropModal .modal-header .close {
            color: #ffffff !important;
            opacity: 0.9 !important;
            font-size: 22px !important;
            margin: 0 !important;
            padding: 0 !important;
            line-height: 1 !important;
        }
        #cropModal .modal-body {
            padding: 10px 16px !important;
            background: #fdfdfd !important;
        }
        .crop-top-controls {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            gap: 6px !important;
            flex-wrap: wrap !important;
            margin-bottom: 8px !important;
        }
        .crop-ratio-group {
            display: flex !important;
            align-items: center !important;
            gap: 4px !important;
            flex-wrap: wrap !important;
        }
        .ratio-btn {
            padding: 3px 8px !important;
            font-size: 11px !important;
            border-radius: 4px !important;
        }
        .ratio-btn.active {
            background: #1a237e !important;
            color: #ffffff !important;
            border-color: #1a237e !important;
        }
        #cropPreviewWrap {
            width: 60px;
            height: 40px;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #eeeeee;
        }
        /* IMPORTANT: Do NOT put !important on img inside cropper-container-wrap,
           as Cropper.js manages its own internal img dimensions and visibility */
        .cropper-container-wrap {
            width: 100%;
            height: calc(100vh - 250px);
            min-height: 180px;
            max-height: 440px;
            background: #141414;
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }
        #cropperImage {
            display: block;
            max-width: 100%;
        }
        .crop-tools-wrap {
            margin-top: 8px !important;
            display: flex !important;
            gap: 5px !important;
            flex-wrap: wrap !important;
            justify-content: center !important;
        }
        .crop-tools-wrap .btn {
            padding: 4px 10px !important;
            font-size: 11px !important;
        }
        #cropModal .modal-footer {
            height: auto !important;
            padding: 8px 16px !important;
            background: #f5f5f5 !important;
            border-top: 1px solid #e0e0e0 !important;
            display: flex !important;
            justify-content: flex-end !important;
            align-items: center !important;
            gap: 8px !important;
            width: 100% !important;
            border-radius: 0 !important;
        }
        #cropModal .modal-footer .btn {
            float: none !important;
            margin: 0 !important;
            font-size: 13px !important;
            padding: 6px 16px !important;
            font-weight: 600 !important;
        }

        /* Responsive adjustments for smaller screens / laptops */
        @media (max-width: 768px) {
            #cropModal .modal-dialog {
                width: 98% !important;
                margin: 1vh auto !important;
            }
            #cropModal .modal-body {
                padding: 8px 10px !important;
            }
            .cropper-container-wrap {
                height: calc(100vh - 230px);
                min-height: 160px;
            }
            .crop-preview-box {
                display: none !important;
            }
            .crop-tools-wrap .btn-lbl {
                display: none !important;
            }
            #cropModal .modal-footer .btn {
                flex: 1 !important;
                padding: 7px 10px !important;
            }
        }

        /* Cropped thumb in form */
        #croppedThumb {
            max-height:70px;border-radius:4px;border:1px solid #ddd;
            margin-top:6px;display:none;
        }
        .change-img-btn { font-size:11px;margin-top:4px; }

        /* Override Materialize CSS hiding checkboxes inside #customPagesWrap */
        #customPagesWrap input[type="checkbox"].chk-page {
            position: static !important;
            left: auto !important;
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            display: inline-block !important;
            width: 15px !important;
            height: 15px !important;
            margin: 0 7px 0 0 !important;
            vertical-align: middle !important;
            cursor: pointer !important;
            accent-color: #1a237e;
        }
        #customPagesWrap .page-chk-label {
            font-weight: normal !important;
            display: flex !important;
            align-items: center !important;
            margin-bottom: 5px !important;
            cursor: pointer !important;
            color: #333 !important;
            font-size: 12px !important;
            user-select: none;
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
                        <li class="active-bre"><a href="#">News / Popup Management</a></li>
                        <li class="page-back"><a href="../index.php"><i class="fa fa-backward"></i> Back to Website</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">

                                <div class="inn-title" style="display:flex;justify-content:space-between;align-items:center;">
                                    <h4><i class="fa fa-bullhorn"></i> News / Popup Management</h4>
                                    <button class="btn btn-add-popup" id="btnAddPopup">
                                        <i class="fa fa-plus"></i> Add New Popup
                                    </button>
                                </div>

                                <div class="tab-inn">

                                    <!-- Alert -->
                                    <div class="alert alert-dismissible" role="alert" style="display:none;">
                                        <strong></strong><p></p>
                                    </div>

                                    <!-- Add / Edit Form -->
                                    <div id="popupFormCard" class="popup-form-card" style="display:none;padding:20px;margin-bottom:20px;background:#f9f9f9;border-radius:4px;">
                                        <h5 id="formHeading" style="color:#1a237e;margin-bottom:15px;"><i class="fa fa-plus"></i> Add New Popup</h5>

                                        <form id="popupForm" novalidate>
                                            <input type="hidden" name="hdid"            id="hdid"           value="0">
                                            <input type="hidden" name="image_base64"    id="image_base64"   value="">
                                            <input type="hidden" name="image_filename"  id="image_filename" value="">
                                            <input type="hidden" name="keep_image"      id="keep_image"     value="1">
                                            <input type="hidden" name="display_pages"   id="display_pages"  value="home">

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label><b>Title</b> <small class="text-muted">(optional)</small></label>
                                                        <input type="text" name="title" id="title" class="form-control" maxlength="255" placeholder="Enter popup title">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label><b>Status</b></label>
                                                        <select name="is_active" id="is_active" class="form-control">
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label><b>Sort Order</b></label>
                                                        <input type="number" name="sort_order" id="sort_order" class="form-control" value="0" min="0">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><b>Content / Message</b> <small class="text-muted">(optional)</small></label>
                                                        <textarea name="content" id="content" class="form-control" rows="4" placeholder="Enter popup message/announcement..."></textarea>
                                                    </div>
                                                </div>

                                                <!-- Frequency & Pages Controls -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><b>Display Frequency</b></label>
                                                        <select name="display_frequency" id="display_frequency" class="form-control">
                                                            <option value="always">Every time page loads</option>
                                                            <option value="session">One time per browser session</option>
                                                            <option value="once_day">One time per day</option>
                                                        </select>
                                                        <small class="text-muted">How often visitors see this popup</small>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><b>Target Pages</b></label>
                                                        <select id="display_pages_mode" class="form-control">
                                                            <option value="home">Home Page Only (index.php)</option>
                                                            <option value="all">All Pages (Global)</option>
                                                            <option value="custom">Specific Pages...</option>
                                                        </select>
                                                        <small class="text-muted">Where this popup should appear</small>
                                                    </div>
                                                </div>

                                                <div class="col-md-4" id="customPagesWrap" style="display:none;">
                                                    <div class="form-group">
                                                        <label><b>Select Specific Pages</b> <small class="text-muted">(works with or without .php)</small></label>
                                                        <div style="background:#fff;border:1px solid #ccc;border-radius:4px;padding:8px 10px;max-height:130px;overflow-y:auto;">
                                                            <label class="page-chk-label" for="chk_page_home"><input type="checkbox" id="chk_page_home" class="chk-page browser-default" value="index.php"> Home (index.php / index)</label>
                                                            <label class="page-chk-label" for="chk_page_reg"><input type="checkbox" id="chk_page_reg" class="chk-page browser-default" value="registration.php"> Registration (registration.php / registration)</label>
                                                            <label class="page-chk-label" for="chk_page_about"><input type="checkbox" id="chk_page_about" class="chk-page browser-default" value="about.php"> About Us (about.php / about)</label>
                                                            <label class="page-chk-label" for="chk_page_services"><input type="checkbox" id="chk_page_services" class="chk-page browser-default" value="services.php"> Services (services.php / services)</label>
                                                            <label class="page-chk-label" for="chk_page_contact"><input type="checkbox" id="chk_page_contact" class="chk-page browser-default" value="contact.php"> Contact Us (contact.php / contact)</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><b>Start Date</b> <small class="text-muted">(optional)</small></label>
                                                        <input type="date" name="start_date" id="start_date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><b>End Date</b> <small class="text-muted">(optional)</small></label>
                                                        <input type="date" name="end_date" id="end_date" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Image with Crop -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><b>Popup Poster / Image</b> <small class="text-muted">(optional)</small></label>

                                                        <!-- Hidden real file input -->
                                                        <input type="file" id="imageFileInput" accept="image/*" style="display:none;">

                                                        <!-- Click-to-pick area -->
                                                        <div class="img-pick-wrap" id="imgPickArea">
                                                            <div class="pick-icon"><i class="fa fa-camera"></i></div>
                                                            <p><b>Click to select &amp; crop poster</b></p>
                                                            <small style="display:block;margin-top:4px;color:#1a237e;font-size:11px;line-height:1.4;">
                                                                <b>Recommended Dimensions:</b><br>
                                                                • Portrait Poster: <b>800 × 1000 px</b> (4:5) or <b>900 × 1200 px</b> (3:4)<br>
                                                                • Square: <b>800 × 800 px</b> (1:1) | Banner: <b>1200 × 675 px</b> (16:9)<br>
                                                                • Max File Size: <b>5 MB</b> (JPG, PNG, WEBP)
                                                            </small>
                                                        </div>

                                                        <!-- Cropped preview thumbnail -->
                                                        <div style="text-align:center;">
                                                            <img id="croppedThumb" src="" alt="Cropped preview">
                                                            <div id="croppedDimInfo" style="display:none;font-size:11px;color:#1a237e;font-weight:600;margin-top:3px;"></div>
                                                            <div id="changeImgWrap" style="display:none;">
                                                                <button type="button" class="btn btn-xs btn-default change-img-btn" id="btnChangeImg">
                                                                    <i class="fa fa-refresh"></i> Change Image
                                                                </button>
                                                                <button type="button" class="btn btn-xs btn-danger change-img-btn" id="btnRemoveImg">
                                                                    <i class="fa fa-times"></i> Remove
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Current image (edit mode) -->
                                                        <div id="currentImageWrap" style="display:none;margin-top:6px;text-align:center;">
                                                            <small class="text-muted">Current saved image:</small><br>
                                                            <img id="currentImage" src="" style="max-height:60px;border:1px solid #ddd;border-radius:4px;margin-top:4px;" alt="current">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Link URL</b> <small class="text-muted">(optional)</small></label>
                                                        <input type="url" name="link_url" id="link_url" class="form-control" placeholder="https://...">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Link Button Text</b> <small class="text-muted">(optional)</small></label>
                                                        <input type="text" name="link_text" id="link_text" class="form-control" placeholder="e.g. Apply Now">
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-primary" id="btnSavePopup">
                                                    <i class="fa fa-save"></i> Save Popup
                                                </button>
                                                &nbsp;
                                                <button type="button" class="btn btn-default" id="btnCancelForm">
                                                    <i class="fa fa-times"></i> Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Form -->

                                    <!-- DataTable -->
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover" id="popupTable" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Frequency</th>
                                                    <th>Pages</th>
                                                    <th>Status</th>
                                                    <th>Schedule</th>
                                                    <th>Sort</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>

                                </div><!-- /tab-inn -->
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /sb2-2 -->
        </div>
    </div>

    <!-- ===================== CROP MODAL ===================== -->
    <div id="cropModal" class="modal fade" tabindex="-1" role="dialog" style="z-index:99999;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4 class="modal-title"><i class="fa fa-crop"></i> Crop Image</h4>
                </div>
                <div class="modal-body">
                    <!-- Top controls: Aspect ratio & Preview -->
                    <div class="crop-top-controls">
                        <div class="crop-ratio-group">
                            <strong style="margin-right:4px;font-size:12px;">Ratio:</strong>
                            <button type="button" class="btn btn-xs btn-default ratio-btn active" data-ratio="NaN" title="Any size">Free</button>
                            <button type="button" class="btn btn-xs btn-default ratio-btn" data-ratio="0.8" title="800 × 1000 px Poster">4:5 (Poster)</button>
                            <button type="button" class="btn btn-xs btn-default ratio-btn" data-ratio="0.75" title="900 × 1200 px Flyer">3:4 (Flyer)</button>
                            <button type="button" class="btn btn-xs btn-default ratio-btn" data-ratio="1" title="800 × 800 px Square">1:1 (Square)</button>
                            <button type="button" class="btn btn-xs btn-default ratio-btn" data-ratio="1.3333" title="1000 × 750 px">4:3</button>
                            <button type="button" class="btn btn-xs btn-default ratio-btn" data-ratio="1.7778" title="1200 × 675 px Banner">16:9 (Banner)</button>
                            <button type="button" class="btn btn-xs btn-default ratio-btn" data-ratio="0.5625" title="720 × 1280 px">9:16</button>
                        </div>
                        <div class="crop-preview-box" style="display:flex;align-items:center;gap:8px;">
                            <span id="cropDimBadge" class="label label-primary" style="font-size:11px;padding:4px 8px;background:#1e3a5f;">— × — px</span>
                            <span style="font-size:11px;color:#666;">Preview:</span>
                            <div id="cropPreviewWrap"></div>
                        </div>
                    </div>
                    <div style="font-size:11px;color:#475569;background:#f1f5f9;padding:4px 10px;border-radius:4px;margin-bottom:6px;display:flex;flex-wrap:wrap;gap:10px;justify-content:space-between;">
                        <span><i class="fa fa-info-circle text-info"></i> <strong>Recommended Sizes:</strong> Poster: <code>800×1000 px</code> (4:5) &nbsp;|&nbsp; Flyer: <code>900×1200 px</code> (3:4) &nbsp;|&nbsp; Square: <code>800×800 px</code> (1:1) &nbsp;|&nbsp; Banner: <code>1200×675 px</code> (16:9)</span>
                    </div>

                    <!-- Cropper image container (dynamically flexes to fit screen) -->
                    <div class="cropper-container-wrap">
                        <img id="cropperImage" src="" alt="Crop area">
                    </div>

                    <!-- Bottom Tool Buttons -->
                    <div class="crop-tools-wrap">
                        <button type="button" class="btn btn-xs btn-default" id="btnRotateL" title="Rotate Left"><i class="fa fa-rotate-left"></i> <span class="btn-lbl">Rotate L</span></button>
                        <button type="button" class="btn btn-xs btn-default" id="btnRotateR" title="Rotate Right"><i class="fa fa-rotate-right"></i> <span class="btn-lbl">Rotate R</span></button>
                        <button type="button" class="btn btn-xs btn-default" id="btnFlipH" title="Flip Horizontal"><i class="fa fa-arrows-h"></i> <span class="btn-lbl">Flip H</span></button>
                        <button type="button" class="btn btn-xs btn-default" id="btnFlipV" title="Flip Vertical"><i class="fa fa-arrows-v"></i> <span class="btn-lbl">Flip V</span></button>
                        <button type="button" class="btn btn-xs btn-default" id="btnZoomIn" title="Zoom In"><i class="fa fa-search-plus"></i></button>
                        <button type="button" class="btn btn-xs btn-default" id="btnZoomOut" title="Zoom Out"><i class="fa fa-search-minus"></i></button>
                        <button type="button" class="btn btn-xs btn-default" id="btnReset" title="Reset"><i class="fa fa-refresh"></i> <span class="btn-lbl">Reset</span></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="btnCropConfirm">
                        <i class="fa fa-check"></i> Use Cropped Image
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- ===================== /CROP MODAL ===================== -->

    <?php include("admin-fooder.php"); ?>

    <!-- Cropper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

<script>
$(document).ready(function () {

    var cropper      = null;
    var croppedBlob  = null;
    var scaleX = 1, scaleY = 1;

    /* ============================================================
       PAGES MODE SWITCH
    ============================================================ */
    $('#display_pages_mode').on('change', function () {
        var mode = $(this).val();
        if (mode === 'custom') {
            $('#customPagesWrap').slideDown(200);
        } else {
            $('#customPagesWrap').slideUp(200);
            $('#display_pages').val(mode);
        }
    });

    /* ============================================================
       DATATABLE
    ============================================================ */
    var table = $('#popupTable').DataTable({
        ajax: { url: 'admin-popup-all.php', type: 'GET', dataSrc: '' },
        columns: [
            { data: 'popup_id' },
            { data: 'title' },
            {
                data: 'image',
                orderable: false,
                render: function (img) {
                    if (!img) return '<span class="text-muted">—</span>';
                    return '<img src="../uploads/popup/' + encodeURIComponent(img) + '" style="height:36px;border-radius:3px;border:1px solid #ddd;" alt="">';
                }
            },
            {
                data: 'display_frequency',
                render: function (f) {
                    if (f === 'session') {
                        return '<span class="label label-info"><i class="fa fa-clock-o"></i> Once / Session</span>';
                    } else if (f === 'once_day') {
                        return '<span class="label label-warning"><i class="fa fa-calendar-check-o"></i> Once / Day</span>';
                    }
                    return '<span class="label label-primary"><i class="fa fa-refresh"></i> Every Load</span>';
                }
            },
            {
                data: 'display_pages',
                render: function (p) {
                    if (!p || p === 'home' || p === 'index' || p === 'index.php') {
                        return '<span class="label label-default">Home (index.php)</span>';
                    } else if (p === 'all') {
                        return '<span class="label label-success">All Pages</span>';
                    } else {
                        var list = p.split(',').map(function (item) {
                            var s = $.trim(item);
                            if (s === 'home') return 'index.php';
                            return s.indexOf('.') === -1 ? s + '.php' : s;
                        });
                        return '<span class="label label-info" title="' + list.join(', ') + '">' + list.join(', ') + '</span>';
                    }
                }
            },
            {
                data: 'is_active',
                render: function (d) {
                    return d == 1
                        ? '<span class="label label-success">Active</span>'
                        : '<span class="label label-default">Inactive</span>';
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    if (row.start_date || row.end_date) {
                        return (row.start_date || 'Any') + ' to ' + (row.end_date || 'Any');
                    }
                    return '<span class="text-muted">Always Active</span>';
                }
            },
            { data: 'sort_order' },
            {
                data: 'popup_id', orderable: false,
                render: function (id) {
                    return '<button class="btn btn-xs btn-info btnEdit" data-id="' + id + '">'
                         + '<i class="fa fa-edit"></i> Edit</button> '
                         + '<button class="btn btn-xs btn-danger btnDelete" data-id="' + id + '">'
                         + '<i class="fa fa-trash"></i> Delete</button>';
                }
            }
        ],
        order: [[0, 'desc']], pageLength: 10,
        language: { emptyTable: 'No popup records found. Click "Add New Popup" to create one.' }
    });

    /* ============================================================
       ADD / CANCEL
    ============================================================ */
    $('#btnAddPopup').on('click', function () {
        resetForm();
        $('#formHeading').html('<i class="fa fa-plus"></i> Add New Popup');
        $('#popupFormCard').slideDown(300);
        $('html,body').animate({ scrollTop: $('#popupFormCard').offset().top - 100 }, 400);
    });
    $('#btnCancelForm').on('click', function () {
        $('#popupFormCard').slideUp(300);
        resetForm();
    });

    /* ============================================================
       IMAGE PICKER
    ============================================================ */
    $('#imgPickArea').on('click', function () {
        $('#imageFileInput').val('').trigger('click');
    });
    $('#btnChangeImg').on('click', function () {
        $('#imageFileInput').val('').trigger('click');
    });
    $('#btnRemoveImg').on('click', function () {
        clearCroppedImage();
        $('#currentImageWrap').hide();
        $('#keep_image').val('0');
    });

    $('#imageFileInput').on('change', function () {
        var file = this.files[0];
        if (!file) return;

        var allowed = ['image/jpeg','image/png','image/gif','image/webp'];
        if (!allowed.includes(file.type)) {
            ShowAlert('Error', 'Please select a jpg, png, gif or webp image.', 'danger');
            return;
        }
        if (file.size > 5 * 1024 * 1024) {
            ShowAlert('Error', 'Image must be under 5 MB.', 'danger');
            return;
        }

        var reader = new FileReader();
        reader.onload = function (e) {
            openCropModal(e.target.result, file.name);
        };
        reader.readAsDataURL(file);
    });

    /* ============================================================
       CROP MODAL
    ============================================================ */
    function initCropperInstance() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        var imageEl = document.getElementById('cropperImage');
        if (!imageEl || !imageEl.getAttribute('src')) return;

        cropper = new Cropper(imageEl, {
            viewMode: 1,
            dragMode: 'move',
            autoCropArea: 0.9,
            responsive: true,
            restore: false,
            guides: true,
            center: true,
            highlight: false,
            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false,
            preview: '#cropPreviewWrap',
            crop: function (event) {
                var w = Math.round(event.detail.width);
                var h = Math.round(event.detail.height);
                if (w > 0 && h > 0) {
                    $('#cropDimBadge').text(w + ' × ' + h + ' px');
                }
            }
        });
    }

    function openCropModal(dataUrl, filename) {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        $('#cropPreviewWrap').empty();
        $('#cropperImage').attr('src', dataUrl);
        $('#image_filename').val(filename);
        scaleX = 1; scaleY = 1;

        $('.ratio-btn').removeClass('active');
        $('.ratio-btn[data-ratio="NaN"]').addClass('active');

        // Bind shown.bs.modal BEFORE calling .modal('show')
        var cropperInitialized = false;
        $('#cropModal').off('shown.bs.modal').one('shown.bs.modal', function () {
            cropperInitialized = true;
            initCropperInstance();
        });

        $('#cropModal').modal({ backdrop: 'static', keyboard: false });
        $('#cropModal').modal('show');

        // Fallback in case shown.bs.modal already fired or transition was skipped
        setTimeout(function () {
            if (!cropperInitialized && $('#cropModal').is(':visible')) {
                cropperInitialized = true;
                initCropperInstance();
            }
        }, 250);
    }

    // Destroy cropper cleanly whenever modal closes (Cancel / X / Confirm)
    $('#cropModal').on('hidden.bs.modal', function () {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    $(document).on('click', '.ratio-btn', function () {
        $('.ratio-btn').removeClass('active');
        $(this).addClass('active');
        var r = parseFloat($(this).data('ratio'));
        if (!cropper) return;
        cropper.setAspectRatio(isNaN(r) ? NaN : r);
    });

    $('#btnRotateL').on('click', function () { if (cropper) cropper.rotate(-90); });
    $('#btnRotateR').on('click', function () { if (cropper) cropper.rotate(90);  });
    $('#btnFlipH').on('click',   function () { scaleX *= -1; if (cropper) cropper.scaleX(scaleX); });
    $('#btnFlipV').on('click',   function () { scaleY *= -1; if (cropper) cropper.scaleY(scaleY); });
    $('#btnZoomIn').on('click',  function () { if (cropper) cropper.zoom(0.1);  });
    $('#btnZoomOut').on('click', function () { if (cropper) cropper.zoom(-0.1); });
    $('#btnReset').on('click',   function () { scaleX=1;scaleY=1; if (cropper) cropper.reset(); });

    $('#btnCropConfirm').on('click', function () {
        if (!cropper) return;

        var canvas = cropper.getCroppedCanvas({
            maxWidth: 1600,
            maxHeight: 1600,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });
        if (!canvas) {
            ShowAlert('Error', 'Could not crop image.', 'danger');
            return;
        }
        canvas.toBlob(function (blob) {
            if (!blob) return;
            croppedBlob = blob;

            var thumbUrl = URL.createObjectURL(blob);
            $('#croppedThumb').attr('src', thumbUrl).show();
            $('#croppedDimInfo').html('<i class="fa fa-check-circle"></i> Cropped Size: <strong>' + canvas.width + ' &times; ' + canvas.height + ' px</strong>').show();
            $('#changeImgWrap').show();
            $('#imgPickArea').hide();
            $('#currentImageWrap').hide();
            $('#keep_image').val('0');

            $('#cropModal').modal('hide');
        }, 'image/jpeg', 0.92);
    });

    /* ============================================================
       EDIT
    ============================================================ */
    $('#popupTable').on('click', '.btnEdit', function () {
        var id = $(this).data('id');
        $.get('admin-popup-get.php', { id: id }, function (res) {
            if (res.status === 'success') {
                var d = res.data;
                resetForm();
                $('#hdid').val(d.popup_id);
                $('#title').val(d.title);
                $('#content').val(d.content);
                $('#link_url').val(d.link_url  || '');
                $('#link_text').val(d.link_text || '');
                $('#start_date').val(d.start_date || '');
                $('#end_date').val(d.end_date   || '');
                $('#is_active').val(d.is_active);
                $('#sort_order').val(d.sort_order);
                $('#display_frequency').val(d.display_frequency || 'always');

                // Pages mode
                var p = (d.display_pages || 'home').toLowerCase().trim();
                if (p === 'home' || p === 'index' || p === 'index.php') {
                    $('#display_pages_mode').val('home');
                    $('#customPagesWrap').hide();
                } else if (p === 'all') {
                    $('#display_pages_mode').val('all');
                    $('#customPagesWrap').hide();
                } else {
                    $('#display_pages_mode').val('custom');
                    $('#customPagesWrap').show();
                    var pagesArr = p.split(',').map(function (s) {
                        var slug = $.trim(s).replace(/\.php$/i, '');
                        return (slug === 'index' || slug === '') ? 'home' : slug;
                    });
                    $('.chk-page').each(function () {
                        var valSlug = $(this).val().toLowerCase().replace(/\.php$/i, '');
                        if (valSlug === 'index') valSlug = 'home';
                        $(this).prop('checked', pagesArr.includes(valSlug));
                    });
                }
                $('#display_pages').val(p);

                $('#keep_image').val('1');

                if (d.image) {
                    $('#currentImage').attr('src', '../uploads/popup/' + encodeURIComponent(d.image));
                    $('#currentImageWrap').show();
                }
                $('#formHeading').html('<i class="fa fa-edit"></i> Edit Popup');
                $('#popupFormCard').slideDown(300);
                $('html,body').animate({ scrollTop: $('#popupFormCard').offset().top - 100 }, 400);
            } else {
                ShowAlert('Error', 'Could not load record.', 'danger');
            }
        }, 'json').fail(function () {
            ShowAlert('Error', 'Server error loading record.', 'danger');
        });
    });

    /* ============================================================
       DELETE
    ============================================================ */
    $('#popupTable').on('click', '.btnDelete', function () {
        var id = $(this).data('id');
        bootbox.confirm({
            title: 'Confirm Delete',
            message: 'Are you sure you want to delete this popup?',
            buttons: {
                confirm: { label: '<i class="fa fa-trash"></i> Delete', className: 'btn-danger' },
                cancel:  { label: 'Cancel', className: 'btn-default' }
            },
            callback: function (result) {
                if (!result) return;
                $.get('admin-popup-delete.php', { delid: id }, function (res) {
                    ShowAlert(
                        res.status === 'success' ? 'Success' : 'Error',
                        res.status === 'success' ? 'Popup deleted.' : (res.msg || 'Delete failed.'),
                        res.status === 'success' ? 'success' : 'danger'
                    );
                    if (res.status === 'success') table.ajax.reload(null, false);
                }, 'json');
            }
        });
    });

    /* ============================================================
       SAVE (Add / Edit)
    ============================================================ */
    $('#popupForm').on('submit', function (e) {
        e.preventDefault();

        var title   = $.trim($('#title').val());
        var content = $.trim($('#content').val());

        var hasExistingImg = ($('#keep_image').val() == '1' && $('#currentImage').attr('src') !== '');
        var hasNewImg      = (croppedBlob !== null);
        if (!title && !content && !hasExistingImg && !hasNewImg) {
            ShowAlert('Validation', 'Please provide at least a title, message, or image for the popup.', 'warning');
            return;
        }

        // Compute display_pages value
        var pageMode = $('#display_pages_mode').val();
        var finalPages = pageMode;
        if (pageMode === 'custom') {
            var selectedPages = [];
            $('.chk-page:checked').each(function () {
                selectedPages.push($(this).val());
            });
            if (selectedPages.length === 0) {
                finalPages = 'home';
            } else {
                finalPages = selectedPages.join(',');
            }
        }
        $('#display_pages').val(finalPages);

        var formData = new FormData();
        formData.append('hdid',              $('#hdid').val());
        formData.append('title',             title);
        formData.append('content',           content);
        formData.append('link_url',          $('#link_url').val());
        formData.append('link_text',         $('#link_text').val());
        formData.append('display_frequency', $('#display_frequency').val());
        formData.append('display_pages',     finalPages);
        formData.append('start_date',        $('#start_date').val());
        formData.append('end_date',          $('#end_date').val());
        formData.append('is_active',         $('#is_active').val());
        formData.append('sort_order',        $('#sort_order').val());
        formData.append('keep_image',        $('#keep_image').val());

        // Attach cropped blob if available
        if (croppedBlob) {
            var fname = $('#image_filename').val() || 'popup.jpg';
            var ext   = fname.split('.').pop().toLowerCase();
            formData.append('image', croppedBlob, 'cropped_' + Date.now() + '.' + ext);
        }

        $('#btnSavePopup').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving...');

        $.ajax({
            url: 'admin-popup-save.php', type: 'POST',
            data: formData, processData: false, contentType: false, dataType: 'json',
            success: function (res) {
                $('#btnSavePopup').prop('disabled', false).html('<i class="fa fa-save"></i> Save Popup');
                if (res.status === 'success') {
                    ShowAlert('Success', 'Popup saved successfully!', 'success');
                    $('#popupFormCard').slideUp(300);
                    resetForm();
                    table.ajax.reload(null, false);
                } else {
                    ShowAlert('Error', res.msg || 'Save failed.', 'danger');
                }
            },
            error: function () {
                $('#btnSavePopup').prop('disabled', false).html('<i class="fa fa-save"></i> Save Popup');
                ShowAlert('Error', 'Server error. Please try again.', 'danger');
            }
        });
    });

    /* ============================================================
       HELPERS
    ============================================================ */
    function clearCroppedImage() {
        croppedBlob = null;
        $('#croppedThumb').attr('src','').hide();
        $('#croppedDimInfo').html('').hide();
        $('#changeImgWrap').hide();
        $('#imgPickArea').show();
        $('#image_filename').val('');
        $('#image_base64').val('');
        if (cropper) { cropper.destroy(); cropper = null; }
    }

    function resetForm() {
        $('#popupForm')[0].reset();
        $('#hdid').val(0);
        $('#keep_image').val('1');
        $('#display_frequency').val('always');
        $('#display_pages_mode').val('home');
        $('#display_pages').val('home');
        $('#customPagesWrap').hide();
        $('.chk-page').prop('checked', false);
        clearCroppedImage();
        $('#currentImageWrap').hide();
        $('#currentImage').attr('src','');
        $('#imgPickArea').show();
    }
});
</script>

</body>
</html>
