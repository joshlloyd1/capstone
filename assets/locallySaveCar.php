<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/13/2018
 * Time: 9:06 AM
 */
session_start();
include_once "dbconnect.php";

$car_id = filter_input(INPUT_GET, 'car_id', FILTER_SANITIZE_STRING) ?? "";

if (!isset($_SESSION['lsc'])) { // is it users first time?
    $_SESSION['lsc'][] = $car_id;
}
else {
    $_SESSION['lsc'][] .= $car_id; // if it isnt users first time, adds product to an session variable array
}
echo "<script>window.location='viewACar.php?car_id=" . $car_id . "'</script>";