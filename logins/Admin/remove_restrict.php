<?php
session_start();
include('../../connection/admin_dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/a31.png" sizes="16x16 32x32 64x64">
    <title>Restrict/Unrestrict/Delete User</title>
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

        input {
            width: 400px;
            text-align: center;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .buttons button {
            margin: 5px;
            padding: 5px 20px;
            border: 2px solid #212529;
            /* Dark border */
            background-color: #fff;
            /* White background */
            color: #212529;
            /* Dark text color */
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            font-size: 16px;
            font-weight: bold;
        }

        .buttons button:hover {
            background-color: #212529;
            color: #fff;
        }

        .alert.alert-success {
            background-color: #212529;
            color: #fff;
            border-color: #007bff;
            border-radius: 0.25rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert h5 {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['status'])) {
    ?>
        <div class="container">
            <div class="alert alert-success">
                <h5><?= $_SESSION['status']; ?></h5>
            </div>
        </div>
    <?php
        unset($_SESSION['status']);
    }
    ?>
    <form action="remove_restrict_code.php" method="post">
        <div class="container">
            <div class="card">
                <div class="header">
                    <h1>Restrict/Unrestrict/Delete User</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Enter Roll No/Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" id="datas" name="datas" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="buttons">
                        <button type="submit" name="restrict-button" >Restrict</button>
                        <button type="submit" name="unrestrict-button" >Unrestrict</button>
                        <button type="submit" name="remove-button" >Delete</button>
                    </div>

                </div>
            </div>
        </div>

    </form>
</body>

</html>
