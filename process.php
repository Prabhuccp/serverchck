<?php
// Database configuration
$host = "customers.czptxhzjxjrt.us-east-1.rds.amazonaws.com"; // Replace with your database host
$username = "admin"; // Replace with your database username
$password = "Jcricket963.$"; // Replace with your database password
$dbname = "Customerdet"; // Replace with your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert data into the database
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Data successfully inserted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
