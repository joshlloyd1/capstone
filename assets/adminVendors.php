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


?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 crudNav">
            <div class="btn-group" role="group" aria-label="inventoryNav">
                <a class='btn btn-secondary' href="adminVendors.php" role="button">View</a>
                <a class='btn btn-secondary' href="adminAddVendors.php" role="button">Add</a>
                <a class='btn btn-secondary' href="adminUpdateAndDeleteVendors.php" role="button">Edit</a>
            </div>
        </div>
        <h1>View Vendors</h1>
    </div>
</div>
<?php
echo $vendors;

include_once ("footer.html");
?>