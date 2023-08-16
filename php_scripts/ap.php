<?php
    require_once("connect.php");

    $id = $_POST['patient_id'];
    $doctor_name = $_POST['doctor_name'];
    $test = $_POST['test_name'];
    $selected_doctor = $_POST['doctor'];
    
    if($conn->query($sql)){
        $message = "Inserted Successfully";
    }
    else{
        $message = "Insertion Failed";
    }

    mysqli_close($conn);
    header("Location: p_admission.php?message=" . urlencode($message));
    exit;
?>