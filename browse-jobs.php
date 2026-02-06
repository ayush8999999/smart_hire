<?php require_once __DIR__ . '/session.php'; 
$jobs = require __DIR__ . '/jobs.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>EasyHire - Browse Jobs</title>
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
		.job-post-item {
			position: relative;
			overflow: hidden;
		}

		/* Common badge */
		.job-label {
			position: static;
			top: 12px;
			right: 12px;
			padding: 6px 14px;
			font-size: 11px;
			font-weight: 600;
			letter-spacing: 0.4px;
			border-radius: 30px;
			text-transform: uppercase;
			display: inline-flex;
			align-items: center;
			gap: 6px;
			box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
			backdrop-filter: blur(6px);
			transition: all 0.3s ease;
			z-index: 2;
		}

		/* Premium badge */
		.job-label.premium {
			background: linear-gradient(135deg, #6a11cb, #2575fc);
			color: #fff;
		}

		/* Free badge */
		.job-label.free {
			background: linear-gradient(135deg, #00c853, #64dd17);
			color: #fff;
		}

		/* Hover effect */
		.job-post-item:hover .job-label {
			transform: translateY(-2px) scale(1.05);
			box-shadow: 0 10px 22px rgba(0, 0, 0, 0.2);
		}

		.job-post-item h2 {
			line-height: 1.1;
			margin-bottom: 0px;
		}

		.job-type {
			color: #206dfb;
			text-transform: uppercase;
			font-weight: 500;
			font-size: 14px;
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
					<li class="nav-item active"><a href="browse-jobs.php" class="nav-link">Browse Jobs</a></li>
					<!-- <li class="nav-item"><a href="candidates.php" class="nav-link">Canditates</a></li> -->
					<li class="nav-item"><a href="about-us.php" class="nav-link">About Us</a></li>
					<li class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
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
									class="ion-ios-arrow-forward"></i></a></span> <span>Browse jobs</span></p>
					<h1 class="mb-3 bread">Browse Jobs</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section browsejobs-section bg-overlay">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 pr-lg-4">
					<div class="row">
						<?php foreach ($jobs as $job): ?>
							<div class="col-md-12 ftco-animate">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
									<div class="w-100">
										<!-- ================= SECTION 1 ================= flex-column flex-md-row -->
										<div class="d-flex justify-content-between align-items-center">
											<!-- Job Type -->
											<span class="job-type">
												<?= htmlspecialchars($job['job_type']) ?>
											</span>
											<!-- Badge -->
											<?php if ($job['badge_type'] === 'premium'): ?>
												<span class="job-label premium">
												<span class="icon-star"></span> Premium
												</span>
											<?php else: ?>
												<span class="job-label free">
												<span class="icon-check"></span> Zero-Cost
												</span>
											<?php endif; ?>
										</div>

										<!-- Divider BELOW BOTH -->
										<hr class="my-3">

										<!-- ================= SECTION 2 ================= -->
										<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
											<!-- LEFT: Job Info -->
											<div class="one-third mb-3 mb-md-0">
												<h2 class="text-black mb-1">
													<a href="view-job.php?id=<?= $job['job_id'] ?>">
														<?= htmlspecialchars($job['job_id']) . "." ?> <?= htmlspecialchars($job['title']) ?>
													</a>
												</h2>
												<div class="mt-1 text-muted" style="font-size:14px; font-weight:600;">
													<?= htmlspecialchars($job['category']) ?>
												</div>
												<div class="job-post-item-body d-block d-md-flex">
													<div class="mr-3">
														<span class="icon-building"></span>
														<?= htmlspecialchars($job['company']) ?>
													</div>
													<div>
														<span class="icon-map-marker"></span>
														<?= htmlspecialchars($job['location']) ?>
													</div>
												</div>
											</div>

											<!-- RIGHT: Buttons (UNCHANGED) -->
											<div class="d-flex align-items-center mt-3 mt-md-0">

												<a href="view-job.php?id=<?= $job['job_id'] ?>"
													class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
													style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835;">
													View Job
												</a>

												<?php if (isLoggedIn()): ?>
													<a href="apply-job.php?id=<?= $job['job_id'] ?>"
														class="btn py-2 px-3 px-lg-5 text-nowrap"
														style="background-color:#fbc02d; color:#000000;">
														Apply Job
													</a>
												<?php else: ?>
													<a href="sign-in.php"
														class="btn py-2 px-3 px-lg-5 text-nowrap"
														style="background-color:#fbc02d; color:#000000;">
														Apply Job
													</a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
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
							<li><a class="footer-active" href="browse-jobs.php">Browse Jobs</a></li>
							<li><a href="about-us.php">About Us</a></li>
							<li><a href="contact-us.php">Contact Us</a></li>
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

	<script type="text/javascript"
		src="/unprotected/back_to_spaceship.js?hash=4975d460e508829e8fb64d3962bc44ad35f3a95a"></script>

</body>

</html>