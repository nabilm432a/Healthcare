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
                    <p>Only by registering as a patient you will be able to make use of our services.</p>
                    <div class="formwrap">
                        <form action="../php_scripts/patient_entry.php" method="post" class="form">
                            <div>
                                <label for="name">Name: </label>
                                <div class="input-container">
                                    <input type="text" name="name" required/><br><br>
                                </div>
                            </div>
                            <div>
                                <label for="age">Age: </label>
                                <div class="input-container">
                                    <input type="number" name="age" required/><br><br>
                                </div>
                            </div>

                            <div>
                                <label for="gender">Gender: </label>
                                <div class="input-container">
                                    <select name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select><br><br>
                                </div>
                            </div>

                            <div>
                                <label for="bloodgroup">Choose a Blood Group:</label>
                                <div class="input-container">
                                    <select name="bloodgroup" id="bloodgroup">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select><br><br>
                                </div>
                            </div>
                            <div>
                                <label for="Contact">Contact number: </label>
                                <div class="input-container">
                                    <input type="tel" name="contact" pattern="[0-9]{11}" maxlength="11" required/><br><br>
                                </div>
                            </div>
                            <div class="inp">
                                <label for="password">Password: </label>
                                <div class="input-container">
                                    <input type="password" name="password" required/><br><br>
                                </div>
                            </div>
                            <input type="submit" class="formsubmit" value="Submit"/>
                        </form>
                        <a href="patient_login.php"><button style="padding: 5px 10px; width: 100px; height: 30px; font-size: 0.6rem;">Log In</button></a>
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
                    <a href="../patients_list.php">Check Patients</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>