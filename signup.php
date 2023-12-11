<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
</head>
<body>
    <h2>Signup Form</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = " ";
    $dbname = "selfcheckout";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Form data
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $mobile_number = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $inputPassword = isset($_POST['password']) ? $_POST['password'] : ''; // Use a different variable
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

    // Password confirmation check
    if (!password_verify($confirmPassword, password_hash($inputPassword, PASSWORD_DEFAULT))) {
        die("Password and Confirm Password do not match.");
    }

    // Check if user already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "User with this email already exists. Please choose a different email.";
    } else {
        // Insert new user
        $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT); // Hash the password
        $insert_query = "INSERT INTO users (username, mobile_number, email, password) VALUES ('$username', '$mobile_number', '$email', '$hashedPassword')";

        if ($conn->query($insert_query) === TRUE) {
            echo "User registered successfully.";

            // Generate a verification code (you may use a more secure method)
            $verificationCode = mt_rand(100000, 999999);

            // Store the verification code in the database for the user
            $updateQuery = "UPDATE users SET verification_code='$verificationCode' WHERE email='$email'";
            $conn->query($updateQuery);

            // Send verification code via email
            $to = "example@gmail.com";
            $subject = "Verification Code for Your App";
            $message = "Your verification code is: $verificationCode";
            $headers = "From: your_email@gmail.com"; // Replace with your actual email address

            // Use a more sophisticated email sending library in a production environment
    

            echo "A verification code has been sent to your email.";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    ?>

    <form method="post" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br>

        <input type="submit" value="SignUp">
    </form>
<div class="button-group">
    <button onclick="goToHome()"><i class="fas fa-home"></i>Signup</button>
</div>

<!-- ... (existing code) -->

<script type="text/javascript">
    // Other existing code...

    // Set up event listeners for the navigation buttons
    function goToHome() {
        window.location.href = 'home.php';  // Change 'home.html' to the actual path of your home page
</script>

</body>
</html>
