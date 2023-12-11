<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- ... (existing code) -->

<!-- Home Screen -->
<div id="homeScreen">
    <h2>WELCOME TO EZCHECK SELF CHECK-OUT</h2>
    <p>Explore our new features and make purchases with ease!</p>
    <div class="button-group">
        <button onclick="goToScan()"><i class="fas fa-barcode"></i> E-Wallet Payment</button>
        <button onclick="exploreNewFeatures()"><i class="fas fa-star"></i> New Features</button>
        <button onclick="Purchase()"><i class="fas fa-credit-card"></i>Purchase</button>
    </div>
</div>

<!-- ... (existing code) -->

<script type="text/javascript">
    // Other existing code...

    // Set up event listeners for the home screen buttons
    function goToScan() {
        window.location.href = 'payment.php';  // Change 'scan.html' to the actual path of your scan page
    }

    function goToCart() {
        showCartScreen();
    }

    function exploreNewFeatures() {
        alert('Explore new features - Coming soon!');
    }

    function makePurchase() {
        showCartScreen(); // For simplicity, let's assume making a purchase involves going to the cart screen
        // Additional logic for handling e-wallet payment can be added here
        // For example, you can integrate a payment gateway or use a mock payment process for demonstration purposes
        // For demonstration purposes, let's display an alert for successful payment
        alert('Payment successful! Thank you for your purchase.');
    }

    // Other existing code...
</script>
<div id="homeScreen">
    <div class="button-group">
        <button onclick="goToHome()"><i class="fas fa-home"></i> Home</button>
        <button onclick="goToScan()"><i class="fas fa-barcode"></i> Scan</button>
        <button onclick="goToCart()"><i class="fas fa-shopping-cart"></i> Cart</button>
    </div>
</div>

<!-- ... (existing code) -->

<script type="text/javascript">
    // Other existing code...

    // Set up event listeners for the home screen buttons
    function goToHome() {
        window.location.href = 'home.php';  // Change 'home.html' to the actual path of your home page
    }
    
    function goToScan() {
        window.location.href = 'barcode_scanner.php';  // Change 'scan.html' to the actual path of your scan page
    }

    function goToCart() {
        window.location.href = 'cart.php';  // Change 'scan.html' to the actual path of your scan page
    }
</script>

<!-- ... (remaining code) -->
</body>
</html>
</body>
</html>