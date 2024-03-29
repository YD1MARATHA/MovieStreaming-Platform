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

// Fetch data from signup form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to insert new user into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
