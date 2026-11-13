<!-- ===== NEWS POPUP MODAL (CONTENT-BASED RESPONSIVE & ADAPTIVE) ===== -->
<style>
/* Base Modal Container */
#newsPopupModal .modal-dialog {
    margin: 1rem auto;
    transition: max-width 0.25s ease, width 0.25s ease, transform 0.3s ease-out;
}
#newsPopupModal .modal-content {
    border-radius: 16px;
    overflow: hidden;
    border: none;
    box-shadow: 0 25px 60px rgba(9, 30, 62, 0.45);
    background: #ffffff;
    max-height: calc(100vh - 24px);
    display: flex;
    flex-direction: column;
}
#newsPopupModal .modal-header {
    background: linear-gradient(135deg, #091E3E 0%, #06A3DA 100%);
    color: #ffffff;
    padding: 10px 16px;
    border-bottom: none;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
#newsPopupModal .modal-header .modal-title {
    font-size: clamp(0.95rem, 2vw, 1.15rem);
    font-weight: 700;
    letter-spacing: 0.3px;
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
    color: #ffffff;
    line-height: 1.3;
}
#newsPopupModal .modal-header .modal-title i {
    color: #ffc107;
    font-size: 1.1rem;
}
#newsPopupModal .modal-header .btn-close {
    filter: brightness(0) invert(1);
    opacity: 0.9;
    padding: 0.45rem;
    transition: opacity 0.2s, transform 0.2s;
}
#newsPopupModal .modal-header .btn-close:hover {
    opacity: 1;
    transform: rotate(90deg);
}

/* Image Container - Zero blank space */
#newsPopupModal .popup-image-container {
    position: relative;
    background: transparent;
    padding: 0;
    margin: 0;
    line-height: 0;
    overflow: hidden;
    flex-shrink: 0;
    width: 100%;
    display: block;
}
#newsPopupModal .popup-ambient-bg {
    display: none;
}
#newsPopupModal .popup-hero-img {
    position: relative;
    z-index: 2;
    width: 100%;
    height: auto;
    display: block;
    margin: 0;
    padding: 0;
    border: 0;
}

/* Modal Body Content */
#newsPopupModal .modal-body {
    padding: clamp(16px, 3vw, 24px);
    font-size: clamp(0.92rem, 1.6vw, 1.02rem);
    line-height: 1.65;
    color: #334155;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    flex: 1 1 auto;
}
#newsPopupModal .modal-body::-webkit-scrollbar {
    width: 6px;
}
#newsPopupModal .modal-body::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}

/* Modal Footer */
#newsPopupModal .modal-footer {
    padding: 12px 20px;
    background: #f8fafc;
    border-top: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    flex-shrink: 0;
}
#newsPopupModal .popup-cta-btn {
    background: linear-gradient(135deg, #06A3DA 0%, #091E3E 100%);
    color: #fff;
    border: none;
    padding: 8px 24px;
    font-weight: 600;
    border-radius: 8px;
    transition: transform 0.2s, box-shadow 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
#newsPopupModal .popup-cta-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(6, 163, 218, 0.4);
    color: #fff;
}

/* ============================================================
   1. POSTER ONLY MODE (When message content is empty)
   Hugs the poster edge-to-edge with ZERO blank space!
============================================================ */
#newsPopupModal.is-poster-only .popup-card-grid {
    display: block !important;
    margin: 0;
    padding: 0;
}
#newsPopupModal.is-poster-only .popup-body-wrap {
    display: none !important;
}
#newsPopupModal.is-poster-only .popup-image-container {
    width: 100% !important;
    max-height: none !important;
    flex: none !important;
    background: transparent;
    border-radius: 0 0 16px 16px;
    display: block !important;
}
#newsPopupModal.is-poster-only .popup-hero-img {
    width: 100% !important;
    height: auto !important;
    max-height: none !important;
    display: block !important;
}

