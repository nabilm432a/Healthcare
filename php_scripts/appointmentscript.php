<?php
    session_start();
    require_once('connect.php');
    
    $patientId = $_POST['patient_id'];

    $selectedDoctorId = $_POST['doctor'];

    $selectedtest = $_POST['selected_test'];
    $presql = "SELECT start_time FROM doctor where id=$selectedDoctorId";
	$pre_result = $conn->query($presql);
	if ($pre_result->num_rows>0) {
		$one = $pre_result->fetch_assoc();
		$time = $one['start_time'];
	}
    

	$hospital = $_POST['selected_hospital'];
	
	$doctime = $conn->query("SELECT name, slot, start_time, end_time from doctor where id = $selectedDoctorId");
	if ($doctime->num_rows == 1) {
		$rows = $doctime->fetch_assoc();
		$docname = $rows['name'];
		$available_slot = $rows['slot'];
		$start = $rows['start_time'];
		$end = $rows['end_time'];
	}
	
	
	if ($available_slot < 5) {
		if ($time >= $start && $time <= $end) {
			$q = $conn->query("SELECT fee from test where name='$selectedtest'");
			if ($q->num_rows == 1) {
				$row = $q->fetch_assoc();
				$fee = $row["fee"];
			}
			$sql = "INSERT IGNORE INTO appointment VALUES ($patientId, $selectedDoctorId, '$selectedtest', $fee, '$time', 'No', '$hospital')";
			$sql2 = "UPDATE doctor set start_time = DATE_ADD(start_time, INTERVAL 30 MINUTE)";
			if ($conn->query($sql)) {
				if ($conn->affected_rows > 0) {
					$slot_increment = "UPDATE doctor SET slot = slot + 1 where id=$selectedDoctorId";
					$conn->query($sql2);
					$conn->query($slot_increment);
					$message = "Your appointment is created for $time and you owe $$fee, please reach $hospital before the appointed time";
				} else {
					$message = "You already have an appointment for $selectedtest with Dr. $docname";
				}
				mysqli_close($conn);

				header("Location: ../forms/appointment_selecttest.php?message=" . urlencode($message));
				exit();
			} else {
				$message = "Unable to create an appointment. Please try again.";
				mysqli_close($conn);

				header("Location: ../forms/appointment_selecttest.php?message=" . urlencode($message));
				exit();
			}
		} else {
			mysqli_close($conn);
			$message = "Selected appointment time is outside of doctor's working hours.";
			header("Location: ../forms/appointment_selecttest.php?message=" . urlencode($message));
		}
	} else {
		mysqli_close($conn);
		$message = "This doctor cannot take anymore patients.";
		header("Location: ../forms/appointment_selecttest.php?message=" . urlencode($message));
	}
?>