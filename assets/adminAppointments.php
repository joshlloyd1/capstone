<?php
session_start();

include_once ("adminHeader.php");
include_once("functions.php");
include_once("dbconnect.php");

$db = dbconnect();
?>
    <h1>My Appointments</h1>
<?php
echo myAppointments($db, $_SESSION['employee_id']);
?><?php
include_once ("footer.html");
?>