<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 3/9/2018
 * Time: 9:51 AM
 */

include_once("dbconnect.php");

$car_id = filter_input(INPUT_GET, 'car_id', FILTER_SANITIZE_STRING) ?? "";

$db = dbconnect();

$sql = $db->prepare("DELETE FROM saved_cars WHERE car_id = :car_id");
$sql->bindParam(':car_id', $car_id);
if($sql->execute()) {
    //header("Location: adminAppointments.php");
    echo'<script>window.location="customerSavedCars.php";</script>';
} else {
    echo "<h4>We were unable to unsave your car <a href='/htdocs/capstone/index.php'>Return to home page</a> </h4>";
}