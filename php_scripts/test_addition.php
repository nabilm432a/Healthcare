<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $fee = $_POST['fee'];

    
    $sql = "INSERT INTO test VALUES ('$name', $fee)";
    if ($conn->query($sql)) {
            $message = "'$name' added.";
            mysqli_close($conn);

            header("Location: ../forms/add_test.php?message=" . urlencode($message));
            exit();
        } else {
            $message = "Unable to register. Please try again.";
            mysqli_close($conn);

            header("Location: ../forms/add_test.php?message=" . urlencode($message));
            exit();
        }
?>