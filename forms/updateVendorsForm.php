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

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="dropDownVendor">Vendor</label>
                    <div class="dropdown" id="myDropdown">
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
                    <input type="text" class="form-control" id="txtVendorContactFname" name="vendorContactFname" placeholder="Contact First Name">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorContactLname">Last Name</label>
                    <input type="text" class="form-control" id="txtVendorContactLname" name="vendorContactLname" placeholder="Contact Last Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorPhone">Phone Number</label>
                    <input type="text" class="form-control" id="txtVendorPhone" name="vendorPhone" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorEmail">Email</label>
                    <input type="text" class="form-control" id="txtVendorEmail" name="vendorEmail" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCountry">Country</label>
                    <input type="text" class="form-control" id="txtCountry" name="vendorCountry" placeholder="Country">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCity">City</label>
                    <input type="text" class="form-control" id="txtVendorCity" name="vendorCity" placeholder="City">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorZipCode">Zip Code</label>
                    <input type="text" class="form-control" id="txtVendorZipCode" name="vendorZipCode" placeholder="Zip Code">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorState">State</label>
                    <input type="text" class="form-control" id="txtVendorState" name="vendorState" placeholder="State">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <button type="submit" name="action" class="btn btn-primary" value="edit">Update</button>
                <button type="submit" name="action" class="btn btn-danger" value="delete">Delete</button>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </form>
</div>




