<?php
session_start();
include('../../connection/admin_dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add-button-2'])) {
        $file = $_POST['file-name'];
        $directory = '../../upload/';
        $filename = $directory . $file;
        $file = fopen($filename, 'r');
        if (!$file) {
            die("Error opening file.");
        }

        $rowCount = 0;
        $counter = 0;
        while (($data = fgetcsv($file)) !== false) {
            $rowCount++;
        }
        rewind($file);
        while (($data = fgetcsv($file)) !== false) {

            if ($counter == 0) {
                $counter++;
                continue;
            }

            $col1 = $adcon->real_escape_string($data[0]);

            $verify_query = "SELECT * FROM staff_emails WHERE emails = '$col1' UNION SELECT * FROM rollnos WHERE roll_nos = '$col1'";
            $verify_query_run = mysqli_query($adcon, $verify_query);

            if (mysqli_num_rows($verify_query_run) > 0) {
                $counter++;
                continue;
            } else {
                if (filter_var($col1, FILTER_VALIDATE_EMAIL)) {
                    $update_query = "INSERT INTO staff_emails (emails) VALUES ('$col1');";
                } else {
                    $update_query = "INSERT INTO rollnos (roll_nos) VALUES ('$col1');";
                }
                if (mysqli_query($adcon, $update_query)) {
                    $counter++;
                }
            }
        }
        if ($rowCount == $counter) {
            $_SESSION['status2'] = "'" . $_POST['file-name'] . "' has been Added";
        } else {
            $_SESSION['status2'] = "Insertion Failed!";
        }
        unlink($filename);
        header("Location: add-students-rollnos.php");
        exit(0);

        fclose($file);
    }
}
