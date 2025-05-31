<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CMail
{
    public static function send($config)
    {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 0; // Disable verbose debug output
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = config('services.mail.host'); // SMTP server
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = config('services.mail.username'); // SMTP username
            $mail->Password = config('services.mail.password'); // SMTP password
            $mail->SMTPSecure = config('services.mail.encryption'); // Enable TLS encryption
            $mail->Port = config('services.mail.port'); // TCP port

            // Recipients
            $fromAddress = isset($config['from_address']) ? $config['from_address'] : config('services.mail.from_address', 'no-reply@yourcompany.com');
            $fromName = isset($config['from_name']) ? $config['from_name'] : config('services.mail.from_name', 'Your Company');
            $mail->setFrom($fromAddress, $fromName); // Set sender

            $recipientName = isset($config['recipient_name']) ? $config['recipient_name'] : ''; // Use empty string instead of null
            $mail->addAddress($config['recipient_address'], $recipientName); // Fixed: Use array syntax for recipient_address

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = isset($config['subject']) ? $config['subject'] : 'Reset Password';
            $mail->Body = isset($config['body']) ? $config['body'] : ''; // Fixed: Correct variable name from $confi to $config

            if (!$mail->send()) {
                Log::error('PHPMailer failed to send email: ' . $mail->ErrorInfo);
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::error('PHPMailer exception: ' . $e->getMessage());
            return false;
        }
    }
}