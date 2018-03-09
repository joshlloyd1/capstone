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
$vendorId = filter_input(INPUT_POST, 'vendorId', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'vendorId', FILTER_SANITIZE_STRING) ?? NULL;
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

//$imageName = filter_input(INPUT_POST, 'imageName', FILTER_SANITIZE_STRING) ?? NULL;
$imagePath = [];


?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 crudNav">
                <div class="btn-group" role="group" aria-label="inventoryNav">
                    <a class='btn btn-secondary' href="adminInventory.php" role="button">View</a>
                    <a class='btn btn-secondary' href="adminAddInventory.php" role="button">Add</a>
                    <a class='btn btn-secondary' href="adminUpdateAndDeleteInventory.php" role="button">Edit</a>
                </div>
            </div>
            <h1>Add Inventory</h1>
        </div>
    </div>


<?php
echo $vendorId . "</br>";
echo $action . "</br>";


switch($action){
    default:
        include_once("../forms/selectVendorFormForInventoryAdd.php");
        include_once("../forms/disabledAddInventoryForm.php");
        break;
    case 'got vendor':
        include_once("../forms/selectVendorFormForInventoryAdd.php");

        $explodeResult = explode("|", $vendorId);
        $vendorId = $explodeResult[0];
        $_SESSION['vendor_name'] = $explodeResult[1];
        $make = $_SESSION['vendor_name'];

        include_once("../forms/addInventoryForm.php");

        break;
    case 'Add Inventory':
        //create an object to pass the addInventory function
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
        $pk = addInventory($db, $inventory); //Adds inventory and returns the primary key.

        //if no files have been uploaded here set $_FILE to null
        if(!isset($_FILES['image'])){
            $_FILES['image']['name'] = null;
        } else {
            //if something is there, name it and get the temp location
            $imageName = $_FILES['image']['name'];
            $tempName = $_FILES['image']['tmp_name'];

            //if there is a name
            if(isset($imageName)){
                //and the name is not empty
                if(!empty($imageName)){
                    //make a location
                    $location = '../images/';
                    //move image to new location
                    for($i = 0; $i < count($imageName); $i++) {
                        if(move_uploaded_file($tempName[$i], $location . $imageName[$i])){
                            $imagePath[$i] = "/images/" . $imageName[$i];
                        }
                    }
                } else {
                    echo "please choose a file";
                }
            }
        }
        $result = addImages($db, $pk, $imagePath);
        echo getMessage($result);

        break;
}
include_once ("footer.html");
?>