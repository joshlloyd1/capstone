<?php
include_once ("../assets/functions.php");
include_once ("../assets/dbconnect.php");
$db = dbconnect();
$dropdown = getVendorsDropDown($db);
if(!isset($_SESSION['vendor_name'])){
    $_SESSION['vendor_name'] = "Select Vendor...";
}

?>
<div class="container">
    <form method="get" action="adminAddInventory.php">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="dropDownVendor">Vendor</label>
                    <div class="dropdown" id="myDropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['vendor_name'] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php echo $dropdown ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </form>
</div>




