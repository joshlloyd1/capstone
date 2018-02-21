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
            <div class="col-lg-4"> <!-- start modal for delete !-->
                <div class="container">
                    <button type="submit" name="action" class="btn btn-primary" value="execute update">Update</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editModal">Delete</button>
                    <div class="modal fade" id="editModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Are you sure?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <?php $vendor = getVendor($db, $vendorId);
                                        $displayVendor = "<h2>" . $vendor['vendor_name'] . "</h2>";
                                        $displayVendor .= "<span>" . "Contact: " .  $vendor['vendor_contact_fname'] . " " . $vendor['vendor_contact_lname'] . "</span>" . "</br>";
                                        $displayVendor .= "<span>" . "phone: " . $vendor['vendor_phone'] . "</span>" . "</br>";
                                        $displayVendor .= "<span>" . "email: " . $vendor['vendor_email'] . "</span>" . "</br>";
                                        $displayVendor .= "<span>" .  $vendor['vendor_city'] . ", " . $vendor['vendor_state'] . "</span>" . "</br>";
                                        $displayVendor .= "<span>" . $vendor['vendor_country'] . ", " .  $vendor['vendor_zipcode'] . "</span>" . "</br>";
                                        echo $displayVendor
                                    ?>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                                    <button type="submit" class="btn btn-danger" name="action" value="delete">delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </form>
</div>




