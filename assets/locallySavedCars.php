<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/13/2018
 * Time: 9:05 AM
 */
session_start();
include_once "dbconnect.php";
include_once "functions.php";

$db = dbconnect();

$save = "<table>";
foreach ($_SESSION['lsc'] as $saved) {
    $save .= locallySavedCar($db, $saved);
}
$save .= "</table>";

echo $save;