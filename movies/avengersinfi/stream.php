<?php
// Set the path to your video file
$videoPath = 'avengersinfi.mp4';

// Check if the file exists
if (file_exists($videoPath)) {
    // Set the appropriate HTTP headers for streaming video
    header("Content-Type: video/mp4");
    header("Content-Length: " . filesize($videoPath));

    // Open the video file for reading
    $videoFile = fopen($videoPath, "rb");

    // Make sure the file is opened successfully
    if ($videoFile) {
        // Read the file and output it to the browser in chunks
        while (!feof($videoFile)) {
            echo fread($videoFile, 8192);
            ob_flush();
            flush();
        }
        // Close the file
        fclose($videoFile);
    } else {
        // If the file cannot be opened, output an error message
        http_response_code(500); // Internal Server Error
        echo "Error: Unable to open video file.";
    }
} else {
    // If the file doesn't exist, output an error message
    http_response_code(404); // Not Found
    echo "Error: Video file not found.";
}
?>
