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
    <title>Add Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 7px auto;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding-bottom: 0px;
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

        .line-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
        }

        .line {
            flex-grow: 1;
            height: 1px;
            background-color: #000;
        }

        .or {
            margin: 0 10px;
            font-weight: bold;
        }

        .drop-zone {
            width: 100%;
            height: 150px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        .drop-message {
            font-size: 16px;
            color: #666;
        }

        .drop-zone.hover {
            background-color: #f0f0f0;
        }

        .file-container {
            width: 96%;
        }

        .file-container label {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: 190px;
            border: 2px dashed #ccc;
            align-items: center;
            text-align: center;
            padding: 5px;
            color: #404040;
            cursor: pointer;
        }

        .file-container input[type="file"] {
            display: none;
        }

        .file-info {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
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
    <form action="add-code.php" method="post">
        <div class="container">
            <div class="card">
                <div class="header">
                    <h1>Add Users</h1>
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
                        <button type="submit" name="add-button">ADD</button>
                    </div>

                </div>
            </div>
        </div>

    </form>
    <div class="line-container">
        <div class="line"></div>
        <div class="or">or</div>
        <div class="line"></div>
    </div>
    <?php
    if (isset($_SESSION['status2'])) {
    ?>
        <div class="container">
            <div class="alert alert-success">
                <h5><?= $_SESSION['status2']; ?></h5>
            </div>
        </div>
    <?php
        unset($_SESSION['status2']);
    }
    ?>
    <form action="add-file-code.php" method="post">
        <div class="container">
            <div class="card">
                <div class="header">
                    <h1>Import From CSV File </h1>
                </div>
                <div class="card-body">
                    <table class="table" style="margin-bottom: 0;">
                        <thead>
                            <tr>
                                <th>Enter Roll No/Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="file-container">
                                        <label for="drop-zone" class="labelFile" id="babaji">
                                            <span>
                                                <svg xml:space="preserve" viewBox="0 0 184.69 184.69" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Capa_1" version="1.1" width="100px" height="100px">

                                                </svg>
                                            </span>
                                            <p>Drag and drop your file here or click to select a file!</p>
                                        </label>
                                        <input type="file" id="drop-zone" name="file" accept=".csv">
                                        <p class="file-info" id="file-info">No file selected</p>
                                        <input type="text" name="file-name" id="malamat" style="display: none;" value="init">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="buttons">
                        <button type="submit" name="add-button-2" disabled>ADD</button>
                    </div>

                </div>
            </div>
        </div>

    </form>

</body>
<script>
    // Function to display file names
    function displayFileName(inputId, fileInfoId) {
        var fileInput = inputId;
        var fileInfo = document.getElementById(fileInfoId);


        if (fileInput.files.length > 0) {
            fileInfo.innerText = "File: " + fileInput.files[0].name;
            document.getElementById("malamat").value = fileInput.files[0].name;
            toggleAddButton(false);
        } else {
            fileInfo.innerText = "No file selected";
            toggleAddButton(true);
        }
    }
    // Function to enable/disable the ADD button
    function toggleAddButton(disable) {
        var addButton = document.getElementsByName('add-button-2')[0];
        addButton.disabled = disable;
    }

    const dropZone = document.getElementById('drop-zone');
    const dropZone2 = document.getElementById('babaji');

    ['dragover', 'dragenter'].forEach(eventName => {
        dropZone2.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropZone2.style.backgroundColor = '#f0f0f0';
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone2.addEventListener(eventName, () => {
            dropZone2.style.backgroundColor = '';
        });
    });

    dropZone2.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone2.style.backgroundColor = '';
        const file = e.dataTransfer.files[0];
        displayFileName(e.dataTransfer, 'file-info');
        uploadFile(file);
    });

    dropZone.addEventListener('change', (e) => {
        const file = e.target.files[0];
        displayFileName(e.target, 'file-info');
        uploadFile(file);
    });

    function uploadFile(file) {
        const formData = new FormData();
        formData.append('file', file);

        fetch('upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                console.log('File uploaded successfully');
            })
            .catch(error => {
                console.error('There was a problem with your fetch operation:', error);
            });
    }
</script>

</html>