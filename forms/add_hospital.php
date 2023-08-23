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
                        <a href="../change_hospitals.php">Back</a>
                    </nav>
                </div>
            </header>
            <main>
                <div class="wrapbox">
                    <article class="article-one">
                    <h1>Enter the information for the Hospital: </h1>
                    <div class="form">
                        <div class="formwrap">
                            <form action="../php_scripts/hospital_addition.php" method="post" class="form">
                                <div class="inp">
                                    <label for="name">Name: </label>
                                    <div class="input-container">
                                        <input type="text" name="name" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="age">Address: </label>
                                    <div class="input-container">
                                        <input type="text" name="address" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="Contact">Contact number: </label>
                                    <div class="input-container">
                                        <input type="tel" name="contact" pattern="[0-9]{11}" maxlength="11" required/><br><br>
                                    </div>
                                </div>
                                <input type="submit" class="formsubmit" value="Submit"/>
                            </form>
                            <div class="msg">
                                <p><?php echo $message; ?></p>
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