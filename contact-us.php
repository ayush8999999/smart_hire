<?php require_once 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>EasyHire - Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo-bg.png" type="image/png">
    <link rel="apple-touch-icon" href="images/logo-bg.png">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .block-23 ul li:last-child .text {
      padding-left: 25px !important;
    }

    .form-group .btn.btn-primary {
      background-color: #fde047 !important;
      /* normal yellow */
      border-color: #fde047 !important;
      color: #111827 !important;
    }

    .form-group .btn.btn-primary:hover {
      background-color: #facc15 !important;
      border-color: #facc15 !important;
    }

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

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid px-md-4	">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
          <img src="images/logo-bg.png" alt="EasyHire" class="navbar-logo mr-2">
          <span>EasyHire</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="browse-jobs.php" class="nav-link">Browse Jobs</a></li>
          <!-- <li class="nav-item"><a href="candidates.php" class="nav-link">Canditates</a></li> -->
          <li class="nav-item"><a href="about-us.php" class="nav-link">About Us</a></li>
          <li class="nav-item active"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
          <!-- <li class="nav-item cta mr-md-1"><a href="new-post.php" class="nav-link">Post a Job</a></li> -->
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
  <!-- END nav -->

  <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us</span></p>
          <h1 class="mb-3 bread">Contact Us</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-overlay">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 text-center mb-4">
          <h1 class="h1">Contact For Any Queries</h1>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
          <p><span class="contact-info2">Address:</span><br> <span>Amss Central Tower, St. 63, BKK1, Phnom Penh, Cambodia</span></p>
        </div>
        <div class="col-md-3">
          <p><span class="contact-info2">Phone:</span><br> <a href="tel:+919145749130">+91 9145749130 / 8097117905</a></p>
        </div>
        <div class="col-md-3">
          <p><span class="contact-info2">Email:</span><br> <a href="mailto:growwithuseasyhire@gmail.com">growwithuseasyhire@gmail.com</a></p>
        </div>
        <div class="col-md-3">
          <p><span class="contact-info2">Telegram:</span><br> <a href="https://t.me/Easyhireconsultancy" target="_blank">@Easyhireconsultancy</a></p>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="#" class="bg-white p-5 contact-form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>

        </div>

        <div class="col-md-6">
          <div class="bg-white map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.965456731776!2d104.92090977481706!3d11.554334088645696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951550b90a371%3A0xea3e1fb2eb413424!2sAmass%20Central%20Tower!5e0!3m2!1sen!2sin!4v1768119641014!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <!-- <div class="col-md-6 d-flex">
          <div id="map" class="bg-white"></div>
        </div> -->
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">

        <!-- EasyHire Jobboard -->
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="ftco-footer-widget">
            <h2 class="ftco-heading-2">EasyHire Jobboard</h2>
            <p>
              EasyHire Jobboard simplifies hiring by connecting skilled talent with trusted employers
              through smart job matching and seamless recruitment tools.
            </p>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-md-4 mb-4 mb-md-0 text-md-center text-left">
          <div class="ftco-footer-widget">
            <h2 class="ftco-heading-2">Quick Links</h2>
            <ul class="list-unstyled">
              <li><a href="index.php">Home</a></li>
              <li><a href="browse-jobs.php">Browse Jobs</a></li>
              <li><a href="about-us.php">About Us</a></li>
              <li><a class="footer-active" href="contact-us.php">Contact Us</a></li>
              <li><a href="privacy-policy.php">Privacy Policy</a></li>
              <li><a href="terms-and-conditions.php">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>

        <!-- Have a Questions -->
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
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>

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