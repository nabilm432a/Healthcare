<?php
    session_start();
    // Redirect to login page if not logged in
    if (!isset($_SESSION["id"])) {
        header("Location: forms/patient_login.php");
        exit();
    }

    require_once("php_scripts/connect.php");

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
        // if patient details not found
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
    <script src="scripts/update_contact.js"></script>
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
                        <a href="index.php">Home</a>
                        <a href="php_scripts/logout.php">Log out</a>
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
                            <a href="forms/appointment_selecttest.php"><button type="button" id="app">Make an Appointment</button></a>
                            <a href="check_patient_appointments.php"><button type="button" id="app">Check Appointments</button></a>
                            <a href="php_scripts/delete_patient.php"><button style="color: red; height: 50px; width:150px;" type="button" id="app">Delete Account</button></a>
                            <a href="#"><button style="height: 50px; width:150px;" type="button" id="showButton" onclick="showForm()">Update Contact</button></a>
                            <div style="display:none; margin-top: 50px;" id="formContainer" class="form-container">
                                <form action="php_scripts/update_patient_contact.php" method="post">
                                    <input type="tel" name="new_contact" pattern="[0-9]{11}" maxlength="11" required placeholder="Enter new contact">
                                    <button style="padding: 5px 10px; width: 100px; height: 30px; border-radius:0px;">Confirm</button>
                                </form>
                            </div>
                            <div style="margin-top: 50px;" class="message-container">
                                <?php
                                    if (isset($_SESSION["message"])) {
                                        echo $_SESSION["message"];
                                        unset($_SESSION["message"]);
                                    }
                                ?>
                            </div>
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
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>