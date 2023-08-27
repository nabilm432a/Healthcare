<?php
    session_start();
    require_once("connect.php");
    $error = '';

    $id = $_POST["id"];
    $password = $_POST["password"];
    
    $query = "SELECT id FROM doctor WHERE id = $id AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Successful login
        $_SESSION["id"] = $id;
        $_SESSION["user_type"] = "doctor";
        header("Location: ../doctor_details.php");
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid ID or password.";
    }

    $conn->close();
?>

</body>
</html>
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
                <article class="invalid-pass">
                    <?php echo $error; ?>
                    <p><a href="../forms/doctor_login.php">Go back to Login</a></p>
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