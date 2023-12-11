function initiatePayment() {
    // Retrieve payment details from the form
    var amount = document.getElementById('amount').value;

    // Make an AJAX request to a PHP script for processing
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process_payment.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response, e.g., display success message
            alert(xhr.responseText);
        }
    };
    xhr.send('amount=' + amount);
}
