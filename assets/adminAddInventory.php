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
//$inventory = getInventoryAsTable($db);
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$vendorId = filter_input(INPUT_POST, 'vendorId', FILTER_SANITIZE_STRING) ?? NULL;
$vinNum = filter_input(INPUT_POST, 'vinNum', FILTER_SANITIZE_STRING) ?? NULL;
$trim = filter_input(INPUT_POST, 'trim', FILTER_SANITIZE_STRING) ?? NULL;
$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING) ?? NULL;
$year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING) ?? NULL;
$mileage = filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_STRING) ?? NULL;
$fuelType = filter_input(INPUT_POST, 'fuelType', FILTER_SANITIZE_STRING) ?? NULL;
$engineType = filter_input(INPUT_POST, 'engineType', FILTER_SANITIZE_STRING) ?? NULL;
$transmission = filter_input(INPUT_POST, 'transmission', FILTER_SANITIZE_STRING) ?? NULL;
$mpg = filter_input(INPUT_POST, 'mpg', FILTER_SANITIZE_STRING) ?? NULL;
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING) ?? NULL;
$driveTrain = filter_input(INPUT_POST, 'driveTrain', FILTER_SANITIZE_STRING) ?? NULL;
$typeOfCar = filter_input(INPUT_POST, 'typeOfCar', FILTER_SANITIZE_STRING) ?? NULL;
$dateOfArrival = filter_input(INPUT_POST, 'dateOfArrival', FILTER_SANITIZE_STRING) ?? NULL;
$dateSold = filter_input(INPUT_POST, 'dateSold', FILTER_SANITIZE_STRING) ?? NULL;
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING) ?? NULL;
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) ?? NULL;
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING) ?? NULL;
$inventoryId = filter_input(INPUT_GET, 'inventoryId', FILTER_SANITIZE_STRING) ?? NULL;

echo $action;
echo $fuelType;
echo $price;
echo $vendorId;

?>
    <div class="row">
        <div class="col-lg-4">
            <h1>Inventory</h1>
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

include_once("../forms/inventorySelectVendorForm.php");
include_once("../forms/addInventoryForm.php");

switch($action){
    case 'Add Inventory':
        $inventory = array(
            "car_id" => $inventoryId,
            "vendor_id" => $vendorId,
            "vin_num" => $vinNum,
            "trim" => $trim,
            "make" => $make,
            "year" => $year,
            "mileage" => $mileage,
            "fuel_type" => $fuelType,
            "engine_type" => $engineType,
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