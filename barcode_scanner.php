<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.11.0/JsBarcode.all.min.js"></script>
    <script src="https://cdn.rawgit.com/serratus/quaggaJS/master/dist/quagga.min.js"></script>
    <title>Barcodes Generator</title>
</head>
<body>
        <!-- Barcode Scanner Section -->
        <div>
            <h2>Barcode Scanner</h2>
            <div id="barcodeScanner" class="mb-3"></div>
            <p class="text-muted">Scan Product Barcode.</p>
        </div>

        <!-- Add to Cart Modal -->
        <div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalLabel" aria-hidden="true">
            <!-- ... Your existing modal code ... -->
        </div>
        <!-- End Add to Cart Modal -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- ... (existing code) -->

    <script type="text/javascript">
        function generateBarcode() {
            var barcodeInput = document.getElementById('barcodeInput').value;
            JsBarcode("#barcodeDisplay", barcodeInput, {
                format: "CODE128"
            });
        }

        // Initialize QuaggaJS and set up the barcode scanner
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#barcodeScanner'),
                constraints: {
                    width: 480,
                    height: 320,
                    facingMode: "environment",
                },
            },
            decoder: {
                readers: ["code_128_reader"]
            },
        }, function (err) {
            if (err) {
                console.error(err);
                return;
            }
            Quagga.start();
        });

        // Set up an event listener for when a barcode is detected
        Quagga.onDetected(function (result) {
            var barcode = result.codeResult.code;
            alert("Barcode detected: " + barcode);

            // Perform any additional actions, such as adding the product to the cart or updating the UI.
            // You may open the "Add to Cart" modal here.
            $('#addToCartModal').modal('show');
        });
       // Display product details on the screen
    function showProductDetails(productDetails) {
        // Show the product details screen
        document.getElementById('barcodeScanner').style.display = 'none';
        document.getElementById('productDetails').style.display = 'block';

        // Display product details
        document.getElementById('productImage').src = productDetails.image; // Replace with actual image URL
        document.getElementById('productGroup').innerText = productDetails.group;
        document.getElementById('productName').innerText = productDetails.name;
        document.getElementById('productCode').innerText = productDetails.code;
        document.getElementById('productPrice').innerText = productDetails.price;
    }

    // Set up event listeners for the links
    document.getElementById('homeLink').addEventListener('click', function() {
        // Handle the home link click
        window.location.href = 'home.html';  // Change 'home.html' to the actual path of your home page
    });

    document.getElementById('scanLink').addEventListener('click', function() {
        // Handle the scan link click
        window.location.href = 'scan.html';  // Change 'scan.html' to the actual path of your scan page
    });

    document.getElementById('cartLink').addEventListener('click', function() {
        // Handle the cart link click
        window.location.href = 'cart.php';  // Change 'cart.html' to the actual path of your cart page
    });
</script>
<div id="barcodeScanner">
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
        window.location.href = 'product_details.php ';  // Change 'scan.html' to the actual path of your scan page
    }

    function goToCart() {
        window.location.href = 'cart.php';  // Change 'scan.html' to the actual path of your scan page
    }
</script>


<!-- ... (remaining code) -->

</body>
</html>