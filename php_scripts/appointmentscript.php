<?php
    session_start();
    require_once('connect.php');
    
    $patientId = $_POST['patient_id'];

    $selectedDoctorId = $_POST['doctor'];

    $selectedtest = $_POST['test'];
    
    $time = $_POST['app_time'];
	
	$doctime = $conn->query("SELECT name, start_time, end_time from doctor where id = $selectedDoctorId");
	if ($doctime->num_rows == 1) {
		$rows = $doctime->fetch_assoc();
		$docname = $rows['name'];
		$start = $rows['start_time'];
		$end = $rows['end_time'];
	}
	
	
	
	if ($time >= $start && $time <= $end) {
		$q = $conn->query("SELECT fee from test where name='$selectedtest'");
		if ($q->num_rows == 1) {
			$row = $q->fetch_assoc();
			$fee = $row["fee"];
		}
		$sql = "INSERT IGNORE INTO appointment VALUES ($patientId, $selectedDoctorId, '$selectedtest', $fee, '$time', 'No')";

		if ($conn->query($sql)) {
			if ($conn->affected_rows > 0) {
				$message = "Your appointment is created for $time and you owe $$fee";
			} else {
				$message = "You already have an appointment for $selectedtest with Dr. $docname";
			}
			mysqli_close($conn);

			header("Location: ../forms/appointment.php?message=" . urlencode($message));
			exit();
		} else {
			$message = "Unable to create an appointment. Please try again.";
			mysqli_close($conn);

			header("Location: ../forms/appointment.php?message=" . urlencode($message));
			exit();
		}
	} else {
		mysqli_close($conn);
		$message = "Selected appointment time is outside of doctor's working hours.";
		header("Location: ../forms/appointment.php?message=" . urlencode($message));
	}
?>