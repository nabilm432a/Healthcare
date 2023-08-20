<?php
    require_once('connect.php');
    session_start();
    $hospital_key = $_POST['hospital'];
    
    list($name, $address) = explode('|', $hospital_key);

    if (!isset($_SESSION["id"])) {
        header("Location: forms/doctor_details.php");
        exit();
    }
    $session_id = $_SESSION["id"];
    $sql = "INSERT IGNORE INTO doctor_works_at values ('$session_id','$name', '$address')";

    if ($conn->query($sql)) {
        if ($conn->affected_rows>0) {
            $message = "Successfully Joined. If you would like to join another please select below.";
        } else {
            $message = "You are already a part of this hospital, Try another hospital.";
        }
        mysqli_close($conn);
        header("Location: ../doctor_details.php?message=" . urlencode($message));
        exit();
    } else {
        $message = "Unable to Join. Please try again.";
        mysqli_close($conn);

        header("Location: ../doctor_details.php?message=" . urlencode($message));
        exit();
    }


?>