<?php
    require_once("php_scripts/connect.php");


    $patientId = $_GET["patient_id"];
    $DoctorId = $_GET["doctor_id"];
    $test_name = $_GET["test_name"];

    if (isset($_GET["confirm"]) && $_GET["confirm"] == "true") {
        $query = "DELETE FROM appointment WHERE patient_id = $patientId AND doctor_id = $DoctorId AND test_name = '$test_name'";
        if ($conn->query($query)) {
            $_SESSION["message"] = "Cancelled.";
        } else {
            $_SESSION["message"] = "Cancel Failed.";
        }
        
        // Redirect back to the page after deletion
        header("Location: appointment_table.php");
        exit();
    } else {
        header("Location: ../doctor_details.php");
        exit();
    }
?>
