<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'email/Exception.php';
require 'email/PHPMailer.php';
require 'email/SMTP.php';

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
        <title>Application Received</title>
    </head>
    <body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">
        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:20px 0;">
            <tr>
                <td align="center">
                    <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                        
                        <!-- Header -->
                        <tr>
                            <td style="background:#f57f17; padding:20px; text-align:center;">
                                <h1 style="margin:0; color:#ffffff; font-size:24px;">
                                    EasyHire
                                </h1>
                                <p style="margin:5px 0 0; color:#ffe0b2; font-size:14px;">
                                    Application Confirmation
                                </p>
                            </td>
                        </tr>

                        <!-- Body -->
                        <tr>
                            <td style="padding:30px;">
                                <h2 style="color:#333333; margin-top:0;">
                                    Thank You for Applying! 🎉
                                </h2>

                                <p style="font-size:15px; color:#555555;">
                                    Dear <strong>' . htmlspecialchars($applicant_name) . '</strong>,
                                </p>

                                <p style="font-size:15px; color:#555555;">
                                    We are pleased to inform you that we have successfully received your application for the position of:
                                </p>

                                <div style="background:#fff8e1; border-left:4px solid #f57f17; padding:15px; margin:20px 0;">
                                    <strong style="color:#f57f17; font-size:16px;">
                                        ' . htmlspecialchars($job_title) . '
                                    </strong>
                                </div>

                                <p style="font-size:15px; color:#555555;">
                                    Our recruitment team is currently reviewing your profile. If your qualifications match our requirements, we will get in touch with you shortly.
                                </p>

                                <p style="font-size:15px; color:#555555; margin-top:25px;">
                                    If you have any questions, feel free to reach out to us at:
                                </p>

                                <p>
                                    <a href="mailto:growwithuseasyhire@gmail.com" 
                                    style="color:#f57f17; font-weight:bold; text-decoration:none;">
                                        growwithuseasyhire@gmail.com
                                    </a>
                                </p>

                                <p style="font-size:15px; color:#555555; margin-top:30px;">
                                    Best regards,<br>
                                    <strong>EasyHire Team</strong>
                                </p>
                            </td>
                        </tr>

                        <!-- Footer -->
                        <tr>
                            <td style="background:#f9fafb; padding:15px; text-align:center; font-size:12px; color:#777777;">
                                This is an automated email. Please do not reply unless you have a query.<br>
                                © ' . date("Y") . ' EasyHire. All rights reserved.
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
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