<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/hospital_list.css">
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
                    </nav>
                </div>
            </header>
        </div>
        <main>
            <div class="hospitals-list">
                <?php
                    require_once('php_scripts/connect.php');
                    $sql = "SELECT name, address, contact FROM hospital";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="hospital-box">';
                            echo '<h3>' . $row["name"] . '</h3>';
                            echo '<p>Address: ' . $row["address"] . '</p>';
                            echo '<p>Contact: ' . $row["contact"] . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo "No Hospitals found.";
                    }

                    $conn->close();
                ?>
            </div>
        </main>

        <footer style="opacity: 100%; border-radius: 0;" class="footer-main">
            <div class="wrapper">
                <p>CSE370: Database Systems</p>
                <nav class="nav-horizontal">
                    <a href="credits.php">About Us</a>
                </nav>
            </div>
        </footer>

</body>

</html>