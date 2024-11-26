<?php
$servername = "localhost";
$username = "root";
$password = "";  // Your MySQL root password
$dbname = "EventManagement";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate credentials
    $sql = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login
        echo "Login successful! Welcome to the Event Management System.";
        // You can redirect to a user dashboard or another page
        header("Location: index.html");
    } else {
        echo "Invalid credentials! Please try again.";
    }
}

$conn->close();
?>
