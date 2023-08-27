<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/credits.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/artboard_1_9X7_icon.ico" />
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
                        <?php
                            if (!isset($_SESSION["id"])) {
                                echo "<a href='forms/adminlogin.php'>Admin</a>";
                            }
                        ?>
                    </nav>
                </div>
            </header>
            <main>
                <div class="wrapper2">
                    <article class="article-two">
                        <header>
                            <h2 style="text-decoration: underline;">This Project was designed by</h2>
                            <h3>Group - 4</h3>
                            <p style="margin-left: 10px;">&#9728; Avishek Paul</p>
                            <p style="margin-left: 10px;">&#9728; Mitul Roy Tanny</p>
                            <p style="margin-left: 10px;">&#9728; Mantaqa Abedin</p>
                            <p style="margin-left: 10px;">&#9728; Nabil Hossain Chowdhury</p>
                        </header>
                    </article>
                </div>

            </main>
        </div>

        <footer class="footer-main">
            <div class="wrapper">
                <p>CSE370: Database Systems</p>
                <nav class="nav-horizontal">
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>