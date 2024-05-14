<?php
include('../../connection/dbcon.php');

$con = new mysqli($host, $username, $password, $database, $port);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $name = $_POST['quizName']; 
    $link = $_POST['quizLink']; 
    $descr = $_POST['description']; 

    $stmt = $con->prepare("INSERT INTO Quizzes (name, descr, q_link) VALUES (?, ?, ?)"); 
    $stmt->bind_param("sss", $name, $descr, $link);

    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully');</script>"; 
    } else {
        echo "Error: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>
