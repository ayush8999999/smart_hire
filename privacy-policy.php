<?php require_once __DIR__ . '/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>EasyHire - Privacy Policy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, follow">
    <link rel="icon" href="images/logo-bg.png" type="image/png">
    <link rel="apple-touch-icon" href="images/logo-bg.png">
    <!-- CSS FILES -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Policy accordion styling */
        .policy-item {
            border: 2.5px solid #fdd835;
            border-radius: 12px;
            padding: 18px 22px;
            margin-bottom: 18px;
            cursor: pointer;
        }

        .policy-item a {
            display: block;
            width: 100%;
        }

        .policy-item {
            cursor: pointer;
        }


        .policy-item a {
            text-decoration: none;
            color: #000;
            font-weight: 600;
            font-size: 1.25rem;
            line-height: 1.5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .policy-item a:hover {
            color: #f57f17;
        }

        .policy-item .icon {
            font-size: 1.4rem;
            transition: transform 0.3s ease;
        }

        .policy-item a[aria-expanded="true"] .icon {
            transform: rotate(180deg);
        }

        .policy-item p {
            font-size: 1.05rem;
            line-height: 1.7;
            margin-top: 10px;
            color: #000;
        }

        /* Footer fixes */
        .footer-contact li {
            display: flex;
            align-items: flex-start;
        }

        .footer-contact li .icon {
            margin-top: 4px;
        }

        .footer-contact li .text {
            margin-left: 12px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid px-md-4">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="images/logo-bg.png" alt="EasyHire" class="navbar-logo mr-2">
                <span>EasyHire</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="browse-jobs.php" class="nav-link">Browse Jobs</a></li>
                    <li class="nav-item"><a href="about-us.php" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
                    <?php if (isLoggedIn()): ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-flex align-items-center"
							href="javascript:void(0)"
							id="userDropdown"
							role="button"
							data-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
							onclick="event.stopPropagation();">

								<span class="user-initials">
									<?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
								</span>
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<span class="dropdown-item-text">
									<?= htmlspecialchars($_SESSION['user_name']) ?>
								</span>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item text-danger" href="logout.php">Logout</a>
							</div>
						</li>
					<?php else: ?>
						<li class="nav-item cta cta-colored">
							<a href="sign-in.php" class="nav-link">Sign In / Sign Up</a>
						</li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-12 text-center mb-5">
                    <p class="breadcrumbs mb-0">
                        <span class="mr-3">
                            <a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Privacy Policy</span>
                    </p>
                    <h1 class="mb-3 bread">Privacy Policy</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <section class="ftco-section contact-section bg-overlay">
        <div class="container">
            <div class="col-md-12">

                <div class="policy-item">
                    <a data-toggle="collapse" href="#privacy1" aria-expanded="false">
                        1. Information We Collect
                        <span class="icon ion-ios-arrow-down"></span>
                    </a>
                    <div class="collapse" id="privacy1">
                        <p>
                            We collect personal and professional information from candidates when they voluntarily
                            submit their details through our website, WhatsApp, email, application forms, or any other
                            recruitment channel. This information may include, but is not limited to, full name, phone
                            number, email address, residential location, date of birth, educational qualifications,
                            professional certifications, employment history, salary expectations, skills, and
                            references. We also collect resumes, CVs, identity documents (where legally required), work
                            permits, and any additional documents necessary for recruitment or compliance with employer
                            or legal requirements.
                            In addition to information you provide directly, we may collect technical data such as IP
                            address, device type, communication logs, and message history when you interact with us
                            through digital platforms. This helps us improve our recruitment services, track application
                            progress, and maintain proper records.
                            All information collected is relevant and necessary for recruitment, placement, and career
                            assistance. We do not collect unnecessary or unrelated personal data. Candidates are always
                            free to decline providing optional information, but some details may be required to proceed
                            with job applications or employer verification.
                        </p>
                    </div>
                </div>

                <div class="policy-item">
                    <a data-toggle="collapse" href="#privacy2" aria-expanded="false">
                        2. How We Use Your Information
                        <span class="icon ion-ios-arrow-down"></span>
                    </a>
                    <div class="collapse" id="privacy2">
                        <p>
                            Your personal information is used strictly for recruitment, employment, and
                            placement-related activities. This includes evaluating your profile, matching your skills
                            with suitable job opportunities, contacting you regarding interviews, job updates, employer
                            requirements, documentation, and onboarding processes. We also use your data to verify your
                            professional background, confirm eligibility for specific job roles, and coordinate directly
                            with employers or hiring managers.
                            Your information may be used to improve our recruitment services, track application
                            progress, resolve disputes, and ensure compliance with legal and contractual obligations.
                            Communication may take place via phone calls, WhatsApp, email, SMS, or other approved
                            communication channels.
                            We do not sell, rent, or use your data for marketing unrelated products or services. Your
                            information is never used for spam, promotions, or third-party advertising. Our goal is to
                            ensure your data is used solely to help you secure legitimate job opportunities and support
                            your career growth.
                        </p>
                    </div>
                </div>

                <div class="policy-item">
                    <a data-toggle="collapse" href="#privacy3" aria-expanded="false">
                        3. Sharing of Information
                        <span class="icon ion-ios-arrow-down"></span>
                    </a>
                    <div class="collapse" id="privacy3">
                        <p>
                            Your personal and professional information is shared only with verified employers, clients,
                            HR departments, or authorized hiring partners who are directly involved in the recruitment
                            and selection process. We share only the necessary information required for your job
                            application, interview, background verification, and hiring process.
                            We ensure that all employers and hiring partners comply with reasonable data protection and
                            confidentiality standards. Your data is not shared with unknown, unverified, or unauthorized
                            third parties. We do not sell or trade candidate data under any circumstances.
                            In some cases, we may be required to share information with legal or regulatory authorities
                            if required by law, government regulations, or court orders. We may also share data with
                            background verification agencies if an employer requires such checks as part of their hiring
                            process.
                            All data sharing is done strictly to support your employment opportunity and never for
                            commercial exploitation of your personal information.
                        </p>
                    </div>
                </div>

                <div class="policy-item">
                    <a data-toggle="collapse" href="#privacy4" aria-expanded="false">
                        4. Data Security
                        <span class="icon ion-ios-arrow-down"></span>
                    </a>
                    <div class="collapse" id="privacy4">
                        <p>
                            We take data security seriously and implement appropriate technical and organizational
                            measures to protect your personal information from unauthorized access, misuse, alteration,
                            or loss. This includes secure storage systems, restricted access to authorized staff,
                            encrypted communication where applicable, and internal confidentiality policies.
                            Only trained and authorized personnel are allowed to handle candidate information. We
                            regularly review our security procedures to ensure that your data remains protected against
                            cyber threats, data breaches, and unauthorized disclosures.
                            While no digital system can guarantee 100% security, we make every reasonable effort to
                            safeguard your data and immediately take action in case of any suspected or actual breach.
                            We also encourage candidates to keep their login details, communication channels, and
                            documents secure when interacting with us online.
                        </p>
                    </div>
                </div>

                <div class="policy-item">
                    <a data-toggle="collapse" href="#privacy5" aria-expanded="false">
                        5. User Consent
                        <span class="icon ion-ios-arrow-down"></span>
                    </a>
                    <div class="collapse" id="privacy5">
                        <p>
                            By submitting your personal information to us through any platform, you explicitly give your
                            consent for us to collect, store, process, and share your data for recruitment and placement
                            purposes. This consent includes communication with you regarding job opportunities,
                            interviews, document verification, and employment offers.
                            You acknowledge that providing false or misleading information may affect your job
                            application and may result in disqualification. You also agree that we are not responsible
                            for employment decisions made by employers based on the information provided.
                            You have the right to request access, correction, or deletion of your personal data at any
                            time by contacting us. However, deletion of your data may limit our ability to provide
                            recruitment services.
                        </p>
                    </div>
                </div>

                <div class="policy-item">
                    <a data-toggle="collapse" href="#privacy6" aria-expanded="false">
                        6. Policy Updates
                        <span class="icon ion-ios-arrow-down"></span>
                    </a>
                    <div class="collapse" id="privacy6">
                        <p>
                            We reserve the right to update, modify, or revise this Privacy Policy at any time to reflect
                            changes in legal requirements, business practices, or service improvements. Any updates will
                            be communicated through our website, application forms, or official communication channels.
                            Continued use of our recruitment services after any changes means you accept the revised
                            Privacy Policy. We recommend reviewing this policy periodically to stay informed about how
                            your data is handled.
                            Our commitment is to remain transparent, responsible, and respectful of your privacy while
                            delivering genuine and professional recruitment services.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2">EasyHire Jobboard</h2>
                        <p>
                            EasyHire Jobboard simplifies hiring by connecting skilled talent with trusted employers
                            through smart job matching and seamless recruitment tools.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0 text-md-center text-left">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="browse-jobs.php">Browse Jobs</a></li>
                            <li><a href="about-us.php">About Us</a></li>
                            <li><a href="contact-us.php">Contact Us</a></li>
                            <li><a class="footer-active" href="privacy-policy.php">Privacy Policy</a></li>
                            <li><a href="terms-and-conditions.php">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2">Have Questions?</h2>
                        <ul class="list-unstyled footer-contact">
                            <li>
                                <span class="icon icon-map-marker"></span>
                                <span class="text">
                                    Amss Central Tower, St. 63, BKK1, Phnom Penh, Cambodia
                                </span>
                            </li>
                            <li>
                                <span class="icon icon-phone"></span>
                                <a href="tel:+919145749130" class="text">+91 9145749130 / 8097117905</a>
                            </li>
                            <li>
                                <span class="icon icon-envelope"></span>
                                <a href="mailto:growwithuseasyhire@gmail.com" class="text">
                                    growwithuseasyhire@gmail.com
                                </a>
                            </li>
                        </ul>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="https://wa.me/+919145749130" target="_blank"><span class="icon ion-logo-whatsapp"></span></a></li>
                            <li class="ftco-animate"><a href="https://t.me/Easyhireconsultancy" target="_blank"><span class="icon bi bi-telegram"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0">
                       All rights reserved ©
                        <script>document.write(new Date().getFullYear());</script>
                        EasyHire - Connecting Talent with Opportunity.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $('.policy-item').on('click', function (e) {
            // if user already clicked the link or inside open content, do nothing
            if ($(e.target).closest('a').length || $(e.target).closest('.collapse').length) {
                return;
            }
            // otherwise trigger the collapse link
            $(this).find('a[data-toggle="collapse"]').trigger('click');
        });
    </script>
    <script>
        // Prevent navbar collapse when dropdown is clicked on mobile
        $('.navbar .dropdown-toggle').on('click', function (e) {
            e.stopPropagation();
            $(this).next('.dropdown-menu').toggle();
        });

        // Close dropdown when clicking outside
        $(document).on('click', function () {
            $('.dropdown-menu').hide();
        });
    </script>

<script type="text/javascript" src="/unprotected/back_to_spaceship.js?hash=4975d460e508829e8fb64d3962bc44ad35f3a95a"></script>

</body>

</html>