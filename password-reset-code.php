<?php
session_start();
include('../connection/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token){

    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = 2;                                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication


    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'syedsaleem.s2993@gmail.com';          //change                  SMTP username dummy 
    $mail->Password   = 'ckpoiiwypnpkxdiy';                      //change                SMTP password dummy


    $mail->SMTPSecure = "tls";                               //Enable implicit TLS encryption
    $mail->Port       = 587;

    $mail->setFrom("syedsaleem.s2993@gmail.com","Profess-a-pal");      //change
    $mail->addAddress($get_email);

    $mail->isHTML(true);                                     //Set email format to HTML
    $mail->Subject = 'Reset Password Notification';       //change

    $email_template = " 
        <h3>You are receiving this email because we recieved a password reset request for your account.</h3>
        <br><br>
        <h4> The Verification code is </h4>
        <h2>$token</h2>
    ";

    $mail->Body    = $email_template;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    
}



if (isset($_POST['password_reset_link'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = sprintf('%06d', random_int(0, 999999));

    $check_email = "SELECT * FROM email_data WHERE email='$email' LIMIT 1";   //change
    $check_email_run = mysqli_query($con, $check_email);

    if (mysqli_num_rows($check_email_run)) {

        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE email_data SET verify_token='$token' WHERE email='$get_email'  LIMIT 1";          //change
        $update_token_run = mysqli_query($con, $update_token);

        if ($update_token_run) {

            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "Password reset OTP Send.!";
            $_SESSION['pass_reset']= "Gazal";
            $_SESSION['re-email'] = $email;
            $_SESSION['re-token'] = $token;
            header("Location: otp.php");
            exit(0);
        } else {

            $_SESSION['status'] = "Something went wrong.!";
            header("Location: password-reset.php");
            exit(0);
        }
    } else {

        $_SESSION['status'] = "No Email Found";
        header("Location: password-reset.php");
        exit(0);
    }
}


if(isset($_POST['password_update'])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

                if($new_password == $confirm_password){

                    $new_token = sprintf('%06d', random_int(0, 999999));
                    $update_to_new_token = "UPDATE email_data SET verify_token='$new_token' WHERE email='$email' LIMIT 1";  //change
                    $update_to_new_token_run = mysqli_query($con, $update_to_new_token);

                    if($update_to_new_token_run){

                        $update_password = "UPDATE email_data SET password='$new_password' WHERE email='$email' LIMIT 1";  //change
                        $update_password_run = mysqli_query($con, $update_password);
                        $_SESSION['status'] = "New Passworrd Successfully Updated.!";
                        unset($_SESSION['pass_reset']);
                        header("Location: login.php");
                        exit(0);


                    }
                    else{
                        $_SESSION['status'] = "Did not update Password. Something went wrong";
                        header("Location: login.php");
                        exit(0);
                    }

                }
                else{
                    $_SESSION['status'] = "Password and Confirm Password does not match";
                    header("Location: password-change.php");
                    exit(0);
                }

}
?>