/* Optional Bottom Action Bar (only if link URL exists on poster-only mode) */
#newsPopupModal.is-poster-only #posterActionWrap {
    padding: 10px 16px;
    background: #091E3E;
    display: flex;
    justify-content: center;
    align-items: center;
    border-top: 1px solid rgba(255,255,255,0.1);
    border-radius: 0 0 16px 16px;
    flex-shrink: 0;
}
#newsPopupModal.is-poster-only.has-poster-link .popup-image-container {
    border-radius: 0;
}

/* ============================================================
   2. HAS CONTENT MODE (Both Image + Message Content Exist)
============================================================ */
#newsPopupModal.has-content.layout-landscape .modal-dialog {
    max-width: min(760px, 94vw);
}
#newsPopupModal.has-content.layout-square .modal-dialog {
    max-width: min(540px, 92vw);
}
#newsPopupModal.has-content.layout-landscape .popup-hero-img,
#newsPopupModal.has-content.layout-square .popup-hero-img {
    width: 100%;
    height: auto;
    display: block;
}

/* Portrait + Content: Side-by-side on desktop, stacked on mobile */
@media (min-width: 768px) {
    #newsPopupModal.has-content.layout-portrait .modal-dialog {
        max-width: min(820px, 94vw);
    }
    #newsPopupModal.has-content.layout-portrait .popup-card-grid {
        display: flex;
        flex-direction: row;
        align-items: stretch;
        max-height: calc(86vh - 54px);
    }
    #newsPopupModal.has-content.layout-portrait .popup-image-container {
        flex: 0 0 46%;
        display: flex;
    }
    #newsPopupModal.has-content.layout-portrait .popup-hero-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    #newsPopupModal.has-content.layout-portrait .popup-body-wrap {
        flex: 1 1 54%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow-y: auto;
    }
}
@media (max-width: 767.98px) {
    #newsPopupModal.has-content.layout-portrait .modal-dialog {
        max-width: min(440px, 94vw);
    }
    #newsPopupModal.has-content.layout-portrait .popup-hero-img {
        width: 100%;
        height: auto;
        display: block;
    }
}

/* ============================================================
   3. TEXT ONLY MODE (No image)
============================================================ */
#newsPopupModal.is-text-only .modal-dialog {
    max-width: min(520px, 92vw);
}

/* Mobile screens adjustments */
@media (max-width: 575.98px) {
    #newsPopupModal .modal-dialog {
        margin: 0.5rem auto;
    }
    #newsPopupModal .modal-footer {
        flex-direction: column-reverse;
        padding: 10px 14px;
    }
    #newsPopupModal .modal-footer .btn,
    #newsPopupModal .modal-footer .popup-cta-btn {
        width: 100%;
        justify-content: center;
    }
    #newsPopupModal #popupLinkWrap {
        width: 100%;
    }
}
</style>

<div class="modal fade" id="newsPopupModal" tabindex="-1" aria-labelledby="newsPopupTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="newsPopupTitle">
                    <i class="fas fa-bullhorn"></i>
                    <span id="popupTitleText">Announcement</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Grid wrapper -->
            <div class="popup-card-grid">

                <!-- Poster / Hero Image Container -->
                <div class="popup-image-container" id="popupImageWrap" style="display:none;">
                    <div class="popup-ambient-bg" id="popupAmbientBg"></div>
                    <img id="popupHeroImg" class="popup-hero-img" src="" alt="Announcement">
                </div>

                <!-- Action Button under Poster (Only for poster-only mode when link exists) -->
                <div id="posterActionWrap" style="display:none;">
                    <a id="posterActionBtn" href="#" class="popup-cta-btn" target="_blank" rel="noopener noreferrer">
                        <span id="posterActionText">Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Body + Footer wrap (Only displayed when message content exists) -->
                <div class="popup-body-wrap" id="popupBodyWrap">
                    <!-- Message Body -->
                    <div class="modal-body">
                        <div id="popupContent" style="white-space: pre-line;"></div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <div id="popupLinkWrap" style="display:none;">
                            <a id="popupLink" href="#" class="popup-cta-btn" target="_blank" rel="noopener noreferrer">
                                <span id="popupLinkText">Learn More</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Close
                        </button>
                    </div>
                </div><!-- /popup-body-wrap -->

            </div><!-- /popup-card-grid -->

        </div>
    </div>
