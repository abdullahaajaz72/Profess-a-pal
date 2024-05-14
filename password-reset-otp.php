<?php
session_start();
include('../connection/dbcon.php');

if (isset($_SESSION['mama_data'])) {

    $otp = "";
    $mamaData = $_SESSION['mama_data'];

    // Concatenate each OTP input value
    for ($i = 1; $i <= 6; $i++) {
        // Check if the input value is set and not empty
        if (isset($mamaData["otp-input$i"]) && $mamaData["otp-input$i"] !== "") {
            // Append the input value to the OTP string
            $otp .= $mamaData["otp-input$i"];
        } else {
            echo "error occured !$i";
            exit(); // Terminate script execution
        }
    }
    $token = $otp;
    $verify_query = "SELECT verify_token,verify_status  FROM email_data WHERE verify_token='$token' LIMIT 1"; //change
    $verify_query_run = mysqli_query($con, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) {
        header("Location: password-change.php");
        exit;
    }
    else{
        
        $_SESSION['status'] = "This OTP does not Exists"; //change
        header("Location: otp.php");
    }
}
