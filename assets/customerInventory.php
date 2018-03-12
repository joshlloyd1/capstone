<?php
include_once ('customerHeader.php');
include_once ('functions.php');
include_once ('dbconnect.php');
$db = dbconnect();
$db = dbconnect();

$make = filter_input(INPUT_GET, 'make', FILTER_SANITIZE_STRING) ?? "All Makes";
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING) ?? "All Types";
$mileage = filter_input(INPUT_GET, 'mileage', FILTER_SANITIZE_STRING) ?? "All Miles";
$price = filter_input(INPUT_GET, 'price', FILTER_SANITIZE_STRING) ?? "All Prices";

?>
    <h1>Inventory page</h1>



<?php
$brands = getVendorsList($db);
$types = getCarTypesList($db);
echo search($brands, $types, "customerInventory.php");
echo customerViewInventory($db, $make, $type, $mileage, $price);
include_once ("footer.html");
?>