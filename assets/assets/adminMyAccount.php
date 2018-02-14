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

    <h1>My Account</h1>

<?php
include_once ('../forms/editAccountForm.php');
include_once ("footer.html");
?>