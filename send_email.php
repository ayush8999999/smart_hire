<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// =============================================
// Basic required fields
// =============================================
$required = ['full_name', 'email', 'job_title'];

$data = [];
foreach ($required as $field) {
    $data[$field] = isset($_POST[$field]) ? trim(strip_tags($_POST[$field])) : '';
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => "Missing required field: $field"
        ]);
        exit;
    }
}

$applicant_name = $data['full_name'];
$applicant_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$job_title = $data['job_title'];

if (!$applicant_email) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid email address'
    ]);
    exit;
}

// =============================================
// PHPMailer Configuration
// =============================================
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'xbnrxoohgqqrmlrskt@gmail.com'; 
    $mail->Password   = 'wjyknpvgigbkzpfw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender & Recipient
    $mail->setFrom('growwithuseasyhire@gmail.com', 'EasyHire');
    $mail->addAddress($applicant_email, $applicant_name);
    $mail->addReplyTo('growwithuseasyhire@gmail.com', 'EasyHire Support');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Application Received - ' . $job_title;

    // Updated HTML email body with new contact email
    $mail->Body = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Application Confirmation</title>
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif; line-height:1.6; color:#333; max-width:600px; margin:0 auto; padding:20px;">
        <h2 style="color:#f57f17;">Thank You for Applying!</h2>
        
        <p>Dear <strong>' . htmlspecialchars($applicant_name) . '</strong>,</p>
        
        <p>We have successfully received your application for the position of  
        <strong>' . htmlspecialchars($job_title) . '</strong>.</p>
        
        <p>Our recruitment team will review your profile and get back to you as soon as possible.</p>
        
        <p style="margin-top:30px;">
            Any questions? Feel free to reply to this email or contact us at:<br>
            <a href="mailto:growwithuseasyhire@gmail.com" style="color:#f9a825; font-weight:bold;">
                growwithuseasyhire@gmail.com
            </a>
        </p>
        
        <p>Best regards,<br>
        <strong>EasyHire Team</strong></p>

        <hr style="border:0; border-top:1px solid #eee; margin:30px 0;">
        <p style="font-size:12px; color:#777;">
            This is an automated confirmation email. Please do not reply directly unless you have questions.
        </p>
    </body>
    </html>';

    // Plain text version
    $mail->AltBody = "Dear $applicant_name,\n\nThank you for applying for $job_title.\nYour application has been received.\nWe will get back to you soon.\n\nFor any questions contact us at: growwithuseasyhire@gmail.com\n\nBest regards,\nEasyHire Team";

    $mail->send();

    echo json_encode([
        'success' => true,
        'message' => 'Application submitted successfully! Check your email.'
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Email could not be sent.',
        'error'   => $mail->ErrorInfo
    ]);
}