</div>
<!-- ===== /NEWS POPUP MODAL ===== -->

<!-- ===== NEWS POPUP SCRIPT ===== -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var pageName = window.location.pathname.split('/').pop() || 'index.php';
        if (pageName === '') pageName = 'index.php';

        fetch('popup_get.php?page=' + encodeURIComponent(pageName))
            .then(function (response) { return response.json(); })
            .then(function (res) {
                if (res.status !== 'success' || !res.data) return;
                var d = res.data;

                var urlParams = new URLSearchParams(window.location.search);
                var forceShow = urlParams.has('show_popup') || urlParams.has('popup');

                // Frequency check based on admin setting
                var freq = d.display_frequency || 'always';
                var todayStr = new Date().toISOString().slice(0, 10);

                if (!forceShow) {
                    if (freq === 'session') {
                        if (sessionStorage.getItem('gracepath_popup_session_' + d.popup_id)) {
                            return;
                        }
                    } else if (freq === 'once_day') {
                        if (localStorage.getItem('gracepath_popup_day_' + d.popup_id) === todayStr) {
                            return;
                        }
                    }
                }

                var modalEl = document.getElementById('newsPopupModal');
                if (!modalEl) return;

                // Title
                document.getElementById('popupTitleText').textContent = (d.title && d.title.trim() !== '') ? d.title : 'Announcement';

                // Check content, image, link presence
                var hasContent = (d.content && d.content.trim() !== '');
                var hasImage   = (d.image && d.image.trim() !== '');
                var hasLink    = (d.link_url && d.link_url.trim() !== '');

                // Reset state classes
                modalEl.classList.remove('is-poster-only', 'has-content', 'is-text-only',
                                         'has-poster-link', 'layout-landscape', 'layout-square', 'layout-portrait');

                var imgWrap       = document.getElementById('popupImageWrap');
                var heroImg       = document.getElementById('popupHeroImg');
                var ambientBg     = document.getElementById('popupAmbientBg');
                var bodyWrap      = document.getElementById('popupBodyWrap');
                var posterActWrap = document.getElementById('posterActionWrap');
                var dialogEl      = modalEl.querySelector('.modal-dialog');

                // Reset inline dialog width
                if (dialogEl) {
                    dialogEl.style.width    = '';
                    dialogEl.style.maxWidth = '';
                }

                // Helper to size poster-only modal to exact image aspect ratio (0px blank space)
                var activePosterRatio = null;
                function fitPosterDialog() {
                    if (!activePosterRatio || !dialogEl) return;
                    var availW    = Math.min(window.innerWidth * 0.94, 860);
                    var overheadH = hasLink ? 118 : 68; // header + viewport margins + optional link footer
                    var availH    = Math.max(220, (window.innerHeight * 0.92) - overheadH);
                    var exactW    = Math.floor(Math.min(availW, availH * activePosterRatio));
                    dialogEl.style.width    = exactW + 'px';
                    dialogEl.style.maxWidth = exactW + 'px';
                }

                window.addEventListener('resize', function () {
                    if (activePosterRatio && modalEl.classList.contains('is-poster-only')) {
                        fitPosterDialog();
                    }
                });

                // Setup Link Buttons
                if (hasLink) {
                    document.getElementById('popupLink').setAttribute('href', d.link_url);
                    document.getElementById('popupLinkText').textContent = d.link_text || 'Learn More';
                    document.getElementById('popupLinkWrap').style.display = 'block';

                    document.getElementById('posterActionBtn').setAttribute('href', d.link_url);
                    document.getElementById('posterActionText').textContent = d.link_text || 'Learn More';
                } else {
                    document.getElementById('popupLinkWrap').style.display = 'none';
                }

                // ==========================================
                // CASE 1: POSTER ONLY (Image with NO message)
                // ==========================================
                if (hasImage && !hasContent) {
                    modalEl.classList.add('is-poster-only');
                    bodyWrap.style.display = 'none';

                    if (hasLink) {
                        modalEl.classList.add('has-poster-link');
                        posterActWrap.style.display = 'flex';
                    } else {
                        posterActWrap.style.display = 'none';
                    }

                    var imgSrc = 'uploads/popup/' + encodeURIComponent(d.image);
                    var preloader = new Image();

                    preloader.onload = function () {
                        var w = this.naturalWidth  || 1;
                        var h = this.naturalHeight || 1;
                        var ratio = w / h;
                        activePosterRatio = ratio;

                        if (ratio >= 1.25) {
                            modalEl.classList.add('layout-landscape');
                        } else if (ratio < 0.85) {
                            modalEl.classList.add('layout-portrait');
                        } else {
                            modalEl.classList.add('layout-square');
                        }

                        fitPosterDialog();

                        heroImg.src = imgSrc;
                        if (ambientBg) ambientBg.style.backgroundImage = 'none';
                        imgWrap.style.display = 'block';

                        displayModal(modalEl, d.popup_id, freq, todayStr);
                    };

                    preloader.onerror = function () {
                        // Fallback if image missing
                        modalEl.classList.add('is-text-only');
                        imgWrap.style.display = 'none';
                        displayModal(modalEl, d.popup_id, freq, todayStr);
                    };

                    preloader.src = imgSrc;

                // ==========================================
                // CASE 2: IMAGE + CONTENT (Both Exist)
                // ==========================================
                } else if (hasImage && hasContent) {
                    modalEl.classList.add('has-content');
                    bodyWrap.style.display = 'flex';
                    posterActWrap.style.display = 'none';
                    document.getElementById('popupContent').innerHTML = d.content.replace(/\n/g, '<br>');

                    var imgSrc = 'uploads/popup/' + encodeURIComponent(d.image);
                    var preloader = new Image();

                    preloader.onload = function () {
                        var w = this.naturalWidth  || 1;
                        var h = this.naturalHeight || 1;
                        var ratio = w / h;

                        if (ratio >= 1.25) {
                            modalEl.classList.add('layout-landscape');
                        } else if (ratio < 0.85) {
                            modalEl.classList.add('layout-portrait');
                        } else {
                            modalEl.classList.add('layout-square');
                        }

                        heroImg.src = imgSrc;
                        ambientBg.style.backgroundImage = 'url("' + imgSrc + '")';
                        imgWrap.style.display = 'flex';

                        displayModal(modalEl, d.popup_id, freq, todayStr);
                    };

                    preloader.onerror = function () {
                        modalEl.classList.add('is-text-only');
                        imgWrap.style.display = 'none';
                        displayModal(modalEl, d.popup_id, freq, todayStr);
                    };

                    preloader.src = imgSrc;

                // ==========================================
                // CASE 3: TEXT ONLY (No image)
                // ==========================================
                } else {
                    modalEl.classList.add('is-text-only');
                    imgWrap.style.display = 'none';
                    posterActWrap.style.display = 'none';
                    bodyWrap.style.display = 'flex';
                    document.getElementById('popupContent').innerHTML = (d.content || '').replace(/\n/g, '<br>');

                    displayModal(modalEl, d.popup_id, freq, todayStr);
                }
            })
            .catch(function (err) {
                console.error('Popup fetch error:', err);
            });

        function displayModal(modalEl, popupId, freq, todayStr) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                var bsModal = new bootstrap.Modal(modalEl, { backdrop: true, keyboard: true });
                bsModal.show();

                if (freq === 'session') {
                    sessionStorage.setItem('gracepath_popup_session_' + popupId, '1');
                } else if (freq === 'once_day') {
                    localStorage.setItem('gracepath_popup_day_' + popupId, todayStr);
                }
            } else if (typeof jQuery !== 'undefined' && typeof jQuery.fn.modal !== 'undefined') {
                jQuery(modalEl).modal('show');
                if (freq === 'session') {
                    sessionStorage.setItem('gracepath_popup_session_' + popupId, '1');
                } else if (freq === 'once_day') {
                    localStorage.setItem('gracepath_popup_day_' + popupId, todayStr);
                }
            }
        }
    }, 700);
});
</script>
