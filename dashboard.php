<?php
session_start();
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
$place = isset($_SESSION['place']) ? $_SESSION['place'] : 'Unknown place';
$days = isset($_SESSION['days']) ? $_SESSION['days'] : 0;
$ride = isset($_GET['ride'])? $_GET['ride'] : '';
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
        <?php 
        if ($ride){
            echo<<<ride
                <a href="dashboard.php" class="sign-in"> $ride</a>
            ride;
        }
        ?>

        <a class="sign-in"> <button class="rider_display" onclick="ridersbike()"> Add a ride </button></a>
        <a href="dashboard.php" class="sign-in"><?php echo htmlspecialchars($firstname);?></a>
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">
                <span class="layer layer1"></span>
                <spaxn class="layer layer2"></spaxn>
                <!-- <span class="layer layer3"></span> -->
            </button>
            <div id="myDropdown" class="dropdown-content">
                <a href="edit.php?email=<?php echo $email;?>">Edit</a>
                <a href="logout.php">LogOut</a>
            </div>
        </div>

    </div>
</header>
<!--Home-->
<section class="home" id="home">
    <div id="addRideModal" class="modal-overlay">
        <form id="addBikeForm">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModal()">&times;</span>
                <h2>Add a Ride</h2>
                <form action="add_ride.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="bike_name">Bike Name:</label>
                        <input type="text" id="bike_name" name="bike_name" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model Year:</label>
                        <input type="number" id="model" name="model" required>
                    </div>
                    <div class="form-group">
                        <label for="cc">CC:</label>
                        <input type="number" id="cc" name="cc" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price per Day:</label>
                        <input type="number" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="bike_image">Upload Image:</label>
                        <input type="file" id="bike_image" name="bike_image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
        </form>
    </div>
<div class="text">
<h1><span>Looking</span> to<br>rent a bike</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex voluptatem minus nobis repellendus,<br> expedita maxime neque debitis ipsa animi iusto possimus, cum voluptates! Corporis natus voluptatem <br>explicabo fugit, qui a?</p>
<div class="app-stores">
    <img src="appStore.png" alt="">
    <img src="googlePlay4.png" alt="">
</div>
</div>
<div class="form-container">
    <form action="location.php" method="post">
        <div class="input-box">
            <span>Location</span>
            <input type="search" name="place" id="" placeholder="Search Place">
        </div>
        <div class="input-box">
            <span>Pick-Up Date</span>
            <input type="date" name="pk" id="">
        </div>
        <div class="input-box">
            <span>Return Date</span>
            <input type="date" name="rt" id="">
        </div>
        <input type="submit" name="sub" class="btn">
    </form>
</div>


</section>

<!--Ride-->
<section class="ride" id="ride">
    <div class="heading">
        <span>How Its Work</span>
        <h1>Rent With 3 Easy Steps</h1>
    </div>
    <div class="ride-container">
        <div class="box">
            <i class='bx bx-map' ></i>
            <h2>Choose a location</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, deleniti?</p>
        </div>

        <div class="box">
            <i class='bx bx-calendar-check'></i>
            <h2>Pick-Up Date</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, deleniti?</p>
        </div>

        <div class="box">
            <i class='bx bxs-calendar-star' ></i>
            <h2>Book a Bike</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, deleniti?</p>
        </div>

    </div>
</section>

