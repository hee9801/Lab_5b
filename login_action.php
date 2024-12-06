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
$password = $_POST['password'];

// Query to fetch user details
$sql = "SELECT * FROM users WHERE matric = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matric);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the entered password with the hashed password in the database
    if (password_verify($password, $user['password'])) {
        // Start a session and store user information
        session_start();
        $_SESSION['user'] = $user;

        // Redirect to the user's info page
        header("Location: view_users.php");
        exit;
    }
}

// Authentication failed
header("Location: login.php?error=1");
$conn->close();
?>
