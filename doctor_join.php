<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $age = $_POST['age'];
    $degree = $_POST['degree'];
    $spec = $_POST['specialization'];
    $contact = $_POST['contact'];

    
    $sql = "INSERT INTO doctor (name, age, degree, specialization, contact) VALUES ('$name', '$age', '$degree', '$spec', '$contact')";

    if($conn->query($sql)){
        $message = "Congratulations, You are now a doctor";
    }
    else{
        $message = "Sorry, we could not enroll you due to an error";
    }

    mysqli_close($conn);
    header("Location: d_admission.php?message=" . urlencode($message));
    exit;
?>