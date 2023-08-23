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
                    <form action="../php_scripts/adminlog.php" method="post" class="form">
                        <div class="inp">
                            <label for="id">ID: </label>
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