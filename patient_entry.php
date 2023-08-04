<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood = $_POST['bloodgroup'];
    $contact = $_POST['contact'];

    
    $sql = "INSERT INTO patient (name, age, gender, bloodgroup, contact) VALUES ('$name', '$age', '$gender', '$blood', '$contact')";

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