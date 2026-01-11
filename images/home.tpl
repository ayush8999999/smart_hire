<?php echo $header; ?>
<style type="text/css">
	body{
		overflow-x:hidden !important;
	}
	
	.firsttext{
		font-size: 63px;
		text-align: center;
		font-weight: 300;
	}

	.firsttext1{
		font-size: 63px;
		text-align: center;
		font-weight: 300;
		line-height: 78px;
	}
	.firsttext > span, .firsttext1 > span{
		color: #1D6362;
	}

	.input_search{
		border: 1px solid #878787;
		border-radius: 5px 0 0 5px;
		outline: none;
		padding: 15px 10px;
		width: 40%;
	}
	.input_search:focus{
	}

	.get_ready_button{
		border: none;
		background: #1D6362;
		color: #FFFFFF;
		outline: none;
		border-radius: 0px 5px 5px 0px;
		padding: 15px 10px;
	}

	.ai_power_div{
		width: 100%;
		border: 1px solid #C0DDDD;
		border-radius: 5px;
		padding: 30px;
	}

	.green_border{
		border: 1px solid #C0DDDD;
		border-radius: 5px;
	}

	.gray_border{
		border: 1px solid #D8D8D8;
		border-radius: 5px;
		padding: 0px;
	}

	.text_our_ai{
		font-size: 20px;
		color: #878787;
	}

	.second_section{
		background-image: url('image/hbackground.svg');
		background-color: #F1F1F1BF;
		background-position:center;
		background-repeat:no-repeat;
		background-size: cover;
	}

	.gray_back{
		background-image: url('image/gray_background.svg');
		background-position:center;
		background-repeat:no-repeat;
		background-size: cover;
	}

	.longtext{
		font-size: 18px;
		color: #343636;
	}

	.request_demo{
		padding: 15px 30px;
		border-radius: 5px;
		background-color: #ED6F2D;
		border: none;
		outline: none;
		color: #FFFFFF;
	}

	.start_hiring{
		padding: 13px 25px;
		border-radius: 5px;
		background-color: #ED6F2D;
		border: none;
		outline: none;
		color: #FFFFFF;
	}

	.start_hiring_g{
		padding: 13px 25px;
		border-radius: 5px;
		background-color: #1D6362;
		border: none;
		outline: none;
		color: #FFFFFF;
	}

	.start_hiring1{
		padding: 13px 25px;
		border-radius: 5px;
		background-color: #1D6362;
		border: none;
		outline: none;
		color: #FFFFFF;
	}

	.rec_text{
		font-size: 52px;
	}


	.multisection > span {
		font-size: 18px;
		color: #878787;
		cursor: pointer;
	}

	.multisection > span.active {
		font-weight: 500;
		padding-bottom: 10px;
		color: #1D6362;
		position: relative;
	}

	.multisection > span.active::after {
		content: "";
		position: absolute;
		bottom: 0;
		left: 0;
		height: 3px;
		background-color: #ED6F2D;
		width: 100%;	
		transform: scaleX(0);
		transform-origin: left;
		animation: borderLoading 7s ease-in-out forwards;
	}

	@keyframes borderLoading {
		0% {
			transform: scaleX(0);
		}
		100% {
			transform: scaleX(1);
		}
	}
	.header_row1{
		width: 90%;
	}

	.multiTitle{
		font-size: 26px;

	}
	.marqueenew {
	    overflow: hidden;
	    white-space: nowrap;
	    position: relative;
	    width: 100%;
	}

	.imagesnew {
	    display: inline-flex;
	    white-space: nowrap;
	    animation: marquee 200s linear infinite;
	}

	.imagenew {
	    margin-left: 25px;
	    display: inline-flex;
	    align-items: center;
	    margin-right: 15px;
	    object-fit: contain;
	    width: 160px;
	}

	.marqueeslidenew{
	    width: 60%;
	}

	@keyframes marquee {
	    0% {
	        transform: translate(0, 0);
	    }
	    100% {
	        transform: translate(-100%, 0);
	    }
	}

	.sixth_text{
		font-size: 32px;
		line-height:35px;
		color: #1D6362;
	}

	.seventh_section{
		padding-top:80px;
	}

	.special-char {
	    color: black;
	}
	.width50{
		width: 50%;
	}
	#typingText{
		font-size: 38px; transition: opacity 0.5s;height: 57px;
	}

	.bggreen {
	    background-image: url(image/greenstrips.svg);
	    background-color: #1D6362;
	    background-position: center;
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	@media (max-width: 1200px){
		#typingText{
			font-size: 30px; transition: opacity 0.5s;height: 57px;
		}
	}

	@media (max-width: 992px){
		.rotate{
			transform: rotate(90deg);
		}
	}
	@media (max-width: 768px){
		.width50{
			width: 100%;
		}
		#typingText{
			font-size: 25px; transition: opacity 0.5s;height: 57px;
		}
		.rotate{
			transform: rotate(90deg);
		}

		.longtext{
			font-size: 15px;
			color: #343636;
		}
	}
	@media (max-width: 568px){
		.rotate{
			transform: rotate(90deg);
		}

		.firsttext1{
			font-size: 38px;
			text-align: center;
			font-weight: 300;
			line-height: 40px;
		}

		.green_border{
			gap: 20px;
		}

		.width50{
			width: 100%;
		}

		#typingText{
			font-size: 25px; transition: opacity 0.5s;height: 57px;
		}
	}

