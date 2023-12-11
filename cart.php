<?php
$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "selfcheckout";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch transaction details from the database
$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EZCHECK</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
                    <span class="sr-only">navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">EZCHECK</a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a href="barcode_scanner.php"><span class="glyphicon glyphicon-modal-window"></span>Scan</a></li>
                    <li><a href="cart.php"><span class="glyphicon glyphicon-modal-window"></span>Cart </a></li>
                </ul>
            </div>
        </div>
    </div>
    <p><br /></p>
    <p><br /></p>
    <p><br /></p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="cart_msg">
                <!-- Cart Message -->
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Transaction Details</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2 col-xs-2"><b>Action</b></div>
                            <div class="col-md-2 col-xs-2"><b>Product Image</b></div>
                            <div class="col-md-2 col-xs-2"><b>Product Name</b></div>
                            <div class="col-md-2 col-xs-2"><b>Quantity</b></div>
                            <div class="col-md-2 col-xs-2"><b>Product Price</b></div>
                            <div class="col-md-2 col-xs-2"><b>Price in <?php echo CURRENCY; ?></b></div>
                        </div>
                        <div id="cart_checkout">
                            <?php
                            // Display transaction details
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='row'>";
                                    echo "<div class='col-md-2'><button class='btn btn-danger'>Delete</button></div>";
                                    echo "<div class='col-md-2'><img src='" . $row['product_image'] . "'></div>";
                                    echo "<div class='col-md-2'>" . $row['product_name'] . "</div>";
                                    echo "<div class='col-md-2'>" . $row['quantity'] . "</div>";
                                    echo "<div class='col-md-2'>" . $row['product_price'] . "</div>";
                                    echo "<div class='col-md-2'>" . $row['product_price'] . "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "No transactions found.";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-success">Proceed to Payment</button>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script>
        var CURRENCY = '<?php echo CURRENCY; ?>';
    </script>
</body>

</html>

<?php
$conn->close();
?>
