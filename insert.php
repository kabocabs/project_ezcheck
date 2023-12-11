<?php
// Connect to the database.
$connection = mysqli_connect('localhost', 'Productname', 'barcode', 'Price', 'quantity' 'selfcheckout');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product name and quantity from the form
    $productName = $_POST["name"];
    $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 1;

    // Generate a random barcode (you may need to implement a more robust method)
    $barcode = generateRandomBarcode();

    // Insert the data into the database
    $insertSql = "INSERT INTO products (productname, barcode, quantity) VALUES ('$productName', '$barcode', $quantity)";
    mysqli_query($connection, $insertSql);

    // Get the ID of the last inserted row
    $lastInsertedId = mysqli_insert_id($connection);

    // Redirect back to the page to display the updated table
    header("Location: ../barcode_generator.php");
    exit;
}

// ... (remaining code)

// Function to generate a random barcode (you may need a more robust implementation)
function generateRandomBarcode() {
    return substr(md5(uniqid()), 0, 10);
}
?>