</style>

<section class="header_row1 mx-auto">
	<div class="first_section">
		<h1 data-aos="fade-right" data-aos-delay="100" class="diff_font weight_700 firsttext my-5" style="font-weight: 700">Your Next Hire <br class="d-lg-flex d-none"> in less than <span class="diff_font weight_700">48 Hours</span></h1>

		<h3 data-aos="fade-right" data-aos-delay="200" class="weight_400 text-center diff_font">Fast-Track Your Hiring: Receive<span class="diff_font weight_700"> 15-20 Pre-Screened</span> Applications <br class="d-lg-flex d-none"> <span class="diff_font weight_700">in 48 Hours</span> and Close Positions Quickly</h3>

		<div data-aos="fade-right" data-aos-delay="300" class="d-flex justify-content-center align-items-center my-5">
			<input type="text" class="diff_font weight_400 input_search" name="get_started" id="get_started" placeholder="Post job by entering your work email">
			<button class="get_ready_button weight_400 diff_font" type="button">Get Started</button>
		</div>

		<div data-aos="fade-right" data-aos-delay="400" class="ai_power_div mb-5">
			<div class="d-flex flex-lg-row flex-column justify-content-center align-items-center" style="gap: 40px;">
				<div class="d-flex justify-content-center align-items-center" style="gap: 40px;">
					<div><img src="image/skull_ai.svg"></div>
					<div class="d-lg-flex d-none"><img src="image/orange_straight.svg"></div>
				</div>
				<div class="width50">
					<p class="text_our_ai weight_400 diff_font mb-0 text-lg-left text-center">Our AI powered recruiting process is </p>
					<p class="weight_400 diff_font text_g mb-0 text-lg-left text-center" id="typingText"></p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="my-5 third_section">
        <div class="header_row1 mx-auto">
        <p class="m-lg-5 mt-3 weight_500 text-center" style="font-size:28px">Trusted&nbsp;by top recruiting teams in India</p>
	</div>
</section>
<section class="my-5 d-flex flex-lg-row flex-column justify-content-center align-items-center green_border fourth_section">
    <marquee behavior="alternate" loop scrollamount="12">
                <div class="imagesnew">
                <?php foreach($company_data as $fkey => $fvalue){ ?>
                                <div class="imagenew">
                                        <img src="<?php echo $fvalue['imagepath']; ?>" class="marqueeslidenew" alt="<?php echo $fvalue['company_name']; ?>" />
                                </div>
                        <?php } ?>
                </div>
    </marquee>
</section>

