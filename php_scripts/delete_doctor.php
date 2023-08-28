<?php
    //Continue a session to get the session id
    session_start();

    //Connect to database
    require_once('connect.php');

    //check if session id is available
    if (!isset($_SESSION["id"])) {
        header("Location: ../doctor_details.php");
        exit();
    }

    //assign session id to a variable
    $session_id = $_SESSION["id"];

    //store the query to delete the record where id is session id
    $query = "DELETE FROM doctor WHERE id = $session_id";

    //run the query
    if ($conn->query($query)) {
        $_SESSION["message"] = "Doctor record deleted successfully.";
    } else {
        $_SESSION["message"] = "Error";
    }

    //return to the login page
    header("Location: ../forms/doctor_login.php");
    exit();

?>
