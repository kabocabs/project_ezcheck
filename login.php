<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>

    <?php
    $servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "selfcheckout";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Form data
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Check if user exists
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $row['password'])) {
                // Password is correct, login successful
                echo "Login successful. Welcome, " . $row['username'] . "!";

                // You can perform additional actions after successful login if needed
            } else {
                echo "Invalid password. Please try again.";
            }
        } else {
            echo "User with this email does not exist. Please sign up first.";
        }
    }

    $conn->close();
    ?>

    <form method="post" action="login.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
