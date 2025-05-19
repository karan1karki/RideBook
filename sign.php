<?php
session_start();
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];
$gender = $_POST['gender'];
$password = $_POST['password'];

$servername = 'localhost';
$username = 'root';
$dbpassword = 'root';
$dbname = 'prakash';

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO register (firstname, middlename, lastname, email, address, phonenumber, gender, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $firstname, $middlename, $lastname, $email, $address, $phonenumber, $gender, $password);

// Execute the statement
if ($stmt->execute()) {
    $login_message ="login successfully";
    $_SESSION['firstname'] = $firstname;
    $_SESSION['email'] = $email;
    header("Location: dashboard.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
