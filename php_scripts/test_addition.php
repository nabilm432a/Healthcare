<?php
    require_once("connect.php");

    $name = $_POST['name'];
    $fee = $_POST['fee'];
	$hospital = $_POST['hospitalname'];
	$findhospital = "SELECT address from hospital where name='$hospital'";
    $result = $conn->query($findhospital);
	$rows = $result->fetch_assoc();
	$hospitaladdress = $rows['address'];
    $sql = "INSERT INTO test VALUES ('$name', $fee)";
	$sql2 = "INSERT INTO hospital_test VALUES ('$hospital', '$hospitaladdress', '$name')";
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