<?php
include_once ("../assets/functions.php");
include_once ("../assets/dbconnect.php");
$db = dbconnect();
$dropdown = getModelsDropDown($db);
if(!isset($_SESSION['model'])){
    $_SESSION['model'] = "Select model...";
}

?>
<div class="container">
    <form method="get" action="../assets/adminUpdateAndDeleteInventory.php">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="dropDownVendor">Model</label>
                    <div class="dropdown" id="myDropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['model'] ?>
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




