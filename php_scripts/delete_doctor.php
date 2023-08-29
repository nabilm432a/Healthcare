<?php
    session_start();


    require_once('connect.php');

    if (!isset($_SESSION["id"])) {
        header("Location: ../doctor_details.php");
        exit();
    }

    $session_id = $_SESSION["id"];

    $query = "DELETE FROM doctor WHERE id = $session_id";

    if ($conn->query($query)) {
        $_SESSION["message"] = "Doctor record deleted successfully.";
    } else {
        $_SESSION["message"] = "Error";
    }

    header("Location: ../forms/doctor_login.php");
    exit();

?>
