<?php
require_once('connect.php');

if(isset($_POST['hospital'])) {
    $selectedHospital = $_POST['hospital'];
    
    $sql = "SELECT address FROM hospital WHERE name = '$selectedHospital'";
    $output = $conn->query($sql);
    
    if ($output->num_rows > 0) {
        while ($r = $output->fetch_assoc()) {
            $hospitaladdr = $r["address"];
            echo "<option value='" . $hospitaladdr . "'>" . $hospitaladdr . "</option>";
        }
    } else {
        echo "<option>No Addresses Available</option>";
    }
}
$conn->close();
?>
