<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <title>Product Details</title>
</head>
<body>
    <header>
        <h1>EZCHECK SELF CHECK-OUT</h1>
    </header>

    <div class="container">
        <div class="product-details">
            <h2>Product Details</h2>
            <p><strong>Product Group:</strong> </p>
            <p><strong>Product Name:</strong> </p>
            <p><strong>Product Code:</strong></p>
            <p><strong>Prices:</strong></p>
            <p><strong>Quantity:</strong> <span id="quantity">1</span></p>

            <div class="button-group">
                <button onclick="removeQuantity()">-</button>
                <button onclick="addQuantity()">+</button>
            </div>

            < <button onclick="addToCart()">Add to Cart</button>
        </div>

        <div class="button-group">
            <button><i class="fas fa-home"></i> Home</button>
            <button><i class="barcode_scanner.php"></i> Scan</button>
            <button><i class="fas fa-shopping-cart"></i> Cart</button>
        </div>
    </div>

    <script>
        function addQuantity() {
            var quantityElement = document.getElementById("quantity");
            var currentQuantity = parseInt(quantityElement.innerText);
            quantityElement.innerText = currentQuantity + 1;
        }

        function removeQuantity() {
            var quantityElement = document.getElementById("quantity");
            var currentQuantity = parseInt(quantityElement.innerText);
            if (currentQuantity > 1) {
                quantityElement.innerText = currentQuantity - 1;
            }
        }

        function addToCart() {
            // Add your logic to add the product to the cart here
            alert("Product added to the cart!");
        }
    </script>

    <div id="success-screen" style="display:none;">
        <h2>Success! Product added to the cart.</h2>
        <div class="button-group">
            <button onclick="viewCart()">View Cart</button>
            
<script>
  function viewCart() {
    // Change the URL to the path of your cart page
    window.location.href = 'cart.php';
  }
</script>
            <button onclick="scanAnotherItem()">Scan Another Item</button>
        </div>
    </div>

    <script>
        function addQuantity() {
            // Your existing addQuantity function code
        }

        function removeQuantity() {
            // Your existing removeQuantity function code
        }

        function addToCart() {
            // Add your logic to add the product to the cart here

            // Show the success screen
            document.getElementById("success-screen").style.display = "block";
        }

        function viewCart() {
            // Add logic to navigate to the cart page
            alert("Navigate to the Cart page");
        }

        function scanAnotherItem() {
            // Add logic to reset the form or navigate to the scan page
            alert("Navigate to the Scan page or reset the form");
        }
    </script>
</body>
</html>
</body>
</html>
