<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 2/16/2018
 * Time: 9:52 AM
 */
include_once ("customerHeader.php.php");
include_once("functions.php");
include_once("dbconnect.php");
session_start();
$db = dbconnect();

$car_id = filter_input(INPUT_GET, 'car_id', FILTER_SANITIZE_STRING) ?? "";
$customer_id = $_SESSION('username');
$date = date("Y/m/d");

$sql = $db->prepare("INSERT INTO saved cars VALUES(null, :customer_id, :car_id, :date)");
$sql->bindParam(':customer_id', $customer_id);
$sql->bindParam(':car_id', $car_id);
$sql->bindParam(':date', $date);


if($sql->execute() && $sql->rowCount() == 1) {
    header("Location: #.php");
}