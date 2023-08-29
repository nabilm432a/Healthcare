<?php
    session_start();    


    require_once('connect.php');
    

    if (!isset($_SESSION["id"])) {
        header("Location: ../patient_details.php");
        exit();
    }
    

    $session_id = $_SESSION["id"];

    $query = "DELETE FROM patient where id = $session_id";


    if ($conn->query($query)) {
        $_SESSION["message"] = "Patient record deleted successfully.";
    } else {
        $_SESSION["message"] = "Error";
    }

    header("Location: ../forms/patient_login.php");
    exit();
?>