<?php
$uploadDir = '../../upload/';

if (!empty($_FILES['file']['name'])) {
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $uploadDir . $fileName;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
        echo "File $fileName has been uploaded successfully.\n";
    } else {
        echo "Error uploading file $fileName.\n";
    }
} else {
    echo "No file uploaded.";
}
?>