<section class="my-5 second_section">
	<div class="header_row1 py-5 diff_font mx-auto">
		<p data-aos="fade-right" data-aos-delay="200" class="firsttext1 diff_font mb-0 text-left" style="font-weight: 700">Tedious sourcing, <br class="d-lg-flex d-none"> <span class="diff_font weight_500"style="font-weight: 700">screening, and scheduling</span> <br class="d-lg-flex d-none"> <span class="diff_font weight_500" style="font-weight: 700">tasks</span> limit your team's <br class="d-lg-flex d-none"> ability to execute.</p>	

		<p data-aos="fade-right" data-aos-delay="300" class="longtext weight_400 diff_font my-5">An all-in-one recruitment platform designed to accelerate time-to-hire, enhance candidate quality, <br class="d-lg-flex d-none">and streamline the hiring process. <span class="weight_600" style="border-bottom: 1px solid;">Utilizes AI-based </span> automated screening, seamless workflows, <br class="d-lg-flex d-none">and data-driven insights for smarter hiring decisions. Build stronger teams faster by leveraging <br class="d-lg-flex d-none">advanced tools that simplify every step or recruitment, from sourcing to onboarding.</p>
		<a href="book-demo"><button data-aos="fade-right" data-aos-delay="300" class="request_demo">Request a demo</button></a>
	</div>
</section>

<section class="my-5 third_section">
	<div class="header_row1 mx-auto">
		<p class="diff_font text-center rec_text weight_300" style="font-weight: 700">Why Recruiters Post Job On <span class="weight_400 diff_font text_g" style="font-weight: 700">HireBeen?</span></p>

		<p class="font_16 diff_font text-center mb-4 weight_400">AI-Powered candidate Ranking Prioritises Top Talent, <span class="weight_500" style="border-bottom: 1px solid;">Drives Faster Engagement, and Ensures Success</span> with HireBeen</p>

		<div class="d-flex justify-content-between align-items-start flex-lg-row flex-column multisection mb-3">
			<span class="diff_font">AI Job Description Generator</span>
			<span class="diff_font">AI Prescreening</span>
			<span class="diff_font">Get Applications In Your Inbox</span>
			<span class="diff_font">Schedule Interview</span>
			<span class="diff_font">Close top applicants</span>
		</div>

		<div class="multisectionAns">
			<div class="row green_border py-lg-5 py-3 px-lg-5 px-1" style="display: none;">
				<div class="col-lg-5 col-12">
					<span class="multiTitle text_g weight_600 diff_font"style="font-weight: 700">AI Job Description Generator</span>
					<div><img src="image/orange_vertical.svg"></div>
				<!--	<p class="longtext diff_font weight_400">A well-crafted job description is crucial for attracting the right candidates, but writing one can be time-consuming—even for seasoned professionals. Our free AI tool generates high-quality job descriptions for any role in seconds. You can easily edit and copy the results. Save time and effort by using our AI Job Description Generator to create professional, comprehensive job postings that stand out in today’s competitive job market.</p>-->
				<p class="longtext diff_font weight_400">Post a job with our AI job creation tool to generate Job description and relevant required skills for the roles</p>
					<a href="employers-register"><div class="text-lg-left text-center"><button class="start_hiring_g">Start Hiring</button></div></a>
				</div>
				<div class="col-lg-7 col-12">
					<div><img src="image/multi_1.svg" style="width: 100%;"></div>
				</div>
			</div>

			<div class="row green_border py-lg-5 py-3 px-lg-5 px-1" style="display: none;">
				<div class="col-lg-5 col-12">
					<span class="multiTitle text_g weight_600 diff_font" style="font-weight: 700">AI Prescreening</span>
					<div><img src="image/orange_vertical.svg"></div>
					<p class="longtext diff_font weight_400">HireBeen uses data and AI prescreening to target 90% or above matched candidates, significantly reducing the time and effort required to find the best candidates.</p>
					<a href="employers-register"><div class="text-lg-left text-center"><button class="start_hiring_g">Start Hiring</button></div></a>
				</div>
				<div class="col-lg-7 col-12">
					<div><img src="image/multi_2.svg" style="width: 100%;"></div>
				</div>
			</div>

			<div class="row green_border py-lg-5 py-3 px-lg-5 px-1" style="display: none;">
				<div class="col-lg-5 col-12">
					<span class="multiTitle text_g weight_600 diff_font" style="font-weight: 700">Get Applications In Your Inbox</span>
					<div><img src="image/orange_vertical.svg"></div>
					 <p class="longtext diff_font weight_400">Candidates apply with their current and updated resume every time on the job links received via emails and WhatsApp.</p>
					<a href="employers-register"><div class="text-lg-left text-center"><button class="start_hiring_g">Start Hiring</button></div></a>
				</div>
				<div class="col-lg-7 col-12">
					<div><img src="image/multi_3.svg" style="width: 100%;"></div>
				</div>
			</div>

			<div class="row green_border py-lg-5 py-3 px-lg-5 px-1" style="display: none;">
				<div class="col-lg-5 col-12">
					<span class="multiTitle text_g weight_600 diff_font" style="font-weight: 700">Schedule Interview</span>
					<div><img src="image/orange_vertical.svg"></div>
					<p class="longtext diff_font weight_400">Reach out to candidates with HireBeen Chat/Email feature to schedule your interview.</p>
					<a href="employers-register"><div class="text-lg-left text-center"><button class="start_hiring_g">Start Hiring</button></div></a>
				</div>
				<div class="col-lg-7 col-12">
					<div><img src="image/multi_4.svg" style="width: 100%;"></div>
				</div>
			</div>

			<div class="row green_border py-lg-5 py-3 px-lg-5 px-1" style="display: none;">
				<div class="col-lg-5 col-12">
					<span class="multiTitle text_g weight_600 diff_font" style="font-weight: 700">Close top applicants</span>
					<div><img src="image/orange_vertical.svg"></div>
					<span class="longtext diff_font weight_400" style="border-bottom:1px solid #343636">Close with applicants having 90% or above AI match with your job requirements.</span>
					<a href="employers-register"><div class="text-lg-left text-center mt-2"><button class="start_hiring_g">Start Hiring</button></div></a>
				</div>
				<div class="col-lg-7 col-12">
					<div><img src="image/multi_5.svg" style="width: 100%;"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="my-5 header_row1 mx-auto sixth_section gray_border">
        <div class="row mx-0">
                <div class="col-lg-6 col-12 p-0">
                        <div style="background-color:#E5F6F6;margin: 3px;" class="d-flex align-items-center flex-lg-row flex-column">
                                <div class="p-3">
                                        <p class="sixth_text diff_font weight_500" style="font-weight: 700">Multiply output before adding headcount</p>
                                        <p class="longtext weight_500 diff_font mb-0">Use AI to multiply your team productivity before making <br> additional hires</p>
					<a href="employers-register"><div class="text-lg-right text-center"><button class="start_hiring_g">Start Hiring</button></div></a>
                                </div>
                                <div class="d-lg-flex d-none"><img src="image/orange_straight.svg"></div>
                                <div class="d-lg-none d-flex"><img src="image/orange_vertical.svg"></div>
                        </div>
                </div>
                <div class="col-lg-6 col-12 mt-lg-0 mt-5 d-flex justify-content-around flex-lg-row flex-column align-items-center">
                        <div>
                                <p class="diff_font text-center text_g font_48 weight_600 mb-0" id="percentage"  style="font-weight: 700">0%</p>
                                <p class="weight_500 diff_font text-center" style="font-weight: 700">Time Saved For Recruiter</p>
                        </div>
                        <div>
                                <div class="rotate"><img src="image/graystraight.svg"></div>
                        </div>
                        <div>
                                <p class="diff_font text-center text_g font_48 weight_600 mb-0"  style="font-weight: 700">95%</p>
                                <p class="weight_500 diff_font text-center"  style="font-weight: 700">Reduced Hiring Costs</p>
                        </div>
                        <div>
                                <div class="rotate"><img src="image/graystraight.svg"></div>
                        </div>
                        <div>
                                <p class="diff_font text-center text_g font_48 weight_600 mb-0" style="font-weight: 700">10X</p>
                                <p class="weight_500 diff_font text-center" style="font-weight: 700">Faster Job Posting</p>
                        </div>
                </div>
        </div>
