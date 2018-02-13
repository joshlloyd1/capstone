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

?>
    <h1>Vendors</h1>
<?php
echo $vendors;
include_once ("../forms/addVendorForm.php");
include_once ('../forms/editVendorForm.php');
include_once ("footer.html");
?>