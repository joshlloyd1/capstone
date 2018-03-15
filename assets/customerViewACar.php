<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 3/2/2018
 * Time: 9:28 AM
 */
include_once ("dbconnect.php");
include_once ("functions.php");
include_once ("customerHeader.php");
$db = dbconnect();


$car_id = filter_input(INPUT_GET, 'car_id', FILTER_SANITIZE_STRING) ?? "no";

echo customershowCarInfo($db, $car_id, "customer");
include_once ("footer.html");