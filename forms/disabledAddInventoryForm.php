<?php
include_once ("../assets/functions.php");
include_once ("../assets/dbconnect.php");
$db = dbconnect();
$dropdown = getVendorsDropDown($db);
?>
<div class="container">
    <form method="post" action="#">
        <div class="row">

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMake">Make</label>
                    <input type="text" class="form-control" id="txtMake" name="make" placeholder="Make" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtModel">Model</label>
                    <input type="text" class="form-control" id="txtModel" name="model" placeholder="Model" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp" disabled></p>
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp" disabled></p>
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp" disabled></p>
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp" disabled></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMpg">Miles Per Gallon</label>
                    <input type="text" class="form-control" id="txtMpg" name="mpg" placeholder="Miles Per Gallon" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtDriveTrain">Drive Train</label>
                    <input type="text" class="form-control" id="txtDriveTrain" name="driveTrain" placeholder="Drive Train" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp" disabled></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fuelType">Fuel Type</label>
                    <select class="form-control" id="fuelType" name="fuelType" disabled>
                        <option value="" selected disabled hidden>Fuel Type...</option>
                        <option name="fuelType" value="Gas">Gas</option>
                        <option name="fuelType" value="Diesel">Diesel</option>
                        <option name="fuelType" value="Electric">Electric</option>
                        <option name="fuelType" value="Hybrid">Hybrid</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                        <label for="typeOfCar">Type</label>
                        <select class="form-control" id="typeOfCar" name="typeOfCar" disabled>
                            <option value="" selected disabled hidden>Type...</option>
                            <option name="typeOfCar" value="Sedan">Sedan</option>
                            <option name="typeOfCar" value="Coupe">Coupe</option>
                            <option name="typeOfCar" value="Convertible">Convertible</option>
                            <option name="typeOfCar" value="Wagon">Wagon</option>
                            <option name="typeOfCar" value="Hatchback">Hatchback</option>
                            <option name="typeOfCar" value="Sports Utility">Sports Utility</option>
                            <option name="typeOfCar" value="Cross Over">Cross Over</option>
                            <option name="typeOfCar" value="Pick Up">Pick Up</option>
                            <option name="typeOfCar" value="Mini Van">Mini Van</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtDescription">Description</label>
                    <textarea class="form-control" rows="5" id="txtDescription" name="description" placeholder="Description" disabled></textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtTransmission">Transmission</label>
                    <input type="text" class="form-control" id="txtTransmission" name="transmission" placeholder="Transmission" disabled>
                </div>
                <div class="form-group">
                    <label for="txtYear">Year</label>
                    <input type="text" class="form-control" id="txtYear" name="year" placeholder="Year" disabled>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary" name="action" value="Add Inventory" disabled>Add Inventory</button>
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </form>
</div>
