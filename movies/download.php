<?php
// download.php

$videoFilename = $_GET['video'];

$filePath = 'C:/xampp/htdocs/movies/videos/zxz.mp4' . $videoFilename; // Adjust the path accordingly

if (file_exists($filePath)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $videoFilename . '"');
    readfile($filePath);
} else {
    echo 'File not found.';
}
?>
