<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $fee = $_POST['fee'];
	$hospitaln = $_POST['hospitalname'];
    $hospitala = $_POST['hospitaladdr'];

    $sql = "INSERT IGNORE INTO test VALUES ('$name', $fee)";
	$sql2 = "INSERT IGNORE INTO hospital_test VALUES ('$hospitaln', '$hospitala', '$name')";
    if ($conn->query($sql)) {
			$conn->query($sql2);
            $message = "'$name' added.";
            mysqli_close($conn);

            header("Location: ../forms/add_test.php?message=" . urlencode($message));
            exit();
        } else {
            $message = "Unable to register. Please try again.";
            mysqli_close($conn);

            header("Location: ../forms/add_test.php?message=" . urlencode($message));
            exit();
        }
?>