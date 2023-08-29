<?php
    session_start();

    if (!isset($_SESSION["id"])) {
        header("Location: forms/doctor_login.php");
        exit();
    }

    require_once("php_scripts/connect.php");

    $id = $_SESSION["id"];
    $query = "SELECT id, name, age, degree, specialization, contact FROM doctor WHERE id = $id";
    $hospitals = array();
    $hospitalQuery = "SELECT hospital_name FROM doctor_works_at WHERE doctor_id = $id";
    $hospitalResult = $conn->query($hospitalQuery);
    while ($hospitalRow = $hospitalResult->fetch_assoc()) {
        $hospitals[] = $hospitalRow['hospital_name'];
    }
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $doctorId = $row["id"];
        $doctorName = $row["name"];
        $age = $row['age'];
        $degree = $row['degree'];
        $spec = $row["specialization"];
        $contact = $row["contact"];
    } else {

        $doctorId = "N/A";
        $doctorName = "N/A";
        $degree = "N/A";
        $spec = "N/A";
        $bloodGroup = "N/A";
        $contact = "N/A";
    }
    $message = isset($_GET['message']) ? $_GET['message'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/details.css">
    <link rel="stylesheet" href="styles/docdet.css">
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
                        <a href="login.php">Log out</a>
                    </nav>
                </div>
            </header>
            <main>
                <div class="wrapbox">
                    <article class="article-one">
                        <header>
                            <h2>Welcome, <?php echo $doctorName; ?>!</h2>
                            <div class="patient">
                                <div class="piece">
                                    <p>Doctor ID: <?php echo $doctorId; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Name: <?php echo $doctorName; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Age: <?php echo $age; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Degree: <?php echo $degree; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Specialty: <?php echo $spec; ?></p>
                                </div>
                                <div class="piece">
                                    <p>Contact: <?php echo $contact; ?></p>
                                </div>
                                <div class="piece">
                                    <?php if (!empty($hospitals)) { ?>
                                        <p>Hospital(s): <?php echo implode(', ', $hospitals); ?></p>
                                    <?php } else { ?>
                                        <p>Hospitals: None</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <a href="check_doctor_appointments.php"><button type="button" id="app">Check Appointments</button></a>
                            <a href="php_scripts/delete_doctor.php"><button style="color: red;" type="button" id="app">Delete Account</button></a>
                            <a href="#"><button type="button" id="showButton" onclick="showForm()">Update Contact</button></a>
                            <div style="display:none; margin-top: 50px;" id="formContainer" class="form-container">
                                <form action="php_scripts/update_doctor_contact.php" method="post">
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
                            <div class="showf">
                                <p style="color: white;">Start by joining a couple of hospitals to work for</p>
                                <a><button type="button" id="showform" onclick="showhospitalform()">Show</button></a>
                                <div class="msg">
                                    <p style="color: white;"><?php echo $message; ?></p>
                                </div>
                            </div>
                            <div class="fullform" id="hospitalemployment">
                                <div class="formwrap">
                                    <form action="php_scripts/hopsitaljoin.php" method="post" class="form">
                                        <div class="inp">
                                            <label for="hospital">Select a hospital to join: </label>
                                            <div class="input-container">
                                                <select name="hospital" id="hospital">
                                                    <?php
                                                        require_once('php_scripts/connect.php');
                                                        $sql = 'SELECT name, address FROM hospital';
                                                        $output = $conn->query($sql);
                                                        if ($output->num_rows > 0) {
                                                            while ($row = $output->fetch_assoc()) {
                                                                $hospital = $row["name"];
                                                                $address = $row["address"];
                                                                echo "<option value='" . $hospital . "|" . $address . "'>" . $hospital . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option>No Hospitals Available</option>";
                                                        }
                                                        $conn->close();
                                                    ?>
                                                </select><br><br>
                                            </div>
                                        </div>
                                        <button style="padding: 5px 10px; width: 100px; height: 30px; border-radius:0px;">Confirm</button>
                                    </form>
                                </div>
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