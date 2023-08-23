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
                            <form action="../php_scripts/doctor_loginscript.php" method="post" class="form">
                                <div class="inp">
                                    <label for="id">ID(Input 5 digit ID): </label>
                                    <div class="input-container">
                                        <input type="text" name="id" pattern="[0-9]*" maxlength="5" required/><br><br>
                                    </div>
                                </div>
                                <div class="inp">
                                    <label for="password">Password: </label>
                                    <div class="input-container">
                                        <input type="password" name="password" required/><br><br>
                                    </div>
                                </div>
                                <input type="submit" class="formsubmit" value="Enter"/>
                            </form>
                            <a href="doctor_signup.php"><button style="padding: 5px 10px; width: 100px; height: 30px; font-size: 0.6rem;">Sign Up instead</button></a>
                            <div class="message-container">
                                <?php
                                    session_start();
                                    
                                    if (isset($_SESSION["message"])) {
                                        echo $_SESSION["message"];
                                        unset($_SESSION["message"]);
                                    }
                                ?>
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