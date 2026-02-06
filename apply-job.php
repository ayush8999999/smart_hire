<?php require_once __DIR__ . '/session.php';

if (!isLoggedIn()) {
    // Save intended URL (optional but recommended)
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];

    header('Location: sign-in.php');
    exit;
}
$jobs = require __DIR__ . '/jobs.php';

$jobId = $_GET['id'] ?? null;
$job = ($jobId && isset($jobs[$jobId])) ? $jobs[$jobId] : null;

if (!$job) {
    header('Location: browse-jobs.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>EasyHire - Apply Job</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo-bg.png" type="image/png">
    <link rel="apple-touch-icon" href="images/logo-bg.png">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.3.3/build/css/intlTelInput.css">
  <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.3.3/build/js/intlTelInput.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/libphonenumber-js@1.10.51/bundle/libphonenumber-max.js"></script>

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
    body {
      background-color: #fffde7;
      font-family: 'Source Sans Pro', sans-serif;
    }

    .yellow-card {
      background: #fffde0;
      border: 2px solid #fdd835;
      border-radius: 12px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 4px 15px rgba(251, 192, 45, 0.2);
    }

    .yellow-title {
      color: #f57f17;
      font-weight: 700;
      border-bottom: 3px solid #fdd835;
      padding-bottom: 10px;
    }

    h3.yellow-title {
      font-size: 2rem;
    }

    h4.yellow-title {
      font-size: 1.75rem;
    }

    h5 {
      color: #ffab00;
      font-weight: 600;
      margin-top: 30px;
      margin-bottom: 20px;
      border-left: 5px solid #fdd835;
      padding-left: 15px;
    }

    .btn-yellow {
      background: linear-gradient(to right, #fdd835, #f9a825);
      color: #000;
      border: none;
      font-weight: 600;
      transition: all 0.3s;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-yellow:hover {
      background: linear-gradient(to right, #f9a825, #f57f17);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    label {
      font-weight: 600;
      color: #5d4037;
    }

    .form-control {
      border: 1px solid #fdd835;
      border-radius: 8px;
      padding: 10px;
      transition: border 0.3s;
    }

    .form-control:focus {
      border-color: #f57f17;
      box-shadow: 0 0 8px rgba(245, 127, 23, 0.3);
    }

    hr {
      border-top: 2px dashed #fdd835;
      margin: 40px 0;
    }

    /* .hero-wrap::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1), rgba(253, 216, 53, 0.4));
      z-index: 1;
    } */

    .slider-text {
      position: relative;
      z-index: 2;
    }

    /* .bread {
      color: #f57f17 !important;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    } */

    .navbar-brand {
      /* color: #fdd835 !important; */
      font-weight: 700;
    }

    /* .nav-link {
      color: #fff !important;
    } */

    footer {
      background: #5d4037;
      color: #fffde7;
      padding: 40px 0;
    }

    footer p {
      margin: 0;
      font-size: 1.1rem;
      font-weight: 500;
    }

    .company-info {
      background: #fff8e1;
      border-left: 5px solid #fdd835;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 0 8px 8px 0;
    }

    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
    }

    .block-23 ul li:last-child .text {
      padding-left: 25px !important;
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

    .upload-box {
      position: relative;
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 16px;
      border: 2px dashed #fdd835;
      border-radius: 12px;
      background: #fffde7;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .upload-box:hover {
      background: #fff8c4;
      border-color: #f9a825;
    }

    .upload-box .icon {
      font-size: 34px;
      color: #f9a825;
    }

    .upload-box strong {
      color: #5d4037;
    }

    .upload-box input[type="file"] {
      position: absolute;
      inset: 0;
      opacity: 0;
      cursor: pointer;
    }

    input[type="radio"] {
      transform: scale(1.3);
      margin-right: 6px;
      margin-left: 2px;
    }

    .iti {
      width: 100%;
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
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
          <li class="nav-item active"><a href="browse-jobs.php" class="nav-link">Browse Jobs</a></li>
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
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 text-center mb-5">
          <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Apply for Job</span></p>
          <h1 class="mb-3 bread" id="hero-job-title">Apply for <?= $job ? htmlspecialchars($job['title']) : 'job' ?></h1>
          <!-- <h1 class="mb-3 bread" id="hero-job-title">Apply for Job</h1> -->
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <section class="ftco-section apply-job-section bg-overlay">
    <div class="container">

      <!-- Job & Company Info Card -->
      <div class="yellow-card">
        <h3 class="yellow-title">
            <?= htmlspecialchars($job['job_id']) . "." ?> <?= htmlspecialchars($job['title']) ?>
        </h3>

        <div class="company-info">
            <p>
                <strong>Company:</strong>
                <?= htmlspecialchars($job['company']) ?>
            </p>

            <p>
                <strong>Location:</strong>
                <?= htmlspecialchars($job['location']) ?>
            </p>

            <p>
                <strong>Job Type:</strong>
                <?= htmlspecialchars($job['job_type']) ?>
            </p>
        </div>

        <p>
            <?= nl2br(htmlspecialchars($job['description'])) ?>
        </p>
      </div>

      <!-- Application Form -->
      <div class="yellow-card" id="application-form">
        <h4 class="yellow-title mb-4">Candidate Job Application Form</h4>

        <form id="applyForm" enctype="multipart/form-data">
          <input type="hidden" name="job_id" value="<?= (int)$job['job_id'] ?>">
          <input type="hidden" name="job_title" value="<?= htmlspecialchars($job['title']) ?>">
          <input type="hidden" name="company_name" value="<?= htmlspecialchars($job['company']) ?>">

          <div class="form-step active">
            <h5>SECTION 1: PERSONAL DETAILS</h5>

            <!-- Added highlighted note -->
            <div class="alert alert-warning mb-4" role="alert"
              style="background-color: #fff3cd; border: 1px solid #ffeeba; color: #856404;">
              <strong>Important:</strong> Please enter <strong>genuine and accurate details</strong> only.
              All information will be verified during the selection process.
            </div>

            <input type="hidden" name="user_id" value="<?= (int)$_SESSION['user_id'] ?>">

            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name"
                required>
            </div>

            <div class="form-group">
              <label>Gender</label><br>
              <label><input type="radio" name="gender" value="Male" required> Male</label>
              <label class="ml-3"><input type="radio" name="gender" value="Female"> Female</label>
              <label class="ml-3"><input type="radio" name="gender" value="Other"> Other</label>
            </div>

            <div class="form-group">
              <label>Date of Birth</label>
              <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
            </div>

            <div class="form-group phone-group">
              <label>Mobile Number</label>

              <input type="tel" class="form-control" inputmode="numeric" id="mobile" placeholder="Mobile Number" autocomplete="tel" required>

              <!-- Hidden fields -->
              <input type="hidden" name="mobile_code" id="mobile_code">
              <input type="hidden" name="mobile_national" id="mobile_national">
              <input type="hidden" name="country_iso2" id="country_iso2">
            </div>

            <div class="form-group">
              <label>Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address"
                required>
            </div>

            <div class="form-group">
              <label>Current Address</label>
              <textarea class="form-control" id="current_address" name="current_address"
                placeholder="Enter your complete current address" required></textarea>
            </div>

            <div class="form-group">
              <label>City & State</label>
              <input type="text" class="form-control" id="city_state" name="city_state"
                placeholder="e.g. Mumbai, Maharashtra" required>
            </div>

            <div class="form-group">
              <label>Nationality</label>
              <input type="text" class="form-control" name="nationality" placeholder="e.g. Indian" value="Indian">
            </div>

            <div class="form-group">
              <label>Willing to Relocate?</label><br>
              <label><input type="radio" name="willing_to_relocate" value="Yes"> Yes</label>
              <label class="ml-3"><input type="radio" name="willing_to_relocate" value="No"> No</label>
              <label class="ml-3"><input type="radio" name="willing_to_relocate" value="Maybe"> Maybe</label>
            </div>

            <div class="text-right mt-4">
              <button type="button" class="btn btn-yellow next-btn">
                Next
              </button>
            </div>
          </div>

          <div class="form-step">
            <h5>SECTION 2: EDUCATIONAL QUALIFICATION</h5>

            <div class="alert alert-warning mb-4" role="alert"
              style="background-color: #fff3cd; border: 1px solid #ffeeba; color: #856404;">
              <strong>Important:</strong> Please enter <strong>genuine and accurate details</strong> only.
              All information will be verified during the selection process.
            </div>

            <div class="form-group">
              <label>Highest Qualification</label>
              <input type="text" class="form-control" name="highest_qualification" placeholder="e.g. Undergraduate"
                required>
            </div>

            <div class="form-group">
              <label>Specialization</label>
              <input type="text" class="form-control" name="specialization" placeholder="e.g. Computer Science">
            </div>

            <div class="form-group">
              <label>College / University</label>
              <input type="text" class="form-control" name="college_university" placeholder="Name of institution">
            </div>

            <div class="form-group">
              <label>Year of Passing</label>
              <input type="text" class="form-control" name="year_of_passing" placeholder="e.g. 2023">
            </div>
            <div class="d-flex justify-content-between mt-4">
              <button type="button" class="btn btn-yellow prev-btn">
                Previous
              </button>
              <button type="button" class="btn btn-yellow next-btn">
                Next
              </button>
            </div>
          </div>

          <div class="form-step">
            <h5>SECTION 3: WORK EXPERIENCE</h5>

            <div class="alert alert-warning mb-4" role="alert"
              style="background-color: #fff3cd; border: 1px solid #ffeeba; color: #856404;">
              <strong>Important:</strong> Please enter <strong>genuine and accurate details</strong> only.
              All information will be verified during the selection process.
            </div>

            <div class="form-group">
              <label>Total Experience</label><br>
              <label>
                <input type="radio" name="experience_level" value="Fresher">
                Fresher
              </label>

              <label class="ml-2">
                <input type="radio" name="experience_level" value="0–1 Year">
                0–1 Year
              </label>

              <label class="ml-2">
                <input type="radio" name="experience_level" value="1–3 Years">
                1–3 Years
              </label>

              <label class="ml-2">
                <input type="radio" name="experience_level" value="3–5 Years">
                3–5 Years
              </label>

              <label class="ml-2">
                <input type="radio" name="experience_level" value="5+ Years">
                5+ Years
              </label>

            </div>

            <div id="experienceFields">
              <div class="form-group">
                <label>Current / Last Job Title</label>
                <input type="text" class="form-control" name="current_job_title">
              </div>

              <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" name="previous_company">
              </div>

              <div class="form-group">
                <label>Duration</label>
                <input type="text" class="form-control" name="experience_duration">
              </div>
            </div>

            <div class="form-group">
              <label>Key Skills & Responsibilities</label>
              <textarea class="form-control" name="key_skills_responsibilities" rows="4"></textarea>
            </div>
            <div class="d-flex justify-content-between mt-4">
              <button type="button" class="btn btn-yellow prev-btn">
                Previous
              </button>
              <button type="button" class="btn btn-yellow next-btn">
                Next
              </button>
            </div>
          </div>

          <div class="form-step">
            <h5>SECTION 4: JOB PREFERENCES</h5>

            <div class="alert alert-warning mb-4" role="alert"
              style="background-color: #fff3cd; border: 1px solid #ffeeba; color: #856404;">
              <strong>Important:</strong> Please enter <strong>genuine and accurate details</strong> only.
              All information will be verified during the selection process.
            </div>

            <div class="form-group">
              <label>Preferred Job Role(s)</label>
              <input type="text" class="form-control" name="preferred_job_roles">
            </div>

            <div class="form-group">
              <label>Preferred Industry</label>
              <input type="text" class="form-control" name="preferred_industry">
            </div>

            <div class="form-group">
              <label>Preferred Job Location(s)</label>
              <input type="text" class="form-control" name="preferred_job_locations">
            </div>

            <div class="form-group">
              <label>Work Mode Preference</label><br>
              <label><input type="radio" name="work_mode_preference" value="On-site"> On-site</label>
              <label class="ml-3"><input type="radio" name="work_mode_preference" value="Remote"> Remote</label>
              <label class="ml-3"><input type="radio" name="work_mode_preference" value="Hybrid"> Hybrid</label>
            </div>

            <div class="form-group">
              <label>Shift Preference</label><br>
              <label><input type="radio" name="shift_preference" value="Day"> Day</label>
              <label class="ml-3"><input type="radio" name="shift_preference" value="Night"> Night</label>
              <label class="ml-3"><input type="radio" name="shift_preference" value="Rotational"> Rotational</label>
            </div>
            <div class="d-flex justify-content-between mt-4">
              <button type="button" class="btn btn-yellow prev-btn">
                Previous
              </button>
              <button type="button" class="btn btn-yellow next-btn">
                Next
              </button>
            </div>
          </div>

          <div class="form-step">
            <h5>SECTION 5: SALARY & AVAILABILITY</h5>

            <div class="alert alert-warning mb-4" role="alert"
              style="background-color: #fff3cd; border: 1px solid #ffeeba; color: #856404;">
              <strong>Important:</strong> Please enter <strong>genuine and accurate details</strong> only.
              All information will be verified during the selection process.
            </div>

            <div class="form-group">
              <label>Current Salary (CTC)</label>
              <input type="text" class="form-control" name="current_salary">
            </div>

            <div class="form-group">
              <label>Expected Salary (CTC)</label>
              <input type="text" class="form-control" name="expected_salary">
            </div>

            <div class="form-group">
              <label>Notice Period</label><br>
              <label><input type="radio" name="notice_period" value="Immediate"> Immediate</label>
              <label class="ml-2"><input type="radio" name="notice_period" value="15 Days"> 15 Days</label>
              <label class="ml-2"><input type="radio" name="notice_period" value="30 Days"> 30 Days</label>
              <label class="ml-2"><input type="radio" name="notice_period" value="60 Days"> 60 Days</label>
              <label class="ml-2"><input type="radio" name="notice_period" value="90 Days"> 90 Days</label>
            </div>
            <div class="d-flex justify-content-between mt-4">
              <button type="button" class="btn btn-yellow prev-btn">
                Previous
              </button>
              <button type="button" class="btn btn-yellow next-btn">
                Next
              </button>
            </div>
          </div>


          <div class="form-step">
            <h5>SECTION 6: ADDITIONAL INFORMATION</h5>

            <div class="alert alert-warning mb-4" role="alert"
              style="background-color: #fff3cd; border: 1px solid #ffeeba; color: #856404;">
              By submitting this form, candidates confirm that all information provided is genuine.
            </div>


            <div class="form-group">
              <label>Do you have any job offer in hand?</label><br>
              <label><input type="radio" name="has_job_offer" value="Yes"> Yes</label>
              <label class="ml-3"><input type="radio" name="has_job_offer" value="No"> No</label>
            </div>

            <div class="form-group">
              <label>If yes, please mention details</label>
              <textarea class="form-control" name="job_offer_details"></textarea>
            </div>

            <div class="form-group">
              <label>Any additional information</label>
              <textarea class="form-control" name="additional_information"></textarea>
            </div>

            <!-- NEW: PASSPORT UPLOAD -->
            <div class="form-group">
              <label class="d-block mb-2">Upload Passport</label>

              <!-- VIEW MODE -->
              <div id="passportView" class="upload-box d-none">
                <span class="icon ion-ios-paper"></span>
                <div>
                  <strong>Passport Document</strong>
                  <div class="mt-2">
                    <a href="#" target="_blank" id="passportPreview" class="text-warning font-weight-bold">
                      View uploaded file
                    </a>
                    <span class="text-muted ml-2" id="passportName"></span>
                  </div>

                  <button type="button"
                    class="btn btn-sm btn-outline-danger mt-2"
                    onclick="clearFile('passport')">
                    Clear / Change
                  </button>
                </div>
              </div>

              <!-- UPLOAD MODE -->
              <div class="upload-box" id="passportUpload">
                <span class="icon ion-ios-paper"></span>
                <div>
                  <strong>Passport Document</strong>
                  <small class="d-block text-muted">PDF / JPG / PNG (Max 5MB)</small>
                </div>
                <input type="file"
                  name="passport_file"
                  accept=".pdf,.jpg,.jpeg,.png"
                  onchange="handleFilePreview(this, 'passport')">
              </div>

              <input type="hidden" name="existing_passport_file" id="existing_passport_file">
            </div>

            <!-- CV / RESUME UPLOAD -->
            <div class="form-group">
              <label class="d-block mb-2">Upload CV / Resume</label>

              <!-- VIEW MODE -->
              <div id="cvView" class="upload-box d-none">
                <span class="icon ion-ios-paper"></span>
                <div>
                  <strong>Resume / CV</strong>
                  <div class="mt-2">
                    <a href="#" target="_blank" id="cvPreview" class="text-warning font-weight-bold">
                      View uploaded file
                    </a>
                    <span class="text-muted ml-2" id="cvName"></span>
                  </div>

                  <button
                    type="button"
                    class="btn btn-sm btn-outline-danger mt-2"
                    onclick="clearFile('cv')">
                    Clear / Change
                  </button>
                </div>
              </div>

              <!-- UPLOAD MODE -->
              <div class="upload-box" id="cvUpload">
                <span class="icon ion-ios-document"></span>
                <div>
                  <strong>Resume / CV</strong>
                  <small class="d-block text-muted">PDF / DOC / DOCX (Max 2MB)</small>
                </div>

                <input
                  type="file"
                  name="cv_file"
                  accept=".pdf,.doc,.docx"
                  onchange="handleFilePreview(this, 'cv')">
              </div>

              <input type="hidden" name="existing_cv_file" id="existing_cv_file">
            </div>

            <!-- <h5>DECLARATION</h5>
            <p>
              I hereby declare that the information provided above is true and correct to the best of my knowledge.
            </p>

            <div class="form-group">
              <label>Signature</label>
              <input type="text" class="form-control" name="declaration_signed"
                placeholder="Type your full name as signature" required>
            </div>

            <div class="form-group">
              <label>Date</label>
              <input type="date" class="form-control" name="declaration_date" required>
            </div> -->

            <div class="d-flex justify-content-between mt-4">
              <button type="button" class="btn btn-yellow prev-btn">
                Previous
              </button>

              <!-- ONLY PLACE WITH SUBMIT -->
              <button type="submit" class="btn btn-yellow">
                Submit Application
              </button>
            </div>
          </div>

        </form>
      </div>

    </div>
  </section>

  <!-- SUCCESS MODAL -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border-radius:16px;border:2px solid #fdd835;">

        <div class="modal-body text-center p-5" style="background:#fffde7;">

          <!-- ICON -->
          <div style="
          width:80px;
          height:80px;
          border-radius:50%;
          background:linear-gradient(to right,#fdd835,#f9a825);
          display:flex;
          align-items:center;
          justify-content:center;
          margin:0 auto 20px;
          box-shadow:0 6px 18px rgba(0,0,0,.2);
        ">
            <span class="ion-ios-checkmark" style="font-size:48px;color:#000;"></span>
          </div>

          <!-- TEXT -->
          <h3 style="color:#f57f17;font-weight:700;">
            Application Submitted!
          </h3>

          <p class="mt-3" style="color:#5d4037;font-size:16px;">
            Your application for
            <strong id="successJobTitle">this position</strong>
            has been submitted successfully.
          </p>

          <p style="color:#6d4c41;font-size:14px;">
            Our team will review your profile and get back to you soon.
          </p>

          <p style="color:#5d4037;font-size:14px;">
            For any queries, contact us at
            <a href="mailto:growwithuseasyhire@gmail.com" style="color:#f9a825;font-weight:600;">
              growwithuseasyhire@gmail.com
            </a>
          </p>

          <!-- BUTTON -->
          <button type="button" class="btn btn-yellow mt-4 px-4" data-dismiss="modal">
            Done
          </button>

        </div>
      </div>
    </div>
  </div>


  <!-- FOOTER -->
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
                <a href="tel:+919145749130" class="text">+91 9145749130</a>
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
    function showExistingFile(type, url, filename) {
        // hide upload
        document.getElementById(type + 'Upload').classList.add('d-none');

        // show view
        const viewBox = document.getElementById(type + 'View');
        viewBox.classList.remove('d-none');

        document.getElementById(type + 'Preview').href = url;
        document.getElementById(type + 'Name').textContent = `(${filename})`;
    }

    function clearFile(type) {
        // clear hidden value
        document.getElementById('existing_' + type + '_file').value = '';

        // hide view
        document.getElementById(type + 'View').classList.add('d-none');

        // show upload
        document.getElementById(type + 'Upload').classList.remove('d-none');

        // also clear file input if exists
        const input = document.querySelector(`input[name="${type}_file"]`);
        if (input) input.value = '';
    }
    function resetApplicationForm() {
      // Reset form fields
      document.getElementById('applyForm').reset();

      // Reset step navigation
      currentStep = 0;
      showStep(currentStep);

      // Reset upload UI
      ['passport', 'cv'].forEach(type => {
          const view = document.getElementById(type + 'View');
          const upload = document.getElementById(type + 'Upload');

          if (view) view.classList.add('d-none');
          if (upload) upload.classList.remove('d-none');

          const hidden = document.getElementById('existing_' + type + '_file');
          if (hidden) hidden.value = '';
      });

      // Reset phone input (intl-tel-input)
      phoneInput.value = '';
      iti.setCountry('in');

      // Scroll back to top of form
      document
          .getElementById('application-form')
          .scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  function toggleExperienceFields(value) {
      const experienceFields = document.getElementById('experienceFields');
      if (!experienceFields) return;

      if (value === 'Fresher') {
          experienceFields.style.display = 'none';
      } else {
          experienceFields.style.display = 'block';
      }
  }
  </script>
  <script>
    const phoneInput = document.getElementById("mobile");

    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "in",
        nationalMode: false,
        autoHideDialCode: false,
        separateDialCode: true,
        formatOnDisplay: true
    });

    function validatePhone() {
      const countryData = iti.getSelectedCountryData();

      const countryIso2 = countryData.iso2.toUpperCase();
      const dialCode = countryData.dialCode;
      const nationalNumber = phoneInput.value.replace(/\D/g, '');

      if (!nationalNumber) return false;

      const parsed = libphonenumber.parsePhoneNumberFromString(
          nationalNumber,
          countryIso2
      );

      let isValid = false;

      if (parsed && parsed.isValid()) {
          const type = parsed.getType();
          isValid =
              type === undefined ||
              type === "MOBILE" ||
              type === "FIXED_LINE_OR_MOBILE";
      }

      if (!isValid) return false;

      // ✅ populate hidden fields
      document.getElementById("mobile_code").value = "+" + dialCode;
      document.getElementById("country_iso2").value = countryIso2;
      document.getElementById("mobile_national").value = nationalNumber;

      return true;
    }

    phoneInput.addEventListener("beforeinput", (e) => {
        if (e.data && /\D/.test(e.data)) {
            e.preventDefault();
        }
    });
</script>

  </script>
  <!-- db save + email -->
  <script>
  document.getElementById('applyForm').addEventListener('submit', async function (e) {
      e.preventDefault();

      if (!validatePhone()) {
          alert("Please enter a valid mobile number");
          phoneInput.focus();
          return;
      }

      const formData = new FormData(this);
      const submitBtn = this.querySelector('button[type="submit"]');

      submitBtn.disabled = true;
      submitBtn.textContent = 'Submitting... Please wait';

      try {
          const dbResponse = await fetch('apply.php', {
              method: 'POST',
              body: formData
          });

          const dbResult = await dbResponse.json();

          if (!dbResult.success) {
              // ✅ Detect duplicate application error
              if (
                  dbResult.message &&
                  dbResult.message.includes('Duplicate entry') &&
                  dbResult.message.includes('unique_application')
              ) {
                  alert('⚠️ You have already applied for this job.');
                  resetApplicationForm();
                  return;
              }

              throw new Error(dbResult.message || 'Failed to save your application');
          }

          const emailResponse = await fetch('send_email.php', {
              method: 'POST',
              body: formData  // reuse same data
          });

          const emailResult = await emailResponse.json();

          document.getElementById('successJobTitle').textContent = 
              this.querySelector('input[name="job_title"]').value;

          $('#successModal').modal('show');

          resetApplicationForm();

          if (!emailResult.success) {
              setTimeout(() => {
                  alert('Application saved successfully!\n\n' +
                        'But we couldn\'t send confirmation email right now.\n' +
                        'Please check your spam folder or contact us at growwithuseasyhire@gmail.com');
              }, 1500);
          }

      } catch (error) {
          console.error('Submission error:', error);
          alert('❌ ' + (error.message || 'Something went wrong. Please try again later.'));
      } finally {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Submit Application';
      }
  });
  </script>

  <script>
    const steps = document.querySelectorAll('.form-step');
    let currentStep = 0;

    function showStep(index) {
      steps.forEach((step, i) => {
        step.classList.toggle('active', i === index);
      });
    }

    function validateCurrentStep() {
      const currentFormStep = steps[currentStep];
      const inputs = currentFormStep.querySelectorAll(
        'input, textarea, select'
      );

      for (let input of inputs) {
        if (!input.checkValidity()) {
          input.reportValidity(); // show browser validation message
          return false;
        }
      }
      return true;
    }

    document.addEventListener('click', function (e) {

      // NEXT
      if (e.target.classList.contains('next-btn')) {

        // 🚫 stop if validation fails
        if (!validateCurrentStep()) {
          return;
        }

        if (currentStep === 0) {
          if (!validatePhone()) {
              alert("Please enter a valid mobile number");
              phoneInput.focus();
              return; // ❌ BLOCK NEXT
          }
        }

        if (currentStep < steps.length - 1) {
          currentStep++;
          showStep(currentStep);

          document
            .getElementById('application-form')
            .scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }

      // PREVIOUS
      if (e.target.classList.contains('prev-btn')) {
        if (currentStep > 0) {
          currentStep--;
          showStep(currentStep);
        }
      }
    });

    showStep(currentStep);
  </script>
  <script>
    function selectRadioByValue(name, value) {
        if (!value) return;

        const normalize = v =>
            v.toString()
            .trim()
            .replace(/–/g, '-')   // normalize dash
            .replace(/\s+/g, ' ')
            .toLowerCase();

        const target = normalize(value);

        document
            .querySelectorAll(`input[name="${name}"]`)
            .forEach(radio => {
                if (normalize(radio.value) === target) {
                    radio.checked = true;
                }
            });
    }
  </script>
  <script>
  document.addEventListener('DOMContentLoaded', async () => {
      try {
          const res = await fetch('get_prefill_data.php');
          const result = await res.json();

          if (!result.success || !result.data) return;

          const d = result.data;

          // const LARAVEL_BASE_URL = "https://admin.easyhireconsultancy.com";
            const LARAVEL_BASE_URL = "http://127.0.0.1:8000";

            const passportPreview = document.getElementById('passportPreview');
            const cvPreview = document.getElementById('cvPreview');

            if (d.passport_file) {
                const url = `${LARAVEL_BASE_URL}/storage/${d.passport_file}`;
                const filename = d.passport_file.split('/').pop();

                showExistingFile('passport', url, filename);
                document.getElementById('existing_passport_file').value = d.passport_file;
            }

            if (d.cv_file) {
                const url = `${LARAVEL_BASE_URL}/storage/${d.cv_file}`;
                const filename = d.cv_file.split('/').pop();

                showExistingFile('cv', url, filename);
                document.getElementById('existing_cv_file').value = d.cv_file;
            }

          /* ===== BASIC FIELDS ===== */
          if (d.full_name) document.getElementById('full_name').value = d.full_name;
          if (d.email) document.getElementById('email').value = d.email;
          if (d.date_of_birth) document.getElementById('date_of_birth').value = d.date_of_birth;
          if (d.current_address) document.getElementById('current_address').value = d.current_address;
          if (d.city_state) document.getElementById('city_state').value = d.city_state;

          /* ===== RADIO BUTTONS ===== */
          if (d.gender) {
              selectRadioByValue('gender', d.gender);
          }

          if (d.willing_to_relocate) {
              selectRadioByValue('willing_to_relocate', d.willing_to_relocate);
          }

          if (d.experience_level) {
              selectRadioByValue('experience_level', d.experience_level);
          }
          toggleExperienceFields(d.experience_level);
          if (d.work_mode_preference) {
              selectRadioByValue('work_mode_preference', d.work_mode_preference);
          }
          if (d.shift_preference) {
              selectRadioByValue('shift_preference', d.shift_preference);
          }
          if (d.notice_period) {
              selectRadioByValue('notice_period', d.notice_period);
          }
          if (d.has_job_offer) {
              selectRadioByValue('has_job_offer', d.has_job_offer);
          }

          if (d.passport_file) {
              document.getElementById('existing_passport_file').value = d.passport_file;
          }

          if (d.cv_file) {
              document.getElementById('existing_cv_file').value = d.cv_file;
          }

          /* ===== MOBILE (intl-tel-input compatible) ===== */
          if (d.mobile_number && d.country_iso2) {
              iti.setCountry(d.country_iso2.toLowerCase());
              phoneInput.value = d.mobile_number;

              // Populate hidden fields immediately
              document.getElementById("mobile_code").value = d.mobile_code || '';
              document.getElementById("country_iso2").value = d.country_iso2;
              document.getElementById("mobile_national").value = d.mobile_number;
          }

          /* ===== OPTIONAL FIELDS ===== */
          const map = {
              highest_qualification: 'highest_qualification',
              specialization: 'specialization',
              college_university: 'college_university',
              year_of_passing: 'year_of_passing',
              experience_level: 'experience_level',
              current_job_title: 'current_job_title',
              previous_company: 'previous_company',
              experience_duration: 'experience_duration',
              key_skills_responsibilities: 'key_skills_responsibilities',
              preferred_job_roles: 'preferred_job_roles',
              preferred_industry: 'preferred_industry',
              preferred_job_locations: 'preferred_job_locations',
              work_mode_preference: 'work_mode_preference',
              shift_preference: 'shift_preference',
              current_salary: 'current_salary',
              expected_salary: 'expected_salary',
              notice_period: 'notice_period',
              job_offer_details: 'job_offer_details',
              additional_information: 'additional_information'
          };

          for (const key in map) {
              if (d[key]) {
                  const el = document.querySelector(`[name="${map[key]}"]`);
                  if (el) el.value = d[key];
              }
          }

          console.log('Form auto-filled from:', result.source);

      } catch (err) {
          console.warn('Prefill failed:', err);
      }
  });
  </script>
  <script>
    function handleFilePreview(input, type) {
        if (!input.files || !input.files[0]) return;

        const file = input.files[0];
        const url = URL.createObjectURL(file);

        // clear existing hidden value
        document.getElementById('existing_' + type + '_file').value = '';

        showExistingFile(type, url, file.name);
    }
  </script>

  <script>
    document.addEventListener('change', function (e) {

      if (e.target.name === 'experience_level') {
          toggleExperienceFields(e.target.value);
      }

    });
  </script>
  <script>
  // This function sends the confirmation email in the background
  // It uses the same formData so all fields are available if you want to customize later
  async function sendConfirmationEmail(formData) {
      try {
          // Optional: You can create a new FormData with only needed fields
          const emailData = new FormData();
          emailData.append('full_name', formData.get('full_name'));
          emailData.append('email', formData.get('email'));
          emailData.append('job_title', formData.get('job_title') || document.getElementById('job-title').textContent);

          const response = await fetch('send_email.php', {
              method: 'POST',
              body: emailData
          });

          const result = await response.json();

          if (!result.success) {
              console.warn('Confirmation email failed to send:', result.message);
              // Optional: you could show a small toast/notification here
              // alert('Application saved, but confirmation email failed to send.');
          } else {
              console.log('Confirmation email sent successfully');
          }
      } catch (error) {
          console.error('Email sending error:', error);
          // Silent fail - user already sees success from DB
      }
  }
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