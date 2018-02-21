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
$inventory = getInventoryAsTable($db);
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


"car_id" => $inventoryId,
            "vendor_id" => $vendorId,
            "vin_num" => $VinNum,
            "trim" => $trim,
            "make" => $make,
            "year" => $year,
            "milage" => $milage,
            "fuel_type" => $fuelType,
            "transmission" => $transmission,
            "mpg" => $mpg,
            "color" => $color,
            "drive_train" => $driveTrain,
            "type_of_car" => $typeOfCar,
            "date_of_arrival" => $dateOfArrival,
            "date_sold" => $dateSold,
            "price" => $price,
            "description" => $description,
            "model" => $model


echo $action;

?>

    <div class="row">
        <div class="col-lg-4">
            <h1>Vendors</h1>
            <div class="btn-group" role="group" aria-label="inventoryNav">
                <button type='submit' name='action' class='btn btn-secondary' id="viewInventoryBtn" value="view">View</button>
                <button type='submit' name='action' class='btn btn-secondary' id="addInventoryBtn" value="add">Add</button>
                <button type='submit' name='action' class='btn btn-secondary' id="editInventoryBtn" value="edit">Edit</button>
            </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
    </div>

<?php


include_once ("../forms/addInventoryForm.php");
//include_once("../forms/selectVendorForm.php");
//include_once ("../forms/disabledEditVendorForm.php");

switch($action){
    case 'Add Inventory':
        $inventory = array(
            "car_id" => $inventoryId,
            "vendor_id" => $vendorId,
            "vin_num" => $VinNum,
            "trim" => $trim,
            "make" => $make,
            "year" => $year,
            "milage" => $milage,
            "fuel_type" => $fuelType,
            "transmission" => $transmission,
            "mpg" => $mpg,
            "color" => $color,
            "drive_train" => $driveTrain,
            "type_of_car" => $typeOfCar,
            "date_of_arrival" => $dateOfArrival,
            "date_sold" => $dateSold,
            "price" => $price,
            "description" => $description,
            "model" => $model
        );
        $result = addInventory($db, $inventory);
        echo getMessage($result);
        break;
}



include_once ("footer.html");
?>