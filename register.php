<?php
$servername = "localhost";
$username = "root"; // Adjust based on your MySQL credentials
$password = ""; // Adjust based on your MySQL credentials
$dbname = "EventManagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user already exists
    $checkUser = "SELECT * FROM Users WHERE email = '$email'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        echo "User already exists with this email.";
    } else {
        // Insert user data into the Users table
        $sql = "INSERT INTO Users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            header("Location: login.html"); // Redirect to login page
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
