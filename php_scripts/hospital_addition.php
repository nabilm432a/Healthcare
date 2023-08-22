<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $addr = $_POST['address'];
    $contact = $_POST['contact'];
    
    $sql = "INSERT INTO hospital VALUES ('$name', '$addr', $contact)";
    if ($conn->query($sql)) {
            $message = "'$name' added.";
            mysqli_close($conn);

            header("Location: ../forms/add_hospital.php?message=" . urlencode($message));
            exit();
        } else {
            $message = "Unable to register. Please try again.";
            mysqli_close($conn);

            header("Location: ../forms/add_hospital.php?message=" . urlencode($message));
            exit();
        }
?>