<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredId = $_POST["id"];
    $enteredPassword = $_POST["password"];

    if ($enteredId === "00000" && $enteredPassword === "12345") {
        header("Location: ../adminpage.php");
    } else {
        echo "Invalid ID or password.";
        header("Location: ../forms/adminlogin.php");
    }
}
?>