<?php require_once 'session.php'; ?>
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
			position: absolute;
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
					<li class="nav-item active"><a href="browsejobs.php" class="nav-link">Browse Jobs</a></li>
					<!-- <li class="nav-item"><a href="candidates.php" class="nav-link">Canditates</a></li> -->
					<li class="nav-item"><a href="blog.php" class="nav-link">About Us</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
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
							<a href="signUp-In.php" class="nav-link">Sign In / Sign Up</a>
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

						<!-- Job 1 -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label premium">
									<span class="icon-star"></span> Premium
								</span>

								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-time</span>
										<h2 class="mr-3 text-black"><a href="job-single.php?id=1">Sales Executive -
												Payments</a></h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a href="#">Revolut</a>
										</div>
										<div><span class="icon-my_location"></span> <span>Dublin, London, Madrid,
												Krakow</span></div>
									</div>
								</div>

								<a href="job-single.php?id=1" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=1" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>
							</div>
						</div>

						<!-- Job 6 -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label free">
									<span class="icon-check"></span> Zero-Cost
								</span>


								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-Time</span>
										<h2 class="mr-3 text-black"><a href="job-single.php?id=6">Customer Support
												Agent</a></h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a
												href="#">Decentralized</a></div>
										<div><span class="icon-my_location"></span> <span>Phnom Penh, Cambodia</span>
										</div>
									</div>
								</div>

								<a href="job-single.php?id=6" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=6" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>

							</div>
						</div>

						<!-- Job 2 -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label premium">
									<span class="icon-star"></span> Premium
								</span>

								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-time</span>
										<h2 class="mr-3 text-black"><a href="job-single.php?id=2">Customer Service
												Agent</a></h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a href="#">Foundever</a>
										</div>
										<div><span class="icon-my_location"></span> <span>Lisbon & Porto,
												Portugal</span></div>
									</div>
								</div>
								<a href="job-single.php?id=2" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=2" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>

							</div>
						</div>

						<!-- Job 7 -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label free">
									<span class="icon-check"></span> Zero-Cost
								</span>


								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-Time</span>
										<h2 class="mr-3 text-black"><a href="job-single.php?id=7">Customer Engagement
												Executive</a></h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a
												href="#">Decentralized</a></div>
										<div><span class="icon-my_location"></span> <span>Phnom Penh, Cambodia</span>
										</div>
									</div>
								</div>

								<a href="job-single.php?id=7" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=7" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>

							</div>
						</div>

						<!-- Job 3 -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label premium">
									<span class="icon-star"></span> Premium
								</span>

								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-Time</span>
										<h2 class="mr-3 text-black"><a href="job-single.php?id=3">Customer Support
												Specialist</a></h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a href="#">Gepard Media</a>
										</div>
										<div><span class="icon-my_location"></span> <span>Estonia</span></div>
									</div>
								</div>

								<a href="job-single.php?id=3" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=3" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>


							</div>
						</div>

						<!-- Job 8 - New Job -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label free">
									<span class="icon-check"></span> Zero-Cost
								</span>


								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-Time</span>
										<h2 class="mr-3 text-black">
											<a href="job-single.php?id=8">Customer Support / Operations Role</a>
										</h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a href="#">JioCoin
												Technology</a></div>
										<div><span class="icon-my_location"></span> <span>Phnom Penh, Cambodia</span>
										</div>
									</div>
								</div>

								<a href="job-single.php?id=8" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=8" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>

							</div>
						</div>

						<!-- Job 4 -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label premium">
									<span class="icon-star"></span> Premium
								</span>

								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-Time</span>
										<h2 class="mr-3 text-black"><a href="job-single.php?id=4">Customer Support
												Lead</a></h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a href="#">Localcoin</a>
										</div>
										<div><span class="icon-my_location"></span> <span>Toronto, Canada</span></div>
									</div>
								</div>

								<a href="job-single.php?id=4" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=4" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>


							</div>
						</div>

						<!-- Job 5 -->
						<div class="col-md-12 ftco-animate">
							<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
								<span class="job-label premium">
									<span class="icon-star"></span> Premium
								</span>

								<div class="one-third mb-4 mb-md-0">
									<div class="job-post-item-header align-items-center">
										<span class="subadge">Full-Time</span>
										<h2 class="mr-3 text-black"><a href="job-single.php?id=5">Customer Experience
												Agent</a></h2>
									</div>
									<div class="job-post-item-body d-block d-md-flex">
										<div class="mr-3"><span class="icon-layers"></span> <a href="#">PlayOrbit
												Ltd</a></div>
										<div><span class="icon-my_location"></span> <span>Milan, Italy</span></div>
									</div>
								</div>

								<a href="job-single.php?id=5" class="btn py-2 px-3 px-lg-5 mr-2 text-nowrap"
									style="background-color:#fff9c4; color:#8d6e00; border:1px solid #fdd835; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#fdd835'; this.style.color='#000000';"
									onmouseout="this.style.backgroundColor='#fff9c4'; this.style.color='#8d6e00';">
									View Job
								</a>

								<a href="apply-job.php?id=5" class="btn py-2 px-3 px-lg-5 text-nowrap"
									style="background-color:#fbc02d; color:#000000; transition:all 0.3s ease;"
									onmouseover="this.style.backgroundColor='#f9a825';"
									onmouseout="this.style.backgroundColor='#fbc02d';">
									Apply Job
								</a>

							</div>
						</div>


					</div>

					<!-- Pagination remains the same -->
					<!-- <div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								<ul>
									<li><a href="#">&lt;</a></li>
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&gt;</a></li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</section>


	<!-- <section class="ftco-section-parallax">
		<div class="parallax-img d-flex align-items-center">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
						<h2>Subcribe to our Newsletter</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts. Separated they live in</p>
						<div class="row d-flex justify-content-center mt-4 mb-4">
							<div class="col-md-12">
								<form action="#" class="subscribe-form">
									<div class="form-group d-flex">
										<input type="text" class="form-control" placeholder="Enter email address">
										<input type="submit" value="Subscribe" class="submit px-3">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

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
							<li><a href="browsejobs.php">Browse Jobs</a></li>
							<li><a href="blog.php">About Us</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="privacy-policy.php">Privacy Policy</a></li>
							<li><a href="terms-conditions.php">Terms & Conditions</a></li>
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


	<script type="text/javascript"
		src="/unprotected/back_to_spaceship.js?hash=4975d460e508829e8fb64d3962bc44ad35f3a95a"></script>

</body>

</html>