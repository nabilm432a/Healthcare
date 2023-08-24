<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/artboard_1_9X7_icon.ico" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <a href="../change_tests.php">Back</a>
                    </nav>
                </div>
            </header>
            <main>
                <div class="wrapbox">
                    <article class="article-one">
                        <h1>Enter the information for the Service: </h1>
                        <div class="form">
                            <div class="formwrap">
                                <form action="../php_scripts/test_addition.php" method="post" class="form">
                                    <div class="inp">
                                        <label for="hospitalname">Hospital: </label>
                                        <div class="input-container">
                                            <select name="hospitalname" id="hospitalname">
                                                <option value="" disabled selected>Select a Hospital</option>
                                                <?php
                                                    require_once('../php_scripts/connect.php');
                                                    $sql2 = 'SELECT name FROM hospital';
                                                    $output = $conn->query($sql2);
                                                    if ($output->num_rows > 0) {
                                                        while ($r = $output->fetch_assoc()) {
                                                            $hospitalname = $r["name"];
                                                            echo "<option value='" . $hospitalname . "'>" . $hospitalname . "</option>";
                                                        }
                                                        
                                                    } else {
                                                        echo "<option>No Hospitals Available</option>";
                                                    }
                                                ?>
                                            </select><br><br>
                                        </div>
                                    </div>
                                    <div class="inp">
                                        <label for="hospitaladdr">Hospital: </label>
                                        <div class="input-container">
                                            <select name="hospitaladdr" id="hospitaladdr">
                                                <option value="" selected disabled>Select a Hospital First</option>
                                            </select><br><br>
                                        </div>
                                    </div>
                                    <div class="inp">
                                        <label for="name">Service Name: </label>
                                        <div class="input-container">
                                            <input type="text" name="name" required/><br><br>
                                        </div>
                                    </div>
                                    <div class="inp">
                                        <label for="fee">Fee: </label>
                                        <div class="input-container">
                                            <input type="number" name="fee" required/><br><br>
                                        </div>
                                    </div>
                                    <input type="submit" class="formsubmit" value="Submit"/>
                                </form>
                                <div class="msg">
                                    <p><?php echo $message; ?></p>
                                </div>
                        </div>
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