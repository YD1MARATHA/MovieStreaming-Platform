<?php
// Establish connection to MySQL database
$servername = "localhost";
$username = "root";
$password = ""; // default password for XAMPP
$dbname = "your_database_name"; // Change this to your database name
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from login form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the user exists in the database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, redirect to main page
    header("Location: first.html");
} else {
    // User doesn't exist or wrong credentials, handle accordingly
    echo "Invalid username or password";
}

$conn->close();
?>
