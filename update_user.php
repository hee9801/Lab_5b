<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data for the update form
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if (!$user) {
        die("User not found.");
    }
} else {
    die("Matric not provided.");
}

// Handle form submission for updating the user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $updateSql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sss", $name, $role, $matric);

    if ($stmt->execute()) {
        header("Location: view_users.php"); // Redirect back to the users list
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            font-weight: bold;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button, a {
            text-decoration: none;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button {
            background-color: #2196F3; /* Blue button */
            color: white;
        }
        button:hover {
            background-color: #1e88e5; /* Darker blue on hover */
        }
        a {
            background-color: #f44336;
            color: white;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Update User</h2>
    <form action="update_user.php?matric=<?php echo htmlspecialchars($matric); ?>" method="post">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" value="<?php echo htmlspecialchars($user['matric']); ?>" readonly><br>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br>

        <label for="role">Access Level:</label>
        <select name="role" id="role" required>
            <option value="student" <?php if ($user['role'] === "student") echo "selected"; ?>>Student</option>
            <option value="lecturer" <?php if ($user['role'] === "lecturer") echo "selected"; ?>>Lecturer</option>
        </select><br><br>

        <button type="submit">Update</button>
        <a href="view_users.php">Cancel</a>
    </form>
</body>
</html>

<?php
$conn->close();
?>
