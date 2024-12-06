<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Reset some default styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Center the form on the page */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form styling */
        .login-form {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .login-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form button:hover {
            background-color: #0056b3;
        }

        .login-form p {
            text-align: center;
            margin-top: 15px;
        }

        .login-form a {
            color: #007BFF;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="login_action.php" method="post" class="login-form">
            <h2>Login</h2>

            <!-- Error message for invalid login -->
            <?php if (isset($_GET['error'])): ?>
                <p class="error-message">Invalid username or password, try <a href="login.php">login</a> again.</p>
            <?php endif; ?>

            <!-- Login form -->
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>

            <!-- Link to registration page -->
            <p><a href="registration.php">Register</a> here if you have not.</p>
        </form>
    </div>
</body>
</html>
