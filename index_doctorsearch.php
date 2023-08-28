<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/doctor_search.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/artboard_1_9X7_icon.ico" />
    <script src="scripts/greeting_script.js"></script>
    <script src="scripts/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="main-content">
            <header class="header-main">
                <div class="wrapper">
                    <section class="logo">
                        <h1 class="header-title">Healthcare Appointment System</h1>
                    </section>
                    <nav class="nav-horizontal" id="topnav">
                        <a href="login.php">Login</a>
                    </nav>
                </div>
            </header>
            
        </div>
        <main>
            <div class="home-page">
                <div class="image-holder">
                    <div class="greet">
                        <p style="padding:0.6rem; margin-left: 20px; background-color: rgb(119, 213, 203); border-radius:8px; width:40%; color:white;">What Specialty do you seek?</p>
                        <div class="doctor-search">
                            <form action="our_doctors.php" method="post" class="form" onsubmit="return validatesearch()">
                                <div class="input">
                                    <label style="margin-bottom: 50px;" for="specialty">Select a Specialty:</label>
                                    <select name="specialty" id="specialty">
                                        <option value="" disabled selected>Select a Specialty</option>
                                        <?php
                                            require_once("php_scripts/connect.php");
                                            $sql = "SELECT DISTINCT specialization FROM doctor";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows>0) {
                                                while ($rows = $result->fetch_assoc()) {
                                                    $sp = $rows['specialization'];
                                                    echo "<option value'" . $sp . "'>" . $sp . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" class="search-button" value="Search"/>
                            </form>
                        </div>
                        <a style="height:50px; width: 200px; margin-left:20px;" href="index.php"><button style="height:50px; width: 200px; padding:1rem; margin-top:190px;">Go back</button></a>
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