</section>
<section>
</div>
</section>
<section class="my-5 fifth_section">
	<div class="row mx-0 justify-content-between gray_border bggreen" style="position: sticky;top: 90px;">
		<div class="col-lg-1 col-12 text-lg-right text-left px-lg-0 px-2"><img src="image/icon-job.svg" style="width: 60px;" class="ml-lg-3 ml-1 mt-lg-5 mt-3"></div>
		<div class="col-lg-5 col-12 d-lg-flex d-block">
			<div class="mx-lg-5 mx-0 my-lg-5 my-2">
				<span class="multiTitle text-white weight_600 diff_font" style="font-weight: 700">Post a job in minutes on HireBeen</span>
				<div><img src="image/orange_vertical.svg"></div>
				<p class="longtext diff_font weight_400 text-white">Experience the ease of creating a customized job description with our AI Job Description generator – designed to suite your role and company in seconds.</p>
                <p class="longtext diff_font weight_400 text-white">Save time and effort by using our Job Description Generator to create professional and comprehensive job postings that stand out in today’s competitive job market.</p>

				<a href="employers-register"><div class="text-lg-left text-center"><button class="request_demo">Start Hiring</button></div></a>
			</div>
		</div>
		<div class="col-lg-6 col-12 d-flex justify-content-end align-items-center">
			<div style="width: 100%;"><img src="image/overflow_div1p.png" style="width: 100%;"></div>
		</div>
	</div>
	<div class="row mx-0 justify-content-between gray_border" style="position: sticky;top: 90px;background: white;">
		<div class="col-lg-1 col-12 text-lg-right text-left px-lg-0 px-2"><img src="image/icon-link.svg" style="width: 60px;" class="ml-lg-3 ml-1 mt-lg-5 mt-3"></div>
		<div class="col-lg-5 col-12 d-lg-flex d-block">
			<div class="mx-lg-5 mx-0 my-lg-5 my-2">
				<span class="multiTitle text_g weight_600 diff_font" style="font-weight: 700">Get applications from pre-screened candidates within 48 hours</span>
				<div><img src="image/orange_vertical.svg"></div>
				<p class="longtext diff_font weight_400">Hirebeen shares the job link with only <span class="weight_600" >90 percent plus matched</span> candidates and makes sure that <span class="weight_600">within 24-48 hours top 10-15 most relevant candidate</span> apply,hereby helping you close your position in 70% less time and 95% less cost.</p>
				<a href="employers-register"><div class="text-lg-left text-center"><button class="request_demo">Start Hiring</button></div></a>
			</div>
		</div>
		<div class="col-lg-6 col-12 d-flex justify-content-end align-items-center">
			<div style="width: 100%;"><img src="image/overflow_div2p.png" style="width: 100%;"></div>
		</div>
	</div>
	<div class="row mx-0 justify-content-between gray_border bggreen" style="position: sticky;top: 90px;">
		<div class="col-lg-1 col-12 text-lg-right text-left px-lg-0 px-2"><img src="image/icon-apply.svg" style="width: 60px;" class="ml-lg-3 ml-1 mt-lg-5 mt-3"></div>
		<div class="col-lg-5 col-12 d-lg-flex d-block">
			<div class="mx-lg-5 mx-0 my-lg-5 my-2">
				<span class="multiTitle text-white weight_600 diff_font" style="font-weight: 700">Schedule Interviews of the candidates and start closing positions</span>
				<div><img src="image/orange_vertical.svg"></div>
				<p class="longtext diff_font text-white weight_400">Connect, review, email, and chat with shortlisted candidates to schedule your interviews.</p>
				<a href="employers-register"><div class="text-lg-left text-center"><button class="request_demo">Start Hiring</button></div></a>
			</div>
		</div>
		<div class="col-lg-6 col-12 d-flex justify-content-end align-items-center">
			<div style="width: 100%;"><img src="image/overflow_div3p.png" style="width: 100%;"></div>
		</div>
	</div>
	<div class="row mx-0 justify-content-between gray_border" style="position: sticky;top: 90px;background: white;display: none;">
		<div class="col-lg-1 col-12 text-lg-right text-left px-lg-0 px-2"><img src="image/icon-date.svg" style="width: 60px;" class="ml-lg-3 ml-1 mt-lg-5 mt-3"></div>
		<div class="col-lg-5 col-12 d-lg-flex d-block">
			<div class="mx-lg-5 mx-0 my-lg-5 my-2">
				<span class="multiTitle text_g weight_600 diff_font">Get started easily with your new AI recruiting assistant HireBeen</span>
				<div><img src="image/orange_vertical.svg"></div>
				<p class="longtext diff_font weight_400">Automate repetitive tasks with HireBeen, saving valuable time for both applicants and recruiters. Many of our customers saw a reduction in time-to-hire by up to 75% and others saved upto 1500 minutes weekly on scheduling and preliminary phone interviews. Transform your hiring process with efficient automation, and focus more time building relations with top talent.</p>
				<a href="employers-register"><div class="text-lg-left text-center"><button class="request_demo">Start Hiring</button></div></a>
			</div>
		</div>
		<div class="col-lg-6 col-12 d-flex justify-content-end align-items-center">
			<div style="width: 100%;"><img src="image/overflow_div4p.png" style="width: 100%;"></div>
		</div>
	</div>
