<?php
$conn = new mysqli('localhost', 'root', '', 'registration form');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phno = $_POST['phno'];
$password = md5($_POST['password']); 

$checkEmail = "SELECT * FROM signups WHERE email =?";
$stmt = $conn->prepare($checkEmail);
if (!$stmt) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Email already exists')</script>";
} else {
    $query = "INSERT INTO signups (firstName, lastName, gender, dob, email, phno, password) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
    $stmt->bind_param("sssssss", $firstName, $lastName, $gender, $dob, $email, $phno, $password);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Account Created Successfully!')</script>";
    } else {
        echo "<script>alert('Signup Failed')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCCL</title>
    <link rel="icon" href="images/BCCL logo.png">
    <link rel="stylesheet" href="regis.css">
</head>
<body>
    <h2><a href="signup.html">Use another Email</a></h2>
    <h2><a href="login.html">Log in</a></h2>
    <h2><a href="index.html">Home Page</a></h2>
</body>
</html>