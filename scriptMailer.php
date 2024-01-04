<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'configMailer.php';

require 'PHPMailer\src\Exception.php';
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';


/**
 * [The function uses the PHPMailer object to send an email to the address we specify]
 * @param  [string] $email, [Where our email goes]
 * @param  [string] $subject, [The email's subject]
 * @param  [string] $message, [The message]
 * @return [string]          [Error message, or success]
 */



    function sendMail($forgotPassEmail) {
        $mail = new PHPMailer(true);
        $email = $_POST['forgotPassEmail'];
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
        $mail->isSMTP();
    
        $mail->SMTPAuth = true;
        
        $mail->Host = MAILHOST;
    
        $mail->Username = USERNAME;
    
        $mail->Password = PASSWORD;
    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
        $mail->Port =587;
    
        $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
    
        $mail->addAddress($forgotPassEmail);
    
        $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
    
        $mail->IsHTML(true);
    
        $mail->Subject = "RESET PASSWORD FROM NETWORKIT";
    
        $mail->Body = 
                    "<h1>Network IT Support</h1>
                    <br><br>
                    <h2>We have received your request to reset your password.</h2>
                    <p>Please click the link below to reset your password. It will redirect you to a page.</p>
                    <a href='http://localhost/Re-engineering/reset-password.php?email=$email'>Click Here to Reset Password</a>";
    
        
        if(!$mail->send()){
            return "Email not send. Please try again";
         }else{
            return "success";
         }
    
    }


?>