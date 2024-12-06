<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        /* Reset some default styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Center the form on the page */
        .registration-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form styling */
        .registration-form {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .registration-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .registration-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .registration-form input,
        .registration-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .registration-form button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .registration-form button:hover {
            background-color: #0056b3;
        }

        /* Success and error messages */
        .success-message {
            color: green;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <form action="register_action.php" method="post" class="registration-form">
            <h2>Register New User</h2>

            <!-- Display success or error message -->
            <?php if (isset($_GET['success'])): ?>
                <p class="success-message">Registration successful!</p>
            <?php endif; ?>
            <?php if (isset($_GET['error'])): ?>
                <p class="error-message">Registration failed. Please try again.</p>
            <?php endif; ?>

            <!-- Registration form -->
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" required>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="">Please select</option>
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
