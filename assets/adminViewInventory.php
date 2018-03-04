<?php
/**
 * Created by PhpStorm.
 * User: iotenti
 * Date: 2/4/2018
 * Time: 3:08 PM
 */

include_once ("adminHeader.php");
include_once("functions.php");
include_once("dbconnect.php");
?>

    <h1>Inventory</h1>

<?php
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";

switch($action){
    default:
        echo employeeJobs();
        break;
}

include_once ("footer.html");
?>