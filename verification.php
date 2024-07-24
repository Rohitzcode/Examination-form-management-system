<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    $phone_number = $_SESSION['phno'];
} else {
    echo "You're not logged in.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCCL</title>
    <link rel="icon" href="images/BCCL logo.png">
    <link rel="stylesheet" href="vstyle.css">
</head>
<body>
    <script type="module" src="verify.js"></script>
    <div class="container">
        <div class="header">
            <h4>Login Successful!</h4>
            <br>
            <h3>Verify your mobile number</h3>
        </div>
        <br><br>
        <div class="sender" id="sender">
            <label for="number">Enter your mobile number</label>
            <input type="text" id="number" value="<?php echo "+91".$phone_number; ?>">
            <div id="recaptcha-container"></div>
            <button class="btn" id="send">Send OTP</button>
        </div>
        <div class="verifier" id="verifier">
            <input type="text" id="otp">
            <button class="butn" id="verify">Verify</button>
            <div class="p-conf">Number Verified</div>
            <div class="n-conf">Incorrect OTP</div>
        </div>
        <div class="register">
            <h3>Exam form out now!</h3>
            <input type="button" class="regis" value="Register">
        </div>
    </div>
</body>
</html>