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
            <a href="index_doctorsearch.php"><- Go Back</a>
            <div class="doc-list">
                <?php
                    require_once('php_scripts/connect.php');
                    $specialty = $_POST['specialty'];
                    $sql = "SELECT name, degree, specialization, contact, start_time, end_time FROM doctor where specialization='$specialty'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="doc-box">';
                            echo '<h3>' . $row["name"] . '</h3>';
                            echo '<p>Degree: ' . $row["degree"] . '</p>';
                            echo '<p>Specialty: ' . $row["specialization"] . '</p>';
                            echo '<p>Contact: ' . $row["contact"] . '</p>';
                            echo '<p>Available from: ' . $row["start_time"] . ' to ' . $row["end_time"] . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo "No Doctors found.";
                    }

                    $conn->close();
                ?>
            </div>
        </main>

        <footer style="border-radius: 0;" class="footer-main">
            <div class="wrapper">
                <p>CSE370: Database Systems</p>
                <nav class="nav-horizontal">
                    <a href="credits.php">About Us</a>
                </nav>
            </div>
        </footer>

</body>

</html>