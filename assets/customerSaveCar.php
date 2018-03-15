<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 2/16/2018
 * Time: 9:52 AM
 */
include_once ("customerHeader.php");
include_once("functions.php");
include_once("dbconnect.php");
$db = dbconnect();

$car_id = filter_input(INPUT_GET, 'car_id', FILTER_SANITIZE_STRING) ?? "";
$customer_id = $_SESSION['username'];
$datet = date("Y/m/d");

$sql = $db->prepare("INSERT INTO saved_cars VALUES(null, :car_id, :customer_id, :datet)");
$sql->bindParam(':customer_id', $customer_id);
$sql->bindParam(':car_id', $car_id);
$sql->bindParam(':datet', $datet);

if($sql->execute() && $sql->rowCount() == 1) {
    echo"<script>window.location='customerViewACar.php?car_id=" . $car_id . "'</script>";
}