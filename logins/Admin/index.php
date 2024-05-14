<?php
session_start();

// $sql = "CREATE DATABASE kallu";
// if (mysqli_query($adcon, $sql)) {
//     echo "Database 'kallu' created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($adcon);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../../images/a31.png" sizes="16x16 32x32 64x64">

    <title>Admin</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f6f6f6;
        }

        .container {
            display: flex;
            background-color: #f6f6f6;
            border-radius: 8px;
            overflow: hidden;
            height: 100vh;
            justify-content: center;
            align-items: center;

        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            color: rgb(0, 0, 0);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 10px;
            height: 95vh;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            margin-bottom:40px;
            font-size: 40px;
            color: black;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
            padding-bottom:20px ;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: black;
            font-size: 20px;
            
            transition: color 0.3s;
        }

        .sidebar ul li a:hover {
            color: rgb(0, 0, 128);
            text-decoration: underline;
        }

        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            height: 95vh;
        }

        .content h1 {
            color: black;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .content p {
            color: black;
            font-size: 16px;
            line-height: 1.6;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="staff_emails.php">View Staff Emails</a></li>
                <li><a href="students-rollnos.php">View Roll no's</a></li>
                <li><a href="add-students-rollnos.php">Add Emails and Roll no's</a></li>
                <li><a href="restricted-rollnos-emails.php">Restricted Users</a></li>
                <li><a href="remove_restrict.php">Restrict/Unrestrict/Delete Users</a></li>
            </ul>
        </div>
        <div class="content">

        </div>
    </div>
</body>
</html>