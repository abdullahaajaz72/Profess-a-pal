<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($email, $verify_token)
{

    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = 2;                                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication


    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'syedsaleem.s2993@gmail.com';          //change                  SMTP username dummy 
    $mail->Password   = 'ckpoiiwypnpkxdiy';                      //change                SMTP password dummy


    $mail->SMTPSecure = "tls";                               //Enable implicit TLS encryption
    $mail->Port       = 587;

    $mail->setFrom("syedsaleem.s2993@gmail.com", 'Profess-a-pal');      //change
    $mail->addAddress($email);

    $mail->isHTML(true);                                     //Set email format to HTML
    $mail->Subject = 'Email Verification from Alphas';       //change

    $email_template = " 
        <h2>You have registered with Alphas</h2>
        <h5>Verify your email address </h5>
        <br><br>
        <h4> The Verification code is </h4>
        <h2>$verify_token</h2>
    ";                                                                              //*****change*****

    $mail->Body    = $email_template;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    // echo 'Message has been sent'; 
}
    $email = $_SESSION['re-email'];
    $token = $_SESSION['re-token'];
    sendemail_verify($email,$token);
    header("Location: otp.php");
    exit(0);

