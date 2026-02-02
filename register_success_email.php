<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'email/Exception.php';
require 'email/PHPMailer.php';
require 'email/SMTP.php';

function sendWelcomeMail($name, $email) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'xbnrxoohgqqrmlrskt@gmail.com';
        $mail->Password   = 'wjyknpvgigbkzpfw';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('growwithuseasyhire@gmail.com', 'EasyHire');
        $mail->addAddress($email, $name);
        $mail->addReplyTo('growwithuseasyhire@gmail.com', 'EasyHire Support');

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to EasyHire';

        $mail->Body = "
        <html>
        <body style='margin:0; padding:0; background:#f4f6f8; font-family:Arial;'>
        <table width='100%' cellpadding='0' cellspacing='0'>
            <tr>
                <td align='center'>
                    <table width='600' style='background:#fff;border-radius:8px;overflow:hidden'>
                        <tr>
                            <td style='background:#f57f17;padding:20px;text-align:center;color:#fff'>
                                <h2>Welcome to EasyHire</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:30px;color:#333'>
                                <p>Hi <b>{$name}</b>,</p>
                                <p>Your account has been created successfully 🎉</p>
                                <p>You can now log in and start applying for jobs.</p>

                                <p style='margin-top:25px'>
                                    <a href='https://easyhireconsultancy.com/sign-in.php'
                                       style='background:#f57f17;color:#fff;
                                       padding:10px 18px;border-radius:6px;
                                       text-decoration:none;'>
                                       Login Now
                                    </a>
                                </p>

                                <p style='margin-top:30px'>
                                    Thanks,<br>
                                    <b>EasyHire Team</b>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style='background:#f9fafb;padding:12px;text-align:center;font-size:12px;color:#777'>
                                © ".date("Y")." EasyHire. All rights reserved.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        </body>
        </html>";

        $mail->AltBody = "Hi $name,\n\nWelcome to EasyHire! Your account is ready.\n\nLogin and start applying.\n\nEasyHire Team";

        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}
