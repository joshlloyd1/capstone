<?php
if(!isset($_SESSION)){
    session_start();
}
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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <h1>Vendors</h1>
            <div class="btn-group" role="group" aria-label="vendorNav">
                <button type='submit' name='action' class='btn btn-secondary' id="viewVendorsBtn" value="view">View</button>
                <button type='submit' name='action' class='btn btn-secondary' id="addVendorBtn" value="add">Add</button>
                <button type='submit' name='action' class='btn btn-secondary' id="editVendorBtn" value="edit">Edit</button>
            </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php
echo $vendors;

include_once ("../forms/addVendorForm.php");
include_once("../forms/selectVendorForm.php");
include_once ("../forms/disabledEditVendorForm.php");

switch($action){
    case 'Add Vendor':
        $vendor = array(
            "vendor_id" => $vendorId,
            "vendor_name" => $vendorName,
            "vendor_contact_fname" => $vendorContactFname,
            "vendor_contact_lname" => $vendorContactLname,
            "vendor_email" => $vendorEmail,
            "vendor_phone" => $vendorPhone,
            "vendor_country" => $vendorCountry,
            "vendor_city" => $vendorCity,
            "vendor_state" => $vendorState,
            "vendor_zipcode" => $vendorZipCode
        );
        $result = addVendor($db, $vendor);
        echo getMessage($result);
        break;
}



include_once ("footer.html");
?>