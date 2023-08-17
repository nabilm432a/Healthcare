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
    <link rel="stylesheet" href="../styles/forms.css">
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
                    <p>Please ensure you have admitted to our services, otherwise you will not be able to make an appointment</p>
                    <div class="formwrap">
                        <form action="#" method="post" class="form">
                            <div>
                                <label for="name">Name: </label>
                                <div class="input-container">
                                    <input type="text" name="name" required/><br><br>
                                </div>
                            </div>
                            <div>
                                <label for="id">ID: </label>
                                <div class="input-container">
                                    <input type="number" name="id" required/><br><br>
                                </div>
                            </div>
                            <div>
                                <label for="doctor">Doctor: </label>
                                <div class="input-container">
                                    <select name="doctor" id="doctor">
                                        <?php
                                        require_once('../php_scripts/connect.php');
                                        $sql = 'SELECT name from doctor';
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nameValue = $row["name"];
                                                $displayText = "Dr. " . $nameValue;
                                                echo "<option value='" . $nameValue . "'>" . $displayText . "</option>";
                                            }
                                        } else {
                                            echo "<option>No Doctors Available</option>";
                                        }
                                        $conn->close();
                                        ?>
                                    </select><br><br>
                                </div>
                            </div>
                            <div>
                                <label for="test">Test: </label>
                                <div class="input-container">
                                    <input type="text" name="test" required/><br><br>
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
                    <a href="#">Hospitals</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>