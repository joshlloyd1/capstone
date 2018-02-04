<?php
/*
 * dropdowns are messed up. Not sure why.
 */
?>
<form>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="dropdown show dropDownLoc">
                    <button class="btn btn-secondary dropdown-toggle backEndMenuDropDown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu...
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Add New Inventory</a></br>
                        <a class="dropdown-item" href="#">Edit A Record</a></br>
                        <a class="dropdown-item" href="#">Delete A Record</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="dropDownVendor">Vendor</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Vendor...
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Vendor 1</a></br>
                            <a class="dropdown-item" href="#">Vendor 2</a></br>
                            <a class="dropdown-item" href="#">Vendor 3</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMake">Make</label>
                    <input type="text" class="form-control" id="txtMake" placeholder="Make">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtColor">Model</label>
                    <input type="text" class="form-control" id="txtColor" placeholder="Color">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtTrim">Trim</label>
                    <input type="text" class="form-control" id="txtTrim" placeholder="Trim">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtPrice">Price</label>
                    <input type="text" class="form-control" id="txtPrice" placeholder="Price">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtEngine">Engine</label>
                    <input type="text" class="form-control" id="txtEngine" placeholder="Engine">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVinNum">Vin Number</label>
                    <input type="text" class="form-control" id="txtVinNum" placeholder="Vin Number">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtMileage">Mileage</label>
                    <input type="text" class="form-control" id="txtMileage" placeholder="Mileage">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtColor">Color</label>
                    <input type="text" class="form-control" id="txtColor" placeholder="Color">
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
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Fuel Type...
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">fuel 1</a></br>
                            <a class="dropdown-item" href="#">fuel 2</a></br>
                            <a class="dropdown-item" href="#">fuel 3</a>
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
                    <textarea class="form-control" rows="5" id="txtDescription" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary">Add Car</button>
            </div>
            <div class="col-lg-4">

            </div>
        </div>




</form>





