<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "Lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$matric = $_POST['matric'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash password
$role = $_POST['role'];

// Insert data into the `users` table
$sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    header("Location: registration.php?success=1");
} else {
    header("Location: registration.php?error=1");
}

$conn->close();
?>
