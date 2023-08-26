<?php
require_once('connect.php');

$doc_id = $_POST['doctor_id'];
$pat_id = $_POST['patient_id'];
$test = $_POST['test_name'];

$sql = "UPDATE appointment SET payment_status='Yes' WHERE doctor_id=$doc_id AND patient_id=$pat_id AND test_name='$test'";
$conn->query($sql);
header('Location:../check_patient_appointments.php');
exit();
?>