<!--Services-->
<section class="services" id="services">
    <div class="heading">
        <span>Best Services</span>
        <h1>Explore Our Top Deals <br> From Top Rated Dealers</h1>
    </div>
   <div class="services-container">
        <div class="box">
            <div class="box-img">
                <img src="yamahafzv2.jpg" alt="">
            </div>
            <p>2000</p>
            <h3>Yamaha Fz-V2 Fi 150cc</h3>
            <h2>Rs.300<span>/Day</span></h2>
            <a href="rent.php?model=2000 &cc=150&image=yamahafzv2.jpg&name=Yamaha Fz-V2&place=<?php echo htmlspecialchars($place);?>&days=<?php echo htmlspecialchars($days);?>&price=300" class="btn">Rent Now</a>
        </div>
        <div class="box">
            <div class="box-img">
                <img src="hondaxplus.jpeg" alt="">
            </div>
            <p>2019</p>
            <h3>Hero Xplus Fi 200cc</h3>
            <h2>Rs.400<span>/Day</span></h2>
            <a href="rent.php?model=2019&cc=200&image=hondaxplus.jpeg&name=Hero Xplus&place=<?php echo htmlspecialchars($place);?>&days=<?php echo htmlspecialchars($days);?>&price=400" class="btn">Rent Now</a>
        </div>

        <div class="box">
            <div class="box-img">
                <img src="crossfireHj250.jpg" alt="">
            </div>
            <p>2023</p>
            <h3>Crossfire Hj Fi 250cc</h3>
            <h2>Rs.550<span>/Day</span></h2>
            <a href="rent.php?model=2023&cc=250&image=crossfireHj250.jpg&name=Crossfire Hj&place=<?php echo htmlspecialchars($place);?>&days=<?php echo htmlspecialchars($days);?>&price=550" class="btn">Rent Now</a>
        </div>

        <div class="box">
            <div class="box-img">
                <img src="yamahaR15v3.jpg" alt="">
            </div>
            <p>2020</p>
            <h3>Yamaha R15 V3 Fi 150cc</h3>
            <h2>Rs.500<span>/Day</span></h2>
            <a href="rent.php?model=2020&cc=150&image=yamahaR15v3.jpg&name=Yamaha R15 V3&place=<?php echo htmlspecialchars($place);?>&days=<?php echo htmlspecialchars($days);?>&price=500" class="btn">Rent Now</a>
        </div>

        <div class="box">
            <div class="box-img">
                <img src="pulsor220.jpg" alt="">
            </div>
            <p>2024</p>
            <h3>Pulsar 220f Fi 220cc</h3>
            <h2>Rs.450<span>/Day</span></h2>
            <a href="rent.php?model=2024&cc=220&image=pulsor220.jpg&name=Pulsar 220f&place=<?php echo htmlspecialchars($place);?>&days=<?php echo htmlspecialchars($days);?>&price=450" class="btn">Rent Now</a>
        </div>

        <div class="box">
            <div class="box-img">
                <img src="royalEnfield350.jpg" alt="">
            </div>
            <p>2022</p>
            <h3>Hunter 350 Fi 350cc</h3>
            <h2>Rs.550<span>/Day</span></h2>
            <a href="rent.php?model=2022&cc=350&image=royalEnfield350.jpg&name=Hunter 350&place=<?php echo htmlspecialchars($place);?>&days=<?php echo htmlspecialchars($days);?>&price=550" class="btn">Rent Now</a>
        </div>


        
   </div>

</section>
<!--About-->
<section class="about" id="about">
    <div class="heading">
        <span>About Us</span>
        <h1>Best Customer Expirence</h1>
    </div>

    <div class="about-container">
        <div class="about-img">
            <img src="hayabusa.png" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, placeat?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, placeat?</p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </div>

</section>

<!--Reviews-->
<section class="reviews" id="reviews">
    <div class="heading">
        <span>Reviews</span>
        <h1>Whats Our Customer Say</h1>
    </div>
    <div class="reviews-container">
        <div class="box">
            <div class="rev-img">
                <img src="prakash.jpg" alt="">
            </div>
            <h2>Someone Name</h2>
            <div class="stars">
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star-half' ></i>
            </div>
            <p>lorem 10</p>
        </div>

        <div class="box">
            <div class="rev-img">
                <img src="bhumika.jpg" alt="">
            </div>
            <h2>Someone Name</h2>
            <div class="stars">
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star-half' ></i>
            </div>
            <p>lorem 10</p>
        </div>

        <div class="box">
            <div class="rev-img">
                <img src="minaxee.jpg" alt="">
            </div>
            <h2>Someone Name</h2>
            <div class="stars">
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star-half' ></i>
            </div>
            <p>lorem 10</p>
        </div>

    </div>

</section>

<!--Newsletter-->
<section class="newsletter">
    <h2>Subscribe To Newsletter</h2>
    <div class="box">
        <input type="text" placeholder="Enter Your Email..">
        <a href="#" class="btn">Subscribe</a>
    </div>
</section>

<!--Copyright-->
<div class="copyright">
    <p>&#169; BikeRental All Right Reserved</p>
    <div class="social">
        <a href="#"><i class='bx bxl-facebook' ></i></a>
        <a href="#"><i class='bx bxl-instagram' ></i></i></a>
        <a href="#"><i class='bx bxl-whatsapp' ></i></i></a>
    </div>
</div>


<!--ScrollReveal-->
<script src="https://unpkg.com/scrollreveal"></script>

    <!--link to JS-->
    <script src="main.js"></script>
    
</body>
</html>