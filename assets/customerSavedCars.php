<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 2/14/2018
 * Time: 8:23 AM
 */
include_once ('customerHeader.php');
include_once ('functions.php');
include_once ('dbconnect.php');
$db = dbconnect();
$customer_id = $_SESSION['username'];

echo "<h1>Your Saved cars:</h1>";
echo displaySavedCars($db, $customer_id);
include_once ('footer.html');