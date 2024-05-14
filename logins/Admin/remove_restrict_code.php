<?php
session_start();
include('../../connection/admin_dbcon.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['datas'])) {
        $inputValue = $_POST['datas'];
    }
    if (isset($_POST['restrict-button'])) {

        $verify_query = "SELECT restricted AS data FROM staff_emails WHERE emails = '$inputValue' UNION SELECT restricted AS data FROM rollnos WHERE roll_nos = '$inputValue'";
        $verify_query_run = mysqli_query($adcon, $verify_query);

        if (mysqli_num_rows($verify_query_run) > 0) {
            $row = mysqli_fetch_array($verify_query_run);

            if ($row['data'] == "0") {

                $check_staff_query = "SELECT * FROM staff_emails WHERE emails = '$inputValue'";
                $check_staff_result = mysqli_query($adcon, $check_staff_query);

                if (mysqli_num_rows($check_staff_result) > 0) {
                    $update_query = "UPDATE staff_emails SET restricted = 1 WHERE emails = '$inputValue'";
                } else {
                    $update_query = "UPDATE rollnos SET restricted = 1 WHERE roll_nos = '$inputValue'";
                }

                if (isset($update_query)) {
                    if (mysqli_query($adcon, $update_query)) {
                        $_SESSION['status'] = "$inputValue has been Restricted";
                    } else {
                        $_SESSION['status'] = "Restriction Failed!";
                    }
                }
            } else {
                $_SESSION['status'] = "$inputValue is Already Restricted";
            }
        } else {
            $_SESSION['status'] = "$inputValue Not Found";
        }
        header("Location: remove_restrict.php");
        exit(0);
    }
    if (isset($_POST['unrestrict-button'])) {


        $verify_query = "SELECT restricted AS data FROM staff_emails WHERE emails = '$inputValue' UNION SELECT restricted AS data FROM rollnos WHERE roll_nos = '$inputValue'";
        $verify_query_run = mysqli_query($adcon, $verify_query);

        if (mysqli_num_rows($verify_query_run) > 0) {
            $row = mysqli_fetch_array($verify_query_run);

            if ($row['data'] == "1") {

                $check_staff_query = "SELECT * FROM staff_emails WHERE emails = '$inputValue'";
                $check_staff_result = mysqli_query($adcon, $check_staff_query);

                if (mysqli_num_rows($check_staff_result) > 0) {
                    $update_query = "UPDATE staff_emails SET restricted = 0 WHERE emails = '$inputValue'";
                } else {
                    $update_query = "UPDATE rollnos SET restricted = 0 WHERE roll_nos = '$inputValue'";
                }

                if (isset($update_query)) {
                    if (mysqli_query($adcon, $update_query)) {
                        $_SESSION['status'] = "$inputValue has been Unrestricted";
                    } else {
                        $_SESSION['status'] = "Unestriction Failed!";
                    }
                }
            } else {
                $_SESSION['status'] = "$inputValue is Not Restricted";
            }
        } else {
            $_SESSION['status'] = "$inputValue Not Found";
        }
        header("Location: remove_restrict.php");
        exit(0);
    }
    if (isset($_POST['remove-button'])) {

        $verify_query = "SELECT * FROM staff_emails WHERE emails = '$inputValue' UNION SELECT * FROM rollnos WHERE roll_nos = '$inputValue'";
        $verify_query_run = mysqli_query($adcon, $verify_query);

        if (mysqli_num_rows($verify_query_run) > 0) {

            $check_staff_query = "SELECT * FROM staff_emails WHERE emails = '$inputValue'";
            $check_staff_result = mysqli_query($adcon, $check_staff_query);

            if (mysqli_num_rows($check_staff_result) > 0) {
                $update_query = "DELETE FROM staff_emails WHERE emails = '$inputValue'";
            } else {
                $update_query = "DELETE FROM rollnos WHERE roll_nos = '$inputValue'";
            }

            if (isset($update_query)) {
                if (mysqli_query($adcon, $update_query)) {
                    $_SESSION['status'] = "$inputValue has been Deleted";
                } else {
                    $_SESSION['status'] = "Deletion Failed!";
                }
            }
        } else {
            $_SESSION['status'] = "$inputValue Not Found";
        }
        header("Location: remove_restrict.php");
        exit(0);
    }
}
