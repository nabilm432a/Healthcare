<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/admin_table.css">
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
                        <a href="patient_details.php">Back</a>
                    </nav>
                </div>
            </header>
            <main>
                <div class="wrapbox">
                    <article class="buttongroup">
                        <div class="table-container">
                            <table class="table">
                                <tr>
                                    <th class="no-select">Doctor Name</th>
                                    <th class="no-select">Service</th>
                                    <th class="no-select">Total Charge</th>
                                    <th class="no-select">Payment Status</th>
                                    <th class="no-select">Time</th>
                                    <th class="no-select">Hospital</th>
                                    <th class="no-select">Actions</th>
                                </tr>
                                <?php
                                $currentDate = date("F d, Y");
                                session_start();
                                if (!isset($_SESSION["id"])) {
                                    header("Location: forms/doctor_login.php");
                                    exit();
                                }
                                $p_id = $_SESSION["id"];
                                require_once("php_scripts/connect.php");
                                
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["doctor_id"]) && isset($_POST["test_name"])) {
                                    $deleteId = $_POST['doctor_id'];
                                    $deletetest = $_POST['test_name'];
                                    $deleteSql = "DELETE FROM appointment WHERE doctor_id=$deleteId AND patient_id=$p_id AND test_name='$deletetest'";
                                    if ($conn->query($deleteSql) === TRUE) {
                                        echo "Appointment Cancelled.";
                                    } else {
                                        echo "Error cancelling appointment";
                                    }
                                }

                                $sql = "SELECT doctor_id, doctor.name as d_name, test_name, total_charge, payment_status, time, hospital_name FROM appointment JOIN doctor ON appointment.doctor_id=doctor.id WHERE patient_id=$p_id";
                                $result = $conn->query($sql);
                                echo "Appointments for " . $currentDate;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["d_name"] . "</td>";
                                        echo "<td>" . $row["test_name"] . "</td>";
                                        echo "<td>" . '$' . $row["total_charge"] . "</td>";
                                        echo "<td>" . $row["payment_status"] . "</td>";
                                        echo "<td>" . $row["time"] . "</td>";
                                        echo "<td>" . $row["hospital_name"] . "</td>";
                                        if ($row['payment_status']==='No') {
                                            echo "<td>
                                                    <form method='POST'>
                                                        <input type='hidden' name='doctor_id' value='" . $row["doctor_id"] . "'>
                                                        <input type='hidden' name='test_name' value='" . $row["test_name"] . "'>
                                                        <button type='submit'>Cancel</button>
                                                    </form>
                                                    <form action='forms/payment_form.php' method='POST'>
                                                        <input type='hidden' name='patient_id' value='" . $p_id . "'>
                                                        <input type='hidden' name='test_name' value='" . $row["test_name"] . "'>
                                                        <input type='hidden' name='doctor_id' value='" . $row["doctor_id"] . "'>
                                                        <input type='hidden' name='total_charge' value='" . $row["total_charge"] . "'>
                                                        <button type='submit' name='pay'>Pay</button>
                                                    </form>
                                                </td>";
                                        } else {
                                            echo "<td>
                                                    <form method='POST'>
                                                        <input type='hidden' name='doctor_id' value='" . $row["doctor_id"] . "'>
                                                        <input type='hidden' name='test_name' value='" . $row["test_name"] . "'>
                                                        <button type='submit'>Delete</button>
                                                    </form>
                                                </td>";
                                        }
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No active appointments.</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
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