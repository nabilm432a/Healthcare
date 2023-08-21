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
                        <form action="../php_scripts/appointmentscript.php" method="post" class="form" id="appointmentForm">
                            <input type="hidden" name="patient_id" value="<?php echo $_POST['patient_id']; ?>">
                            <input type="hidden" name="selected_test" value="<?php echo $_POST['selected_test']; ?>">
                            <input type="hidden" name="selected_hospital" value="<?php echo $_POST['hospital']; ?>">
                            <div class="inp">
                                <label for="doctor">Doctor: </label>
                                <div class="input-container">
                                    <select name="doctor" id="doctor">
                                        <?php
                                            require_once('../php_scripts/connect.php');
                                            $hospitalname = $_POST['hospital'];
                                            $sql1 = "SELECT doctor_id FROM doctor_works_at where hospital_name = '$hospitalname'";
                                            $d_id_result = $conn->query($sql1);
                                            $d_id_row = $d_id_result->fetch_assoc();
                                            $d_id = $d_id_row["doctor_id"];

                                            $sql = "SELECT id, name FROM doctor where id = '$d_id'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $doctorId = $row["id"];
                                                    $nameValue = $row["name"];
                                                    $displayText = "Dr. " . $nameValue;
                                                    echo "<option value='" . $doctorId . "'>" . $displayText . "</option>";
                                                }
                                            } else {
                                                echo "<option>No Doctors Available</option>";
                                            }
                                        ?>
                                    </select><br><br>
                                </div>
                            </div>
                            <div class="inp">
                                <label for="app_time">Time: </label>
                                <div class="input-container">
                                    <input type="time" name="app_time" required/><br><br>
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
                    <a href="#">Hospitals</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>