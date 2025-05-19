<?php
session_start(); // Start the session to store session variables

$email = $_POST['email'];
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
$stmt = $conn->prepare("SELECT email, password, firstname FROM register WHERE email = ?");
$stmt->bind_param("s", $email);

// Execute the statement
$stmt->execute();

// Store the result
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Bind result variables
    $stmt->bind_result($db_email, $db_password, $db_firstname);
    $stmt->fetch();
    // print_r($db_password);die();
    // Verify password
    if ($password === $db_password) {
        $_SESSION['firstname'] = $db_firstname; // Store firstname in session
        $_SESSION['email'] = $db_email;
        $login_message = "Login successful!";
        header("Location: dashboard.php?firstname=" . urlencode($db_firstname)); // Redirect to dashboard with firstname in URL
        exit(); // Ensure no further output is sent after redirection
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that email.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
