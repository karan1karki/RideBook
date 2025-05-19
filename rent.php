<?php
// Retrieve data from query parameters
$model = isset($_GET['model']) ? $_GET['model'] : '';
$image = isset($_GET['image']) ? $_GET['image'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$cc = isset($_GET['cc']) ? $_GET['cc'] : '';
$place = isset($_GET['place']) ? $_GET['place']: '';
$days = isset($_GET['days']) ? $_GET['days']: '';
?>
<!-- <div class="bike-details">
    <img src="<?php echo htmlspecialchars($image); ?>" alt="Bike Image">
    <h2><?php echo htmlspecialchars($name); ?></h2>
    <p><?php echo htmlspecialchars($model); ?></p>
    <h3><?php echo htmlspecialchars($price); ?> /Day</h3>
</div> -->

<?php
session_start();
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental Website</title>
    <!--Link to css-->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script src="dashboard.js" type="text/javascript"></script>

</head>
<body>
    <!--Header-->
<header>
    <a href="#" class="logo">
        <img src="bikelogo2.png">
      </a>
      <a href="#" class="logo1">
        <img src="logo2.png">
      </a>
    <div class="bx bx-menu" id="menu-icon"></div>
    <ul class="navbar">
        <li><a href="#home">Home</a></li>
        <li><a href="#ride">Ride</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#reviews">Reviews</a></li>
    </ul>

    <div class="header-btn">
        <!-- <a href="signUp.html" class="sign-up" target="_self">Sign Up</a>
        <a href="signin.html" class="sign-in">Sign In</a> -->
        <a href="dashboard.php" class="sign-in"><?php echo htmlspecialchars($firstname);?></a>
    </div>
</header>
<main class="container" style="margin-top: 100px;">
        <div class="filter-search"></div>
        <div id="modal" class="modal">
            <div class="modal-content">
                <div class="close-btn"></div>
                <form id="insert-form" method="post" action="add.php" enctype="multipart/form-data">
                    <div class="upload-box" id="uploadBox">
                        <!-- <div class="camera-icon"></div> -->
                        <img src="<?php echo htmlspecialchars($image); ?>" alt="Bike Image">
                    </div>
                    <div class="insert-form__inputs">
                        <div class="insert-form__input-group">
                            <label>Name:</label>
                            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly>
                        </div>
                        <div class="insert-form__input-group">
                            <label>Modal:</label>
                            <input type="text" name="breed" value="<?php echo htmlspecialchars($model); ?>" readonly>
                        </div class="insert-form__input-group">
                        <div>
                            <label>CC:</label>
                            <input type="text" value="<?php echo htmlspecialchars($cc); ?>" readonly>
                        </div>
                      
                        <div class="insert-form__input-group">
                            <label>Price(NPR):</label>
                            <input type="text" name="size" value="<?php echo htmlspecialchars($price)." X ". htmlspecialchars($days) ." = ". htmlspecialchars($days*$price)." Total Amount"; ?>" readonly>
                        </div>
                        <div class="insert-form__input-group">
                            <label>Location:</label>
                            <input type="text" value="<?php echo htmlspecialchars($place);?>" readonly>
                        </div>
                        <input type="submit" value="Comfirm" name="submit" id="post-btn">
                    </div>
                </form>
            </div>
        </div>
    </main>
<!--Copyright-->
<!-- <div class="copyright">
    <p>&#169; BikeRental All Right Reserved</p>
    <div class="social">
        <a href="#"><i class='bx bxl-facebook' ></i></a>
        <a href="#"><i class='bx bxl-instagram' ></i></i></a>
        <a href="#"><i class='bx bxl-whatsapp' ></i></i></a>
    </div>
</div> -->


<!--ScrollReveal-->
<script src="https://unpkg.com/scrollreveal"></script>

    <!--link to JS-->
    <script src="main.js"></script>
    
</body>
</html>