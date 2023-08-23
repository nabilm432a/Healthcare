<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms.css">
    <link rel="stylesheet" href="../styles/select.css">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/artboard_1_9X7_icon.ico" />
    <script src="../scripts/script.js"></script>
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
                        <a href="../index.php">Home</a>
                    </nav>
                </div>
            </header>
            <main>
                <article class="article-one">
                    <h1>Making an Appointment</h1>
                    <div class="formwrap">
                        <form action="appointment_selectdoctor.php" method="post" class="form" id="appointmentForm" onsubmit="return validatehospitalform();">
                            <div>
                                <input type="hidden" name="patient_id" value="<?php echo $_POST['patient_id']; ?>">
                                <input type="hidden" name="selected_test" value="<?php echo $_POST['test']; ?>">
                            </div>
                            <div>
                                <label for="test">Which Hospital would you like to go to: </label>
                                <div class="input-container">
                                    <select name="hospital" id="hospital">
                                        <?php
                                            require_once('../php_scripts/connect.php');
                                            $test = $_POST['test'];
                                            $sql = "SELECT hospital_name FROM hospital_test where test_name = '$test'";
                                            $output = $conn->query($sql);
                                            if ($output->num_rows > 0) {
                                                while ($r = $output->fetch_assoc()) {
                                                    $hospitalname = $r["hospital_name"];
                                                    echo "<option value='" . $hospitalname . "'>" . $hospitalname . "</option>";
                                                }
                                            } else {
                                                echo "<option>This test does not exist in any hospital</option>";
                                            }
                                            $conn->close();
                                        ?>
                                    </select><br><br>
                                </div>
                            </div>
                            <input type="submit" class="formsubmit" value="Submit"/>
                        </form>
                    </div>
                </article>

            </main>
        </div>

        <footer class="footer-main">
            <div class="wrapper">
                <p>CSE370: Database Systems</p>
                <nav class="nav-horizontal">
                    <a href="../credits.php">About Us</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>