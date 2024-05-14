<?php
include('../../connection/dbcon.php');

$con = new mysqli($host, $username, $password, $database, $port);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollNumber = mysqli_real_escape_string($con, $_POST['Roll_Number']);
    $internal1Marks = mysqli_real_escape_string($con, $_POST['Internal_1_Marks']);
    $internal2Marks = mysqli_real_escape_string($con, $_POST['Internal_2_Marks']);
    $assignment1Marks = mysqli_real_escape_string($con, $_POST['Assignment_1_Marks']);
    $assignment2Marks = mysqli_real_escape_string($con, $_POST['Assignment_2_Marks']);

    $existingRecord = $con->query("SELECT * FROM dtls WHERE Roll_Number = '$rollNumber'");

    if ($existingRecord->num_rows > 0) {
        $sql = "UPDATE dtls SET Internal_1 = '$internal1Marks', Internal_2 = '$internal2Marks', Assignment_1 = '$assignment1Marks', Assignment_2 = '$assignment2Marks' WHERE Roll_Number = '$rollNumber'";
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Entry is successfully updated!');</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
    } else {
        $sql = "INSERT INTO dtls (Roll_Number, Internal_1, Internal_2, Assignment_1, Assignment_2) VALUES ('$rollNumber', '$internal1Marks', '$internal2Marks', '$assignment1Marks', '$assignment2Marks')";
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
        } else {
            echo "Error: " . $con->error;
        }
    }
}

$con->close();
?>
