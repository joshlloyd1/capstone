<?php
include_once ("../assets/functions.php");
include_once ("../assets/dbconnect.php");
$db = dbconnect();
$dropdown = getVendorsDropDown($db);
?>
<div class="container" id="addInventoryFormDisabled">
    <form method="post" action="#">
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMake">Make</label>
                    <input type="text" class="form-control" id="txtMake" name="make" placeholder="Make" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtColor">Model</label>
                    <input type="text" class="form-control" id="txtColor" name="color " placeholder="Color" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtTrim">Trim</label>
                    <input type="text" class="form-control" id="txtTrim" name="trim" placeholder="Trim" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtPrice">Price</label>
                    <input type="text" class="form-control" id="txtPrice" name="price" placeholder="Price" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtEngine">Engine</label>
                    <input type="text" class="form-control" id="txtEngine" name="engineType" placeholder="Engine" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVinNum">Vin Number</label>
                    <input type="text" class="form-control" id="txtVinNum" name="vinNum" placeholder="Vin Number" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMileage">Mileage</label>
                    <input type="text" class="form-control" id="txtMileage" name="mileage" placeholder="Mileage" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtColor">Color</label>
                    <input type="text" class="form-control" id="txtColor" name="color" placeholder="Color" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="dropDownVendor">Fuel Type</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                            Fuel Type...
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button type="button" class="dropdown-item" name="fuelType" value="Gas">Gas</button>
                            <button type="button" class="dropdown-item" name="fuelType" value="Diesel">Diesel</button>
                            <button type="button" class="dropdown-item" name="fuelType" value="Electric">Electric</button>
                            <button type="button" class="dropdown-item" name="fuelType" value="Hybrid">Hybrid</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Images</label>
                    <input type="file" class="form-control-file" id="fileUpImage" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Upload an image</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtDescription">Description</label>
                    <textarea class="form-control" rows="5" id="txtDescription" name="description" placeholder="Description" disabled></textarea>
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary" name="action" value="Add Inventory" disabled>Add Inventory</button>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </form>
</div>
