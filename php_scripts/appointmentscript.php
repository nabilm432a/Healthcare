<?php
    session_start();
    require_once('connect.php');
    
    $patientId = $_POST['patient_id'];

    $selectedDoctorId = $_POST['doctor'];

    $selectedtest = $_POST['test'];
    
    $time = $_POST['app_time'];

    $q = $conn->query("SELECT fee from test where name='$selectedtest'");
    if ($q->num_rows == 1) {
        $row = $q->fetch_assoc();
        $fee = $row["fee"];
    }
    $sql = "INSERT INTO appointment VALUES ($patientId, $selectedDoctorId, '$selectedtest', $fee, '$time', 'No')";

    if ($conn->query($sql)) {
        $message = "Your appointment is created for $time and you owe $$fee";

        mysqli_close($conn);

        header("Location: ../forms/appointment.php?message=" . urlencode($message));
        exit();
    } else {
        $message = "Unable to create an appointment. Please try again.";
        mysqli_close($conn);

        header("Location: ../forms/appointment.php?message=" . urlencode($message));
        exit();
    }
?>