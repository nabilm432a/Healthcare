<?php
    $message = isset($_GET['message']) ? $_GET['message'] : '';
    session_start();
    require_once('../php_scripts/connect.php');
    if (!isset($_SESSION["id"])) {
        header("Location: ../patient_details.php");
        exit();
    }
    $session_id = $_SESSION['id']



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms.css">
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
                        <form action="../php_scripts/appointmentscript.php" method="post" class="form" id="appointmentForm" onsubmit="return validateForm();">
                            <div>
                                <input type="hidden" name="patient_id" value="<?php echo $session_id; ?>">
                                <label for="doctor">Doctor: </label>
                                <div class="input-container">
                                    <select name="doctor" id="doctor">
                                        <?php
                                            require_once('../php_scripts/connect.php');
                                            $sql = 'SELECT id, name FROM doctor';
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
                            <div>
                                <label for="test">Test: </label>
                                <div class="input-container">
                                    <select name="test" id="test">
                                        <?php
                                            require_once('../php_scripts/connect.php');
                                            $sql2 = 'SELECT name, fee FROM test';
                                            $output = $conn->query($sql2);
                                            if ($output->num_rows > 0) {
                                                while ($r = $output->fetch_assoc()) {
                                                    $testname = $r["name"];
                                                    $fee = $r["fee"];
                                                    $dText = $testname . " [Fee: $" . $fee . "]";
                                                    echo "<option value='" . $testname . "'>" . $dText . "</option>";
                                                }
                                            } else {
                                                echo "<option>Tests Currently Unavailable</option>";
                                            }
                                            $conn->close();
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
                        <div class="msg">
                            <p><?php echo $message; ?></p>
                        </div>
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