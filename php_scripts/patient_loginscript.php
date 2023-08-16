<?php
    session_start();
    require_once("connect.php");
    $error = '';

    $id = $_POST["id"];
    $password = $_POST["password"];
    
    $query = "SELECT id FROM patient WHERE id = $id AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Successful login
        $_SESSION["id"] = $id;
        header("Location: ../patient_details.php");
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid ID or password.";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Status</title>
</head>
<body>
    <?php echo $error; ?>
    <p><a href="../patientlogin.php">Go back to Login</a></p>
</body>
</html>
