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
        $row = mysqli_fetch_array($verify_query_run);
        // echo $row['verify_token'];

        if ($row['verify_status'] == "0") {

            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE email_data SET verify_status = '1' Where verify_token = '$clicked_token' LIMIT 1"; //change
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run) {
                $_SESSION['status'] = "Your Account has been verified Successfully.!"; //change
                unset($_SESSION['re-email']);
                unset($_SESSION['re-token']);
                header("Location: login.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Verification Failed.!";  //change
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Email Already Verified. Please Login";   //change
            header("Location: login.php");
            exit(0);
        }
    } else {

        $_SESSION['status'] = "This OTP does not Exists"; //change
        header("Location: otp.php");
    }
} else {

    $_SESSION['status'] = "Not Allowed";    //change
    header("Location: login.php");
}
