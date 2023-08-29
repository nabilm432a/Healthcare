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
                    </nav>
                </div>
            </header>
            <main>
                <div class="wrapbox">
                    <article class="buttongroup">
                        <header>
                            <a href="adminpage.php"><button style="margin-top:5px;" type="button">Go back</button></a>
                        </header>
                        <div class="table-container">
                            <table class="table">
                                <tr>
                                    <th class="no-select">Patient ID</th>
                                    <th class="no-select">Doctor ID</th>
                                    <th class="no-select">Service</th>
                                    <th class="no-select">Charge</th>
                                    <th class="no-select">Payment Completed?</th>
                                    <th class="no-select">Hospital</th>
                                    <th class="no-select">Actions</th>
                                </tr>
                                <?php
                                require_once("php_scripts/connect.php");
                                $currentDate = date("F d, Y");
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["patient_key"])) {
                                    $deletepat = $_POST["patient_key"];
                                    $deletedoc = $_POST['doctor_key'];
                                    $deletetest = $_POST['test_key'];
                                    $deleteSql = "DELETE FROM appointment WHERE patient_id = $deletepat AND doctor_id = $deletedoc AND test_name = '$deletetest'";
                                    if ($conn->query($deleteSql) === TRUE) {
                                        echo "Record deleted successfully.";
                                    } else {
                                        echo "Error deleting record: ";
                                    }
                                }

                                $sql = "SELECT patient_id, doctor_id, test_name, total_charge, payment_status, hospital_name FROM appointment";
                                $result = $conn->query($sql);
                                echo "Appointments for " . $currentDate;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row['payment_status'] === 'Yes') {
                                            echo "<tr>";
                                            echo "<td>" . $row["patient_id"] . "</td>";
                                            echo "<td>" . $row["doctor_id"] . "</td>";
                                            echo "<td>" . $row["test_name"] . "</td>";
                                            echo "<td>" . $row["total_charge"] . "</td>";
                                            echo "<td>" . $row["payment_status"] . "</td>";
                                            echo "<td>" . $row["hospital_name"] . "</td>";
                                            echo "<td>
                                                    <form method='POST'>
                                                        <input type='hidden' name='patient_key' value='" . $row["patient_id"] . "'>
                                                        <input type='hidden' name='doctor_key' value='" . $row["doctor_id"] . "'>
                                                        <input type='hidden' name='test_key' value='" . $row["test_name"] . "'>
                                                        <button type='submit'>Delete</button>
                                                    </form>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No Appointments to display.</td></tr>";
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