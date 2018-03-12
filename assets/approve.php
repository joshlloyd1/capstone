<?php
session_start();
include_once ("adminHeader.php");
include_once("functions.php");
include_once("dbconnect.php");

$db = dbconnect();

$appointment_id = filter_input(INPUT_GET, 'appointment_id', FILTER_SANITIZE_STRING) ?? "";

$sql = $db->prepare("UPDATE Appointments SET approve = 1 WHERE appointment_id = :appointment_id");
$sql->bindParam(':appointment_id', $appointment_id);
if($sql->execute() && $sql->rowCount() == 1) {
    //header("Location: adminAppointments.php");
    echo'<script>window.location="adminAppointments.php";</script>';
}