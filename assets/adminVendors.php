<?php
/**
 * Created by PhpStorm.
 * User: iotenti
 * Date: 2/4/2018
 * Time: 3:09 PM
 */

include_once ("adminHeader.php");
include_once("functions.php");
include_once("dbconnect.php");
$db = dbconnect();
$vendors = getVendorsAsTable($db);
?>

    <h1>Vendors</h1>


<?php
//echo $vendors;
include_once ("../forms/addVendorForm.php");
include_once ("footer.html");
?>