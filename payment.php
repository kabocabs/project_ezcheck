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


// Retrieve payment details from the AJAX request
$amount = $_POST['amount'];

// Insert transaction into the database
$sql = "INSERT INTO transactions (user_id, amount) VALUES (1, $amount)";
if ($conn->query($sql) === TRUE) {
    echo 'Payment initiated successfully!';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GCash Payment</title>
</head>
<body>
    <h1>GCash Payment Form</h1>
    <form id="paymentForm">
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required>
        <button type="button" onclick="initiatePayment()">Pay with GCash</button>
    </form>

    <script src="payment.js"></script>
</body>
</html>
