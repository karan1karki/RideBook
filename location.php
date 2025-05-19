<?php
session_start(); // Start the session

$servername = 'localhost';
$username = 'root';
$dbpassword = 'root';
$dbname = 'prakash';

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize inputs
$place = isset($_POST['place']) ? htmlspecialchars($_POST['place'], ENT_QUOTES, 'UTF-8') : '';
$pikup_date = isset($_POST['pk']) ? $_POST['pk'] : '';
$return_date = isset($_POST['rt']) ? $_POST['rt'] : '';

// Calculate the difference in days between return and pikup dates
$pikup_date_obj = new DateTime($pikup_date);
$return_date_obj = new DateTime($return_date);
$interval = $pikup_date_obj->diff($return_date_obj);
$days_difference = $interval->days;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO location (place, pikup, return_ride, days_difference) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $place, $pikup_date, $return_date, $days_difference);

// Execute the statement
if ($stmt->execute()) {
    // Set session variables
    $_SESSION['place'] = $place;
    $_SESSION['days'] = $days_difference;

    // Redirect to dashboard.php with a fragment identifier
    header("Location: dashboard.php#services");
    exit; // Ensure no further output is sent after redirection
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
