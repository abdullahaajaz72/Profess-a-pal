<?php
session_start();
include('../../connection/admin_dbcon.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['datas'])) {
        $inputValue = $_POST['datas'];
    }
    if (isset($_POST['add-button'])) {

        $verify_query = "SELECT * FROM staff_emails WHERE emails = '$inputValue' UNION SELECT * FROM rollnos WHERE roll_nos = '$inputValue'";
        $verify_query_run = mysqli_query($adcon, $verify_query);

        if (mysqli_num_rows($verify_query_run) > 0) {
            $_SESSION['status'] = "$inputValue Already Exist's";
        } else {
            if (filter_var($inputValue, FILTER_VALIDATE_EMAIL)) {
                $update_query = "INSERT INTO staff_emails (emails) VALUES ('$inputValue');";
            } else {
                $update_query = "INSERT INTO rollnos (roll_nos) VALUES ('$inputValue');";
            }
            if (isset($update_query)) {
                if (mysqli_query($adcon, $update_query)) {
                    $_SESSION['status'] = "$inputValue has been Added";
                } else {
                    $_SESSION['status'] = "Insertion Failed!";
                }
            }
        }
        header("Location: add-students-rollnos.php");
        exit(0);
    }
}