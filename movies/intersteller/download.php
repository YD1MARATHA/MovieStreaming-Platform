<?php
// Increase the maximum execution time and memory limit for this script
ini_set('max_execution_time', 0); // 0 means no time limit
ini_set('memory_limit', '-1'); // -1 means no memory limit

// Check if the 'video' parameter is set in the URL
if (isset($_GET['video'])) {
    // Get the video file name from the URL parameter
    $videoFilename = 'intersteller.mp4'; // Hardcoded video filename

    // Validate the file name to prevent directory traversal attacks
    // You may want to add additional security checks here

    // Define the full file path
    $filePath = $videoFilename; // Assuming 'avengersinfi.mp4' is in the same directory as this script

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set the appropriate headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $videoFilename . '"');
        header('Content-Length: ' . filesize($filePath));

        // Clear output buffer to ensure no other content is sent
        ob_clean();
        flush(); // Flush the output buffer to start sending the file to the client immediately

        // Open the file for reading
        $file = fopen($filePath, 'rb');

        // Read and output the file contents in chunks
        while (!feof($file)) {
            // Output a chunk of the file
            echo fread($file, 1024 * 1024); // Output 1 MB chunks
            flush(); // Flush the output buffer to ensure data is sent to the client immediately
        }

        // Close the file handle
        fclose($file);

        // Terminate script execution after sending the file
        exit;
    } else {
        // Output an error message if the file does not exist
        http_response_code(404); // Not Found
        echo 'File not found.';
    }
} else {
    // Output an error message if the 'video' parameter is missing
    http_response_code(400); // Bad Request
    echo 'Video parameter is missing.';
}
?>
