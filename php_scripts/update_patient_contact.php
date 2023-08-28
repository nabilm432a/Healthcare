<?php
    session_start();
    require_once('connect.php');

    //get new number from form input
    $newnum = $_POST["new_contact"];

    if (!isset($_SESSION["id"])) {
        header("Location: ../patient_details.php");
        exit();
    }
    $session_id = $_SESSION["id"];

    //store query to update the number
    $query = "UPDATE patient SET contact = '$newnum' WHERE id = $session_id";

    //run query
    if ($conn->query($query)) {
        $_SESSION["message"] = "Updated contact";
    } else {
        $_SESSION["message"] = "Failed to update contact";
    }
    header("Location: ../patient_details.php");
    exit();
?>