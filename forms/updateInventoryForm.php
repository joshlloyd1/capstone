<?php
/**
 * Created by PhpStorm.
 * User: iotenti
 * Date: 3/4/2018
 * Time: 1:14 PM
 */
include_once ("../assets/functions.php");
include_once ("../assets/dbconnect.php");
$db = dbconnect();
$dropdown = getVendorsDropDown($db);
?>
<div class="container">
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMake">Make</label>
                    <input type="text" class="form-control" id="txtMake" name="make" placeholder="Make" value="<?php echo $_SESSION['make'] ?>"> <!-- SHOULD WE TAKE MAKE COLUMN OUT OF THIS DB??? -->
                    <input type="hidden" name="vendorId" value="<?php echo $_SESSION['vendor_id'] ?>">
                    <input type="hidden" name="date" value="<?php echo $_SESSION['dateOfArrival'] ?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtModel">Model</label>
                    <input type="text" class="form-control" id="txtModel" name="model" placeholder="Model" value="<?php echo $_SESSION['model'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtTrim">Trim</label>
                    <input type="text" class="form-control" id="txtTrim" name="trim" placeholder="Trim" value="<?php echo $_SESSION['trim'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtPrice">Price</label>
                    <input type="text"
                           class="form-control"
                           id="txtPrice"
                           name="price"
                           placeholder="Price"
                           value="<?php echo $_SESSION['price'] ?>"
                           required pattern="^(\d+|\d{1,3}(,\d{3})*)(\.\d+)?$"
                           data-toggle="tooltip"
                           title="Please, no dollar signs"
                    >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtEngine">Engine</label>
                    <input type="text" class="form-control" id="txtEngine" name="engineType" placeholder="Engine" value="<?php echo $_SESSION['engine_type'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVinNum">Vin Number</label>
                    <input type="text" class="form-control" id="txtVinNum" name="vinNum" placeholder="Vin Number" value="<?php echo $_SESSION['vin_num'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image </label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMileage">Mileage</label>
                    <input type="text"
                           class="form-control"
                           id="txtMileage"
                           name="mileage"
                           placeholder="Mileage"
                           value="<?php echo $_SESSION['mileage'] ?>"
                           required pattern="^(\d+|\d{1,3}(,\d{3})*)(\.\d+)?$"
                           data-toggle="tooltip"
                           title="please only enter numbers"
                    >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtColor">Color</label>
                    <input type="text" class="form-control" id="txtColor" name="color" placeholder="Color" value="<?php echo $_SESSION['color'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMpg">Miles Per Gallon</label>
                    <input type="text"
                           class="form-control"
                           id="txtMpg" name="mpg"
                           placeholder="Miles Per Gallon"
                           value="<?php echo $_SESSION['mpg'] ?>"
                           required pattern="^\d+$"
                           data-toggle="tooltip"
                           title="Please only enter numbers"
                    >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtDriveTrain">Drive Train</label>
                    <input type="text" class="form-control" id="txtDriveTrain" name="driveTrain" placeholder="Drive Train" value="<?php echo $_SESSION['drive_train'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fileUpImage">Image</label>
                    <p><input type="file" class="btn btn-secondary" name="image[]" id="fileUpImage" aria-describedby="fileHelp"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="fuelType">Fuel Type</label>
                    <select class="form-control" id="fuelType" name="fuelType" required>
                        <option value="<?php echo $_SESSION['fuel_type'] ?>" selected hidden><?php echo $_SESSION['fuel_type'] ?></option>
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
                        <select class="form-control" id="typeOfCar" name="typeOfCar" required>
                            <option value="<?php echo $_SESSION['type_of_car'] ?>" selected hidden><?php echo $_SESSION['type_of_car'] ?></option>
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
                <p>Change Images? <input type="checkbox" name="changeImage" id="changeImage" data-toggle="tooltip" title="This will delete all images of the product and replace them" /></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtDescription">Description</label>
                    <textarea class="form-control" rows="5" id="txtDescription" name="description" placeholder="Description" required><?php echo $_SESSION['description'] ?></textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtTransmission">Transmission</label>
                    <input type="text" class="form-control" id="txtTransmission" name="transmission" placeholder="Transmission" value="<?php echo $_SESSION['transmission'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="txtYear">Year</label>
                    <input type="text"
                           class="form-control"
                           id="txtYear"
                           name="year"
                           placeholder="Year"
                           value="<?php echo $_SESSION['year'] ?>"
                           required pattern="^\d+$"
                           data-toggle="tooltip"
                           title="Please enter numbers only"
                    >
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary" name="action" value="execute update">Update</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editModal" formnovalidate>Delete</button>
                <div class="modal fade" id="editModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Are you sure?</h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <?php $product = getModel($db, $carId);
                                    $vendorId = $product['vendor_id'];

                                    $vendor = getVendor ($db, $vendorId);

                                    $displayProds = "<h2>" . $vendor['vendor_name'] . "</h2>";
                                    $displayProds .= "<h6>" . $product['year']  . " " .  $product['model'] . ", " . $product['trim'] . ", " . $product['type_of_car'] . "</h6>". "</br>";
                                    $displayProds .= "<span>" . "<h6>Description:</h6> " . $product['description'] . "</span>" . "</br>" . "</br>";
                                    $displayProds .= "<span>" . "Vin Number: " . $product['vin_num'] . "</span>" . "</br>";
                                    $displayProds .= "<span>" . "Date of arrival: " . $product['date_of_arrival'] . "</span>" . "</br>";
                                    $displayProds .= "<span>" . "Price: " . $product['price'] . "</span>" . "</br>";
                                    echo $displayProds;
                                    ?>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                                <button type="submit" class="btn btn-danger" name="action" value="delete" formnovalidate>delete</button>
                            </div>
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
