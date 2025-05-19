<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $gender = $_POST['gender'];
    $password = $_POST['password']; // Make sure to hash the password before storing

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
    $stmt = $conn->prepare("UPDATE register SET firstname=?, middlename=?, lastname=?, address=?, phonenumber=?, gender=?, password=? WHERE email=?");
    $stmt->bind_param("ssssssss", $firstname, $middlename, $lastname, $address, $phonenumber, $gender, $password, $email);

    // Execute the statement
    if ($stmt->execute()) {
        // echo "Record updated successfully";
        $_SESSION['firstname'] = $firstname;
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
