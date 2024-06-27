<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="Payment.css?v=2.0">
</head>

<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
        <div class="menu">
            <ul>
                <li><a href="homeLog.php">Home</a> <b> > </b> </li>
                <li><a href="Payment.php">Lawyer List</a> <b> > </b></li>
                <li><a href="Form_Create_Appoitment.php"> Form </a> <b> > </b></li>
                <li><a href="Payment.php">Payment</a></li>
            </ul>
        </div>
        <div class="hai">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<span class="welcome">Hai, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
                } else {
                    echo '<a href="Login.html" class="masuk" id="">Login</a>';
                }
                ?>
        </div>
</nav>

<div class="wrapper">
    <div class="option">
        <h1>Payment Summary</h1>
        <p id="p1"><b>Total Payment</b></p>
        <p id="p2">IDR 500.000,00</p>
        <!-- <p id="p3"><b>Virtual Account</b></p>
        <p id="p4">0237</p> -->
        <p id="p5"><b>Select Payment Method</b></p>
        <ul class="payment-methods">
        <li class="payment-method" data-account-number="1234567890">
            <img src="Assets/mandiri.png" alt="Bank Mandiri">
            <span>Bank Mandiri</span>
        </li>
        <li class="payment-method" data-account-number="2345678901">
            <img src="Assets/bca.png" alt="Bank BCA">
            <span>Bank BCA</span>
        </li>
        <li class="payment-method" data-account-number="3456789012">
            <img src="Assets/bni.png" alt="Bank BNI">
            <span>Bank BNI</span>
        </li>
        <li class="payment-method" data-account-number="4567890123">
            <img src="Assets/bri.png" alt="Bank BRI">
            <span>Bank BRI</span>
        </li>
    </ul>
    </div>
</div>

<div class="note">
    <p><b>Note:</b> Please include your name and phone number with each transaction for reference.</p>
</div>

<script>
    document.querySelectorAll('.payment-method').forEach(method => {
        method.addEventListener('click', function() {
            // Remove any existing selected class and account info
            document.querySelectorAll('.payment-method').forEach(item => {
                item.classList.remove('selected');
                const existingAccountInfo = item.querySelector('.account-info');
                if (existingAccountInfo) {
                    existingAccountInfo.remove();
                }
            });

            // Add selected class to the clicked method
            this.classList.add('selected');

            // Create and append the account number element
            const accountNumber = this.getAttribute('data-account-number');
            const accountInfoDiv = document.createElement('div');
            accountInfoDiv.className = 'account-info';
            accountInfoDiv.innerHTML = `<p>Account Number: ${accountNumber}</p>`;
            this.appendChild(accountInfoDiv);
        });
    });
</script>


</body>
</html>