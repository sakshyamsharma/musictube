<?php
if (isset($_POST['submit'])) {
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['videoFile']['name']);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check file size (adjust this according to your needs)
    if ($_FILES['videoFile']['size'] > 100000000) {
        echo 'Sorry, your file is too large.<br>';
        $uploadOk = 0;
    }

    // Allow only certain video formats (add more formats if needed)
    if ($videoFileType !== 'mp4') {
        echo 'Sorry, only MP4 files are allowed.<br>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo 'Sorry, your file was not uploaded.<br>';
    } else {
        if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $targetFile)) {
            echo 'The file ' . basename($_FILES['videoFile']['name']) . ' has been uploaded and stored in "uploads" directory.<br>';
        } else {
            echo 'Sorry, there was an error uploading your file.<br>';
        }
    }
}
?>