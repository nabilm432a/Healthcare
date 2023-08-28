<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/artboard_1_9X7_icon.ico" />
    <script src="scripts/greeting_script.js"></script>
</head>

<body onload="updateGreeting()">
    <div class="container">
        <div class="main-content">
            <header class="header-main">
                <div class="wrapper">
                    <section class="logo">
                        <h1 class="header-title">Healthcare Appointment System</h1>
                    </section>
                    <nav class="nav-horizontal" id="topnav">
                        <?php
                            if (isset($_SESSION["id"])) {
                                echo '<a href="php_scripts/logout.php">Logout</a>';
                                if ($_SESSION["user_type"] === "doctor") {
                                    echo '<a href="doctor_details.php">Check details</a>';
                                } elseif ($_SESSION["user_type"] === "patient") {
                                    echo '<a href="patient_details.php">Check details</a>';
                                }
                            } else {
                                echo '<a href="login.php">Login</a>';
                            }
                        ?>
                    </nav>
                </div>
            </header>
            
        </div>
        <main>
            <div class="home-page">
                <div class="image-holder">
                    <div class="greet">
                        <h2 id="greeting">Greetings</h2>
                        <p>How can we help you today?</p>
                        <div class="button-container">
                            <?php
                            if (!isset($_SESSION["user_type"]) || $_SESSION["user_type"] != "doctor") {
                                echo '<a href="forms/appointment_selecttest.php" draggable="false"><button>Make an Appointment</button></a>';
                            }
                            ?>
                            <a href="our_hospitals.php" draggable="false"><button>Check out our hospitals</button></a>
                            <a href="index_doctorsearch.php" draggable="false"><button>Meet our Doctors</button></a>
                        </div>
                    </div>
                    <img class="image" src="assets/hospimg.jpg" alt="hospital image">
                </div>
            </div>

        </main>

        <footer style="opacity: 100%; border-radius: 0;" class="footer-main">
            <div class="wrapper">
                <p>CSE370: Database Systems</p>
                <nav class="nav-horizontal">
                    <a href="credits.php">About Us</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>