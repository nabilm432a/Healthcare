<?php
    session_start();
    // Redirect to login page if not logged in
    if (!isset($_SESSION["id"])) {
        header("Location: patientlogin.php");
        exit();
    }

    require_once("php_scripts/connect.php");

    // Get patient details using the authenticated patient's ID
    $id = $_SESSION["id"];
    $query = "SELECT id, name, age, gender, bloodgroup, contact FROM patient WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $patientId = $row["id"];
        $patientName = $row["name"];
        $age = $row['age'];
        $gender = $row['gender'];
        $bloodGroup = $row["bloodgroup"];
        $contact = $row["contact"];
    } else {
        // Handle error if patient details not found
        $patientId = "N/A";
        $patientName = "N/A";
        $age = "N/A";
        $gender = "N/A";
        $bloodGroup = "N/A";
        $contact = "N/A";
    }

    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/details.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/artboard_1_9X7_icon.ico" />
</head>

<body>
    <div class="container">

    <div class="main-content">
            <header class="header-main">
                <div class="wrapper">
                    <section class="logo">
                        <h1>Healthcare Appointment System</h1>
                    </section>
                    <nav class="nav-horizontal" id="topnav">
                        <a href="index.php">Home</a>
                    </nav>
                </div>
            </header>
            <main>
                <div class="wrapbox">
                    <article class="article-one">
                        <header>
                            <h2>Welcome, <?php echo $patientName; ?>!</h2>
                            <div class="patient">
                                <div class="piece">
                                    <p>Patient ID: <?php echo $patientId; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Name: <?php echo $patientName; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Age: <?php echo $age; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Gender: <?php echo $gender; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Blood Group: <?php echo $bloodGroup; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Contact: <?php echo $contact; ?></p>
                                </div>
                            </div>
                            <a href="appointment.php"><button type="button" id="app">Make an Appointment</button></a>
                        </header>
                    </article>
                </div>

            </main>
        </div>
        <footer class="footer-main">
            <div class="wrapper">
                <p>CSE370: Database Systems</p>
                <nav class="nav-horizontal">
                    <a href="credits.php">About Us</a>
                    <a href="#">Hospitals</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>