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
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$vendorName = filter_input(INPUT_POST, 'vendorName', FILTER_SANITIZE_STRING) ?? NULL;
$vendorContactFname = filter_input(INPUT_POST, 'vendorContactFname', FILTER_SANITIZE_STRING) ?? NULL;
$vendorContactLname = filter_input(INPUT_POST, 'vendorContactLname', FILTER_SANITIZE_STRING) ?? NULL;
$vendorPhone = filter_input(INPUT_POST, 'vendorPhone', FILTER_SANITIZE_STRING) ?? NULL;
$vendorEmail = filter_input(INPUT_POST, 'vendorEmail', FILTER_SANITIZE_STRING) ?? NULL;
$vendorCountry = filter_input(INPUT_POST, 'vendorCountry', FILTER_SANITIZE_STRING) ?? NULL;
$vendorCity = filter_input(INPUT_POST, 'vendorCity', FILTER_SANITIZE_STRING) ?? NULL;
$vendorZipCode = filter_input(INPUT_POST, 'vendorZipCode', FILTER_SANITIZE_STRING) ?? NULL;
$vendorState = filter_input(INPUT_POST, 'vendorState', FILTER_SANITIZE_STRING) ?? NULL;
$vendorId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? NULL;

echo $vendorId;
echo $vendorCity;
echo $action;

?>
    <div class="row">
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
//include_once ("../forms/updateVendorsForm.php");
switch($action){
    case 'update':
        echo getVendorUpdateForm($db, $vendorId); //use primary key to get vendor from vendors table
       // echo updateVendor($vendor); //update

        break;
}



include_once ("footer.html");
?>