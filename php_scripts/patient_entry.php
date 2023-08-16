<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood = $_POST['bloodgroup'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    
    $sql = "INSERT INTO patient (name, age, gender, bloodgroup, contact, password) VALUES ('$name', '$age', '$gender', '$blood', '$contact', '$password')";

    if ($conn->query($sql)) {
        $getid_query = "SELECT id FROM patient ORDER BY id DESC LIMIT 1";
        $getid_result = $conn->query($getid_query);

        $row = $getid_result->fetch_assoc();
        $getid = $row['id'];
        $message = "Inserted Successfully, Your ID is $getid";

        mysqli_close($conn);

        header("Location: ../forms/patient_signup.php?message=" . urlencode($message));
        exit();
    } else {
        $message = "Insertion Failed: ";
        mysqli_close($conn);

        header("Location:../forms/patient_signup.php?message=" . urlencode($message));
        exit();
    }
?>