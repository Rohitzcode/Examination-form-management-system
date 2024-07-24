<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'registration form');

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM signups WHERE email =?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];
    $phone_number = $row['phno'];

    if ((password_verify(md5($password), password_hash ($hashed_password, PASSWORD_BCRYPT)))) {
        $_SESSION['email'] = $email;
        $_SESSION['phno'] = $phone_number;
        $_SESSION['logged_in'] = true;

        echo "Password is valid!";
        header("location: loggedin.html");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid Email or Password";
}

?>