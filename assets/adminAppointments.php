<?php
/**
 * Created by PhpStorm.
 * User: iotenti
 * Date: 2/4/2018
 * Time: 3:09 PM
 */
session_start();

include_once ("adminHeader.php");
include_once("functions.php");
include_once("dbconnect.php");
$db = dbconnect();

?>
    <div style="background-color: #6F7784; height:60px; width:100%"> </div><br><br>
    <h1>My Appointments</h1>
<?php
echo myAppointments($db, $_SESSION['employee_id']);

include_once ("footer.html");
?>