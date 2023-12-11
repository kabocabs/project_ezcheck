<?php
require_once 'vendor/autoload.php'; // Include Stripe PHP library

\Stripe\Stripe::setApiKey('your_stripe_secret_key');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = $_POST['stripeToken'];

    // Create a charge using the Stripe API
    try {
        $charge = \Stripe\Charge::create([
            'amount' => 1000, // amount in cents
            'currency' => 'usd',
            'source' => $token,
            'description' => 'Example Charge',
        ]);

        // Payment successful
        echo "Payment successful!";
    } catch (\Stripe\Exception\CardException $e) {
        // Payment failed
        echo "Payment failed: " . $e->getMessage();
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <h1>Checkout</h1>
    
    <!-- Credit/Debit Card Form -->
    <form action="process_payment.php" method="post" id="card-payment-form">
        <label for="card-element">
            Credit or debit card
        </label>
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>

        <button type="submit">Pay with Card</button>
    </form>

    <!-- GCash Form (Hypothetical) -->
    <form action="process_gcash_payment.php" method="post" id="gcash-payment-form">
        <label for="gcash-number">GCash Number:</label>
        <input type="text" name="gcash-number" required>

        <button type="submit">Pay with GCash</button>
    </form>

    <script>
        // Set up Stripe.js and Elements to use in the card payment form.
        var stripe = Stripe('your_stripe_public_key');
        var elements = stripe.elements();

        // Create an instance of the card Element.
        var card = elements.create('card');

        // Add an instance of the card Element into the `card-element` div.
        card.mount('#card-element');
    </script>
</body>
</html>
