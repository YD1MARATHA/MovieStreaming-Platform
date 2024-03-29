<?php
// Get the video file name from the URL parameter
$videoFileName = $_GET['video'];

// You may want to add additional security checks here to validate the file name.

// Set the appropriate content type for video files
header('Content-type: video/mp4');

// Open the video file
$videoPath = 'C:/xampp/htdocs/movies/videos/zxz.mp4' . $videoFileName; // Adjust the path accordingly

// Check if the file exists
if (file_exists($videoPath)) {
    // Output the video content
    readfile($videoPath);
} else {
    // Handle the case when the file doesn't exist
    echo 'Video not found';
}
?>
