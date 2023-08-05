<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="main_style.css">
    <link rel="stylesheet" href="forms.css">
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
                        <a href="index.php">Home</a>
                    </nav>
                </div>
            </header>
            <main>
                <article class="article-one">
                    <h1>Enter your details: </h1>
                    <div class="formwrap">
                        <form action="doctor_join.php" method="post" class="form">
                            <div class="inp">
                                <label for="name">Name: </label>
                                <input type="text" name="name" required/><br><br>
                            </div>
                            <div class="inp">
                                <label for="age">Age: </label>
                                <input type="number" name="age" required/><br><br>
                            </div>
                            <div class="inp">
                                <label for="degree">Degree: </label>
                                <input type="text" name="degree" required/><br><br>
                            </div>
                            <div class="inp">
                                <label for="spec">Specialization: </label>
                                <input type="text" name="spec" required/><br><br>
                            </div>
                            <div class="inp">
                                <label for="Contact">Contact number: </label>
                                <input type="number" name="contact" required/><br><br>
                            </div>
                            
                            <input type="submit" class="formsubmit" value="Join"/>
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
                    <a href="credits.php">About Us</a>
                    <a href="#">Hospitals</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>