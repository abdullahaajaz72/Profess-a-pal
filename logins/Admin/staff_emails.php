<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/a31.png" sizes="16x16 32x32 64x64">
    <title>Staff Emails </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #212529;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-radius: 0;
            border-collapse: collapse;
            border: 1px solid #dee2e6;
        }

        table th,
        table td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: center;
        }

        table th {
            background-color: #212529;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
</head>

<?php
include("../../connection/admin_dbcon.php");
$sql = "SHOW TABLES LIKE 'staff_emails'";
$result = mysqli_query($adcon, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
?>


<body>
            <div class="container">
                <div class="card">
                    <div class="header">
                        <h1>Staff Emails </h1>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Emails </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT emails FROM staff_emails WHERE restricted = 0";
                                $result = $adcon->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $emails = $row['emails'];
                                        echo "<tr>";
                                        echo "<td>{$emails}</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<td>No Email's Registred</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>

</html>

<?php  
    } else {
        // echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'><div style='text-align: center; font-size: 28px; font-weight: bold; color: #b30000;'>NOTE: Please Create Default Tables Before accessing this Page</div></div>";
        $sql = "SHOW TABLES LIKE 'staff_emails'";
        $result = mysqli_query($adcon, $sql);
        if (mysqli_num_rows($result) == 0) {
            $sql2 = "CREATE TABLE `staff_emails` (`emails` VARCHAR(100) NOT NULL , `restricted` TINYINT(2) NOT NULL DEFAULT '0' ) ENGINE = InnoDB;";
            $result2 = mysqli_query($adcon, $sql2);
        }
        header("Refresh:0");
    }
} else {
    echo "Error executing query: " . mysqli_error($connection);
}
