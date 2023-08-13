<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="main_style.css">
    <link rel="stylesheet" href="table.css">
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
                        <a href="index.php">Home</a>
                        <a href="d_admission.php" title="Join our appointment system as a doctor">Join</a>
                    </nav>
                </div>
            </header>
            <main>
                <h2 style="text-decoration: underline; margin-left: 100px;">List of Patients Currently in admission</h2>
                <div class="table-container">
                    <table class="patienttable">
                        <tr>
                            <th class="no-select">ID</th>
                            <th class="no-select">Name</th>
                            <th class="no-select">Age</th>
                            <th class="no-select">Gender</th>
                            <th class="no-select">Blood Group</th>
                            <th class="no-select">Contact</th>
                        </tr>
                        <?php
                        require_once("connect.php");
                        $sql = "SELECT * FROM patient";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td style='padding: 10px;'>" . $row["id"] . "</td>";
                                echo "<td style='padding: 10px;'>" . $row["name"] . "</td>";
                                echo "<td style='padding: 10px;'>" . $row["age"] . "</td>";
                                echo "<td style='padding: 10px;'>" . $row["gender"] . "</td>";
                                echo "<td style='padding: 10px;'>" . $row["bloodgroup"] . "</td>";
                                echo "<td style='padding: 10px;'>" . $row["contact"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No Patients have admitted yet.</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </table>
                </div>
            </main>
        </div>

        <footer class="footer-main">
            <div class="wrapper">
                <p>CSE370: Database Systems</p>
                <nav class="nav-horizontal">
                    <a href="#">Hospitals</a>
                </nav>
            </div>
        </footer>

    </div><!--container-->

</body>



</html>