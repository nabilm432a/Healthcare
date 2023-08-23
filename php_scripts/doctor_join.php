<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $age = $_POST['age'];
    $degree = $_POST['degree'];
    $spec = $_POST['spec'];
    $contact = $_POST['contact'];
	$start = $_POST['starttime'];
	$end = $_POST['endtime'];
    $password = $_POST['password'];

    
    $sql = "INSERT INTO doctor (name, age, degree, specialization, contact, slot, start_time, end_time, password) VALUES ('$name', '$age', '$degree', '$spec', '$contact', 0, '$start', '$end', '$password')";

    if ($conn->query($sql)) {
            $getid_query = "SELECT id FROM doctor ORDER BY id DESC LIMIT 1";
            $getid_result = $conn->query($getid_query);

            $row = $getid_result->fetch_assoc();
            $getid = $row['id'];
            $message = "Congratulations You are now a Doctor, Your ID is $getid";

            mysqli_close($conn);

            header("Location: ../forms/doctor_signup.php?message=" . urlencode($message));
            exit();
        } else {
            $message = "Unable to register. Please try again.";
            mysqli_close($conn);

            header("Location: ../forms/doctor_signup.php?message=" . urlencode($message));
            exit();
        }
?>