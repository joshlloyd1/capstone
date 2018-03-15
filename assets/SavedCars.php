<?php
session_start();

include_once ("header.php");
include_once("functions.php");
include_once("dbconnect.php");
?>
    <h1>Saved Cars</h1>

<?php
$db = dbconnect();
if(!isset($_SESSION['lsc'])) {
    echo "<h4>There are no saved cars in your local inventory</h4>";
}
else {
    $save = "<table>";
    foreach ($_SESSION['lsc'] as $saved) {
        $save .= locallySavedCar($db, $saved);
    }
    $save .= "</table>";

    echo $save;
    echo "<a href=eraceSavedCars.php><button class='btn btn-warning' style='margin-top:15px;'>Clear Saved Cars</button></a>";
}
include_once ("footer.html");
?>