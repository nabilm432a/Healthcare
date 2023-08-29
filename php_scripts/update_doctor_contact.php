<?php
    session_start();
    require_once('connect.php');

    $newnum = $_POST["new_contact"];

    if (!isset($_SESSION["id"])) {
        header("Location: ../doctor_details.php");
        exit();
    }

    $session_id = $_SESSION["id"];

    $query = "UPDATE doctor SET contact = '$newnum' WHERE id = $session_id";


    if ($conn->query($query)) {
        $_SESSION["message"] = "Updated contact";
    } else {
        $_SESSION["message"] = "Failed to update contact";
    }
    header("Location: ../doctor_details.php");
    exit();
?>