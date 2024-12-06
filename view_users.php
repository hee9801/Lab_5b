<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "Lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_GET['delete'])) {
    $matricToDelete = $_GET['delete'];
    $deleteSql = "DELETE FROM users WHERE matric = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $matricToDelete);
    $stmt->execute();
    header("Location: view_users.php"); // Refresh page after deletion
    exit;
}

// Retrieve data from the `users` table
$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        table td a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            font-size: 12px;
        }
        table td a:first-child {
            background-color: #f44336; /* Delete button: Red */
        }
        table td a:first-child:hover {
            background-color: #e53935;
        }
        table td a:last-child {
            background-color: #2196F3; /* Update button: Blue */
        }
        table td a:last-child:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>
    <h2>Users List</h2>
    <table>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['matric'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td>";
                echo "<a href='view_users.php?delete=" . $row['matric'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a> ";
                echo "<a href='update_user.php?matric=" . $row['matric'] . "'>Update</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>

