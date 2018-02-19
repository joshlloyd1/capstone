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
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$vendorId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? NULL;

$vendor = getVendor($db, $vendorId); //run function to get vendor that has been selected from dropdown -- return assoc array
//assign values to session vars
$_SESSION['vendor_id'] = $vendor['vendor_id'];
$_SESSION['vendor_name'] = $vendor['vendor_name'];
$_SESSION['vendor_contact_fname'] = $vendor['vendor_contact_fname'];
$_SESSION['vendor_contact_lname'] = $vendor['vendor_contact_lname'];
$_SESSION['vendor_email'] = $vendor['vendor_email'];
$_SESSION['vendor_phone'] = $vendor['vendor_phone'];
$_SESSION['vendor_country'] = $vendor['vendor_country'];
$_SESSION['vendor_city'] = $vendor['vendor_city'];
$_SESSION['vendor_state'] = $vendor['vendor_state'];
$_SESSION['vendor_zipcode'] = $vendor['vendor_zipcode'];

?>
    <div class="row" onload="showSelectVendorForm()">
        <div class="col-lg-4">
            <h1>Vendors</h1>
            <div class="btn-group" role="group" aria-label="vendorNav">
                <a class='btn btn-secondary' value="view" role="button" href="adminVendors.php">View</a>
                <a class='btn btn-secondary' value="view" role="button" href="adminVendors.php">Add</a>
                <button type='button' class='btn btn-secondary' value="edit">Edit</button>
            </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
    </div>
<?php

switch($action){
    case 'update':
        include_once("../forms/displaySelectVendorForm.php");
        include_once ("../forms/updateVendorsForm.php");

       // echo updateVendor($vendor); //update

        break;
}



include_once ("footer.html");
?>