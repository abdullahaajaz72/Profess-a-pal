<?php
session_start();
include('../connection/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if (isset($_POST['login_now_btn'])) {

    if (!empty(trim($_POST['email_id']))  && !empty(trim($_POST['password']))) {

        $email = mysqli_real_escape_string($con, $_POST['email_id']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        if ($email == "Admin" && $password = "admin@123") {             //login details

            header("Location: ../logins/Admin/index.php");
            exit(0);

        } else {
            $login_query = "SELECT * FROM email_data WHERE email='$email' AND password='$password' LIMIT 1";
            $login_query_run = mysqli_query($con, $login_query);

            if (mysqli_num_rows($login_query_run) > 0) {

                $row = mysqli_fetch_array($login_query_run);
                // echo $row['verify_status'];
                if ($row['verify_status'] == "1") {
                    header("Location: ../logins/Faculty/index.html");
                    exit(0);
                } else {

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
                    ";

                        $mail->Body    = $email_template;
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        $mail->send();
                        // echo 'Message has been sent'; 
                    }


                    sendemail_verify($email, $row['verify_token']);
                    $_SESSION['status'] = "Verify your Email";
                    $_SESSION['re-email'] = $email;
                    $_SESSION['re-token'] = $row['verify_token'];

                    header("Location: otp.php");
                    exit(0);
                }
            } else {

                $_SESSION['status'] = "Invalid Email or Password";
                header("Location: login.php");
                exit(0);
            }
        }
    } else {

        $_SESSION['status'] = "All fields are Mandatory";
        header("Location: login.php");
        exit(0);
    }
}