</section>

<section class="gray_back">
	<div class="mt-5 header_row1 mx-auto px-lg-5 px-0 pb-0 d-flex flex-lg-row flex-column justify-content-center seventh_section">
		<div><img src="image/four_big_dots.svg"></div>
		<div class="ml-lg-5 ml-0">
			<p class="font_48 weight_500 mb-4 diff_font text-white" style="line-height: 50px;"  style="font-weight: 700">Interested in hiring <br class="d-lg-flex d-none"> <u class="weight_700 diff_font text_g" style="font-weight: 700">10X</u> more quickly?</p>
			<div class="d-flex" style="gap: 10px;">
				<a href="book-demo"><button class="start_hiring">Request a demo</button></a>
				<a href="employers-register"><button class="start_hiring1">Sign-up</button></a>
			</div>
		</div>
		<div style="margin-top: 60px;"><img src="image/robotman.svg"></div>
	</div>
</section>
<?php echo $footer; ?>
<script>
	AOS.init({
		once:true,
		duration: 1000
	});

	$(document).ready(function() {
	    var spans = $(".multisection > span");
	    var divs = $(".multisectionAns > div");
	    var currentIndex = 0;
	    var timeout;

	    function activateNextSpan() {
	        spans.removeClass('active');
	        divs.hide();
	        if (currentIndex >= spans.length) {
	            currentIndex = 0;
	        }
	        spans.eq(currentIndex).addClass('active');
	        divs.eq(currentIndex).fadeIn(1500);
	        currentIndex++;
	        timeout = setTimeout(activateNextSpan, 7000);
	    }

	    spans.click(function() {
	        clearTimeout(timeout); // Stop the automatic cycling
	        currentIndex = $(this).index(); // Get the index of the clicked span
	        activateNextSpan(); // Show the corresponding div
	    });

	    activateNextSpan(); // Start the automatic cycling initially
	});

	$(document).ready(function() {
	    var text = "10X Faster, Smarter & Reliable";
	    var words = text.split(" ");
	    var i = 0;

	    // Function to wrap the special characters with a span that has a specific class
	    function styleSpecialChars(word) {
	        word = word.replace(",", '<span class="special-char">,</span>');
	        word = word.replace("&", '<span class="special-char">&</span>');
	        return word;
	    }

	    function typeWriter() {
	        if (i < words.length) {
	            // Apply the special character styling to each word
	            var styledWord = styleSpecialChars(words[i]);

	            $('<span>' + styledWord + ' </span>')
	                .hide()
	                .appendTo('#typingText')
	                .fadeIn(500); // Smoothly fade in each word over 0.5 seconds
	            i++;
	            setTimeout(typeWriter, 500); // Adjust the speed here (in milliseconds)
	        } else {
	            setTimeout(function() {
	                $('#typingText').css('opacity', '0'); // Fade out
	                setTimeout(function() {
	                    $('#typingText').empty(); // Clear the text
	                    i = 0; // Reset the word counter
	                    $('#typingText').css('opacity', '1'); // Fade in
	                    setTimeout(typeWriter, 1000); // Start typing again after 1 second
	                }, 1000); // 1-second delay before clearing and restarting
	            }, 1000); // 1-second delay after fully typing
	        }
	    }

	    typeWriter();
	});

	const percentageElement = document.getElementById('percentage');
    $(document).ready(function() {
        let hasScrolledToPercentage = false;
        let currentPercentage = 0;

        function incrementPercentage() {
            if (currentPercentage <= 70) {
                $('#percentage').text(`${currentPercentage}%`);
                currentPercentage += 10;
                setTimeout(incrementPercentage, 500);
            }
        }

        $(window).scroll(function() {
            const percentageTop = $('#percentage').offset().top;
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();

            if (!hasScrolledToPercentage && scrollTop + windowHeight >= percentageTop) {
                hasScrolledToPercentage = true;
                incrementPercentage();
            }
        });
    });

    $('.get_ready_button').on('click', function(){
    	var started_email = $('#get_started').val();
    	var url = 'employers-register';
    	if(started_email){
    		url += '&started_email='+started_email;
    	}
    	location = url;
    })

</script>
