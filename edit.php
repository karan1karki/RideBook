<?php
$firstname = $middlename = $lastname = $email = $address = $phonenumber = $gender = $password = "";

if (isset($_GET['email'])){
    $email = $_GET['email'];

    $servername = 'localhost';
    $username = 'root';
    $dbpassword = 'root';
    $dbname = 'prakash';

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT firstname, middlename, lastname, email, address, phonenumber, gender, password FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($firstname, $middlename, $lastname, $email, $address, $phonenumber, $gender, $password);
        $stmt->fetch();
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="signUp.css">
</head>
<body>
   
    <div class="signup">
        <h1>Edit</h1>
       
        <form action="update.php" method="POST">
            <div>
                <label for="firstname">First Name</label>
                <input id="firstname" type="text" name="firstname" required placeholder="First Name" value="<?php echo htmlspecialchars($firstname); ?>"> 
            </div>
            <div>
                <label for="middlename">Middle Name</label>
                <input id="middlename" type="text" name="middlename" placeholder="Middle Name" value="<?php echo htmlspecialchars($middlename); ?>"> 
            </div>
            <div>
                <label for="lastname">Last Name</label>
                <input id="lastname" type="text" name="lastname" required placeholder="Last Name" value="<?php echo htmlspecialchars($lastname); ?>"> 
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required placeholder="Email" value="<?php echo htmlspecialchars($email); ?>"> 
            </div>
            <div>
                <label for="address">Address</label>
                <input id="address" type="text" name="address" required placeholder="Address" value="<?php echo htmlspecialchars($address); ?>"> 
            </div>
            <div>
                <label for="phonenumber">Phone Number</label>
                <input id="phonenumber" type="number" name="phonenumber" required placeholder="Phone Number" value="<?php echo htmlspecialchars($phonenumber); ?>"> 
            </div>
            <div class="genderContainer">
                <label>Gender</label>
                <input type="radio" class="gender1" value="m" id="male" name="gender" required <?php if ($gender == 'm') echo 'checked'; ?>>Male
                <input type="radio" class="gender1" value="f" id="female" name="gender" required <?php if ($gender == 'f') echo 'checked'; ?>>Female
                <input type="radio" class="gender1" value="o" id="other" name="gender" required <?php if ($gender == 'o') echo 'checked'; ?>>Other
            </div>
            <div>    
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="Password" value="<?php echo htmlspecialchars($password); ?>">
            </div>
            <div class="btn">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
