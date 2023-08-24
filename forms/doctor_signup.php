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
                    <h1>Enter your details: </h1>
                    <div class="doctorform">
                        <div class="formwrap">
                            <form action="../php_scripts/doctor_join.php" method="post" class="form">
                                <div class="inp">
                                    <label for="name">Name: </label>
                                    <div class="input-container">
                                        <input type="text" name="name" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="age">Age: </label>
                                    <div class="input-container">
                                        <input type="number" name="age" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="degree">Degree: </label>
                                    <div class="input-container">
                                        <input type="text" name="degree" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="spec">Specialty: </label>
                                    <div class="input-container">
                                        <input type="text" name="spec" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="Contact">Contact number: </label>
                                    <div class="input-container">
                                        <input type="tel" name="contact" pattern="[0-9]{11}" maxlength="11" required/><br><br>
                                    </div>
                                </div>
								<div class="inp">
                                    <label for="Contact">Appointment Start Time: </label>
                                    <div class="input-container">
                                        <input type="time" name="starttime" required/><br><br>
                                    </div>
                                </div>
								<div class="inp">
                                    <label for="Contact">Appointment End Time: </label>
                                    <div class="input-container">
                                        <input type="time" name="endtime" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="password">Password: </label>
                                    <div class="input-container">
                                        <input type="password" name="password" required/><br><br>
                                    </div>
                                </div>
                                <input type="submit" class="formsubmit" value="Join"/>
                            </form>
                            <a href="doctor_login.php"><button style="padding: 5px 10px; width: 100px; height: 30px; font-size: 0.6rem;">Log In</button></a>
                            <div class="msg">
                                <p><?php echo $message; ?></p>
                            </div>
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