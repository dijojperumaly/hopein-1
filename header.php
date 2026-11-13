
<?php
$current_script_name = basename($_SERVER['PHP_SELF']);

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host     = $_SERVER['HTTP_HOST'] ?? 'www.gracepath.in';
$base_dir = rtrim( str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/' );
$site_url = $protocol . $host . ($base_dir ? $base_dir : '');

$seo_pages = [
    'index.php' => [
        'title'       => 'GracePath Education | College Admissions India & Abroad',
        'description' => 'Transparent college admissions in India & abroad with 23+ years of expertise. Direct college fee payments for Nursing, Engineering, Pharmacy & MBA.',
        'keywords'    => 'GracePath, GracePath Education, education consultancy Kerala, BSc Nursing admission Karnataka Kerala, GNM nursing admission, study abroad consultants Kottayam, Ponkunnam college admission guidance'
    ],
    'about.php' => [
        'title'       => 'About GracePath Academy | Education Consultancy Kottayam',
        'description' => 'GracePath Academy in Ponkunnam, Kottayam offers 23+ years of ethical, student-first admissions support across India and abroad with zero commission.',
        'keywords'    => 'About GracePath Academy, education consultants Ponkunnam Kottayam, transparent college admissions, student counseling Kerala, higher education consultancy'
    ],
    'services.php' => [
        'title'       => 'Our Services | Admissions, Study Abroad & Loans - GracePath',
        'description' => 'Explore UG & PG admissions in India, Study Abroad visa & scholarship guidance, education loan support, and career internships at GracePath Education.',
        'keywords'    => 'admissions in India, study abroad consultancy Kerala, education loan support, BSc nursing admission guidance, digital marketing internship, data analysis internship'
    ],
    'contact.php' => [
        'title'       => 'Contact GracePath Education | Ponkunnam, Kottayam, Kerala',
        'description' => 'Contact GracePath Education at Ponkunnam PO, Kottayam, Kerala 686506. Call +91 8086859526 or email info@gracepath.in for admission counseling.',
        'keywords'    => 'GracePath contact number, GracePath Ponkunnam address, education consultancy Kottayam contact, college admission inquiry Kerala'
    ],
    'registration.php' => [
        'title'       => 'Online Admission Registration | GracePath Education',
        'description' => 'Register online with GracePath Education for BSc Nursing, GNM, Pharmacy, Engineering, Allied Health Sciences & Study Abroad college admissions.',
        'keywords'    => 'GracePath online registration, college admission application form, apply for BSc nursing GNM admission'
    ]
];

$seo = $seo_pages[$current_script_name] ?? $seo_pages['index.php'];
$canonical_path = ($current_script_name === 'index.php') ? '/' : '/' . $current_script_name;
$canonical_url  = $site_url . $canonical_path;
$og_image_url   = $site_url . '/img/logo.png';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="<?php echo htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($seo['keywords'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="GracePath Education">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Open Graph / WhatsApp / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="GracePath Education">
    <meta property="og:locale" content="en_IN">
    <meta property="og:title" content="<?php echo htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image_url, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image_url, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Schema.org Structured Data (EducationalOrganization / LocalBusiness) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": ["EducationalOrganization", "LocalBusiness"],
        "name": "GracePath Education",
        "alternateName": "GracePath Academy",
        "url": "<?php echo htmlspecialchars($site_url . '/', ENT_QUOTES, 'UTF-8'); ?>",
        "logo": "<?php echo htmlspecialchars($og_image_url, ENT_QUOTES, 'UTF-8'); ?>",
        "image": "<?php echo htmlspecialchars($site_url . '/img/banner3.jpg', ENT_QUOTES, 'UTF-8'); ?>",
        "description": "GracePath Education Consultancy offers 100% transparent college admissions across India and abroad with 23+ years of expertise and direct-to-college fee payments.",
        "telephone": "+91-8086859526",
        "email": "info@gracepath.in",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Ponkunnam PO",
            "addressLocality": "Kottayam",
            "addressRegion": "Kerala",
            "postalCode": "686506",
            "addressCountry": "IN"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 9.5654436,
            "longitude": 76.761172
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "opens": "09:00",
            "closes": "17:00"
        },
        "sameAs": [
            "https://www.instagram.com/gracepathedu"
        ]
    }
    </script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- WHATS APP SHARE BUTTON STARTING -->
    <a
      href="https://wa.me/918086859526?text=Hi%20There!" target="_blank" rel="noopener noreferrer"
      class="floatWatsapp" aria-label="Chat with GracePath on WhatsApp">
      <img src="whatsapp.png" alt="Chat with GracePath on WhatsApp" height="50" width="50" />
    </a>
    <!-- WHATS APP SHARE BUTTON ENDING -->
    <!--Floating Call BUTTON STARTING -->
    <a
      href="tel:+918086859526"
      class="floatCallbutton" aria-label="Call GracePath Education">
      <img src="call.png" alt="Call GracePath Education" height="50" width="50" />
    </a>
    <!-- Floating Call BUTTON ENDING -->
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Ponkunnam, Kottayam, Kerala</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+91 8086859526</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@gracepath.in</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/gracepathedu" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/gracepathedu" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/gracepathedu" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/gracepathedu?igsh=MXZubXU0MG5vdGQ4cw==" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://www.instagram.com/gracepathedu" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-3 px-lg-5 py-2 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <div class="h1 m-0 fw-bold"><img src="img/logo.png" alt="GracePath Education Logo" width="75" style="margin-right: 8px;">GracePath</div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Toggle Navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link <?php if($current_script_name=="index.php" || $current_script_name=="index" ){ echo "active"; } ?>">Home</a>
                    <a href="about.php" class="nav-item nav-link <?php if($current_script_name=="about.php" || $current_script_name=="about"){ echo "active"; } ?>">About Us</a>
                    <a href="services.php" class="nav-item nav-link <?php if($current_script_name=="services.php" || $current_script_name=="services"){ echo "active"; } ?>">Our Services</a>
                    <a href="contact.php" class="nav-item nav-link <?php if($current_script_name=="contact.php" || $current_script_name=="contact"){ echo "active"; } ?>">Contact Us</a>
                <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div> 
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="price.html" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.html" class="dropdown-item">Our features</a>
                            <a href="team.html" class="dropdown-item">Team Members</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Free Quote</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>-->
                </div>
                <!-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
                <a href="registration.php" class="btn btn-primary py-2 px-4 ms-3">Register With Us</a>
            </div>
        </nav>
