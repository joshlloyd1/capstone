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
                    <label for="txtVendorName">Vendor Name</label>
                    <input type="text" class="form-control" id="txtVendorName" name="vendorName" value="<?php echo $_SESSION['vendor_name'] ?>">
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
                    <input type="text" class="form-control" id="txtVendorContactFname" name="vendorContactFname" value="<?php echo $_SESSION['vendor_contact_fname'] ?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorContactLname">Last Name</label>
                    <input type="text" class="form-control" id="txtVendorContactLname" name="vendorContactLname" value="<?php echo $_SESSION['vendor_contact_lname'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorPhone">Phone Number</label>
                    <input type="text" class="form-control" id="txtVendorPhone" name="vendorPhone" value="<?php echo $_SESSION['vendor_phone'] ?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorEmail">Email</label>
                    <input type="text" class="form-control" id="txtVendorEmail" name="vendorEmail" value="<?php echo $_SESSION['vendor_email'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCountry">Country</label>
                    <input type="text" class="form-control" id="txtCountry" name="vendorCountry" value="<?php echo $_SESSION['vendor_country'] ?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCity">City</label>
                    <input type="text" class="form-control" id="txtVendorCity" name="vendorCity" value="<?php echo $_SESSION['vendor_city'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorZipCode">Zip Code</label>
                    <input type="text" class="form-control" id="txtVendorZipCode" name="vendorZipCode" value="<?php echo $_SESSION['vendor_zipcode'] ?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorState">State</label>
                    <input type="text" class="form-control" id="txtVendorState" name="vendorState" value="<?php echo $_SESSION['vendor_state'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <button type="submit" name="action" class="btn btn-primary" value="execute update">Update</button>
                <button type="submit" name="action" class="btn btn-danger" value="delete">Delete</button>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </form>
</div>




