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
                            <a href="forms/add_hospital.php"><button type="button">Add Hospital</button></a>
                            <a href="adminpage.php"><button style="margin-top:5px;" type="button">Go back</button></a>
                        </header>
                        <div class="table-container">
                            <table class="table">
                                <tr>
                                    <th class="no-select">Name</th>
                                    <th class="no-select">Address</th>
                                    <th class="no-select">Contact</th>
                                    <th class="no-select">Actions</th>
                                </tr>
                                <?php
                                require_once("php_scripts/connect.php");
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name_key"])) {
                                    $deletename = $_POST["name_key"];
                                    $deleteaddr = $_POST['address_key'];
                                    $deleteSql = "DELETE FROM hospital WHERE Name = '$deletename' and Address = '$deleteaddr'";
                                    if ($conn->query($deleteSql) === TRUE) {
                                        echo "Record deleted successfully.";
                                    } else {
                                        echo "Error deleting record: ";
                                    }
                                }

                                $sql = "SELECT * FROM hospital";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["Name"] . "</td>";
                                        echo "<td>" . $row["Address"] . "</td>";
                                        echo "<td>" . $row["Contact"] . "</td>";
                                        echo "<td>
                                                <form method='POST'>
                                                    <input type='hidden' name='name_key' value='" . $row["Name"] . "'>
                                                    <input type='hidden' name='address_key' value='" . $row["Address"] . "'>
                                                    <button type='submit'>Delete</button>
                                                </form>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No Hospitals Available.</td></tr>";
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