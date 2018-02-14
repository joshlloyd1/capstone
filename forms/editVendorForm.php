<?php
include_once ("../assets/functions.php");
include_once ("../assets/dbconnect.php");
$db = dbconnect();
$dropdown = getVendorsDropDown($db);
?>
<div class="container" id="editVendorForm">
    <form method="post" action="#">
            <div class="row">
                <div class="col-lg-4">
                    <div class="dropdown dropDownLoc">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownVendorMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu...
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Edit A Vendor</a>
                            <a class="dropdown-item" href="#">Delete A Vendor</a>
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
                               <?php echo $dropdown ?>
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
                        <label for="txtVendorContactFname">First Name</label>
                        <input type="text" class="form-control" id="txtVendorContactFname" placeholder="Contact First Name">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="txtVendorContactLname">Last Name</label>
                        <input type="text" class="form-control" id="txtVendorContactLname" placeholder="Contact Last Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="txtVendorPhone">Phone Number</label>
                        <input type="text" class="form-control" id="txtVendorPhone" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="txtVendorEmail">Email</label>
                        <input type="text" class="form-control" id="txtVendorEmail" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="txtVendorCountry">Country</label>
                        <input type="text" class="form-control" id="txtCountry" placeholder="Country">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="txtVendorCity">City</label>
                        <input type="text" class="form-control" id="txtVendorCity" placeholder="City">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="txtVendorZip">Zip Code</label>
                        <input type="text" class="form-control" id="txtVendorZip" placeholder="Zip Code">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="txtVendorState">State</label>
                        <input type="text" class="form-control" id="txtVendorState" placeholder="State">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-lg-4">

                </div>

    </form>
</div>




