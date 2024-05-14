<?php
include('../../connection/dbcon.php');

$con = new mysqli($host, $username, $password, $database, $port);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT name AS 'Quiz Name', descr AS 'Description', q_link AS 'Quiz Link' FROM Quizzes";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $quizzes = [];
    while($row = $result->fetch_assoc()) {

        $quizLink = '<a href="' . $row['Quiz Link'] . '">' . $row['Quiz Link'] . '</a>';
        $row['Quiz Link'] = $quizLink;
        $quizzes[] = $row;
    }
    echo json_encode($quizzes);
} else {
    echo json_encode([]);
}
$con->close();
?>
