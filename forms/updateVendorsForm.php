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
                    <label for="txtVendorName">Vendor Name</label>
                    <input type="text" class="form-control" id="txtVendorName" name="vendorName" value="<?php echo $_SESSION['vendor_name'] ?>" disabled>
                    <input type="hidden" class="form-control" id="txtVendorName" name="vendorName" value="<?php echo $_SESSION['vendor_name'] ?>">
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorContactFname">First Name</label>
                    <input type="text" class="form-control" id="txtVendorContactFname" name="vendorContactFname" value="<?php echo $_SESSION['vendor_contact_fname'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorContactLname">Last Name</label>
                    <input type="text" class="form-control" id="txtVendorContactLname" name="vendorContactLname" value="<?php echo $_SESSION['vendor_contact_lname'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorPhone">Phone Number</label>
                    <input type="text"
                           class="form-control"
                           id="txtVendorPhone"
                           name="vendorPhone"
                           placeholder="Phone Number"
                           required pattern="^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$"
                           data-toggle="tooltip"
                           title="Please enter a valid 10 digit phone number ex: (123)123-1234"
                           value="<?php echo $_SESSION['vendor_phone'] ?>"
                    >

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorEmail">Email</label>
                    <input type="text" class="form-control" id="txtVendorEmail" name="vendorEmail" value="<?php echo $_SESSION['vendor_email'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCountry">Country</label>
                    <input type="text" class="form-control" id="txtCountry" name="vendorCountry" value="<?php echo $_SESSION['vendor_country'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCity">City</label>
                    <input type="text" class="form-control" id="txtVendorCity" name="vendorCity" value="<?php echo $_SESSION['vendor_city'] ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorZipCode">Zip Code</label>
                    <input type="text"
                           class="form-control"
                           id="txtVendorZipCode"
                           name="vendorZipCode"
                           placeholder="Zip Code"
                           required pattern="^[0-9]{5}(?:-[0-9]{4})?$"
                           data-toggle="tooltip"
                           title="Please enter a valid 5 digit zip code. ex: 01904"
                           value="<?php echo $_SESSION['vendor_zipcode'] ?>"
                    >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorState">State</label>
                    <select class="form-control" id="txtVendorState" name="vendorState" required>
                        <option value="<?php echo $_SESSION['vendor_state'] ?>" selected hidden><?php echo $_SESSION['vendor_state'] ?></option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"> <!-- start modal for delete !-->
                <div class="container">
                    <button type="submit" name="action" class="btn btn-primary" value="execute update">Update</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editModal" formnovalidate>Delete</button>
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
                                    <button type="submit" class="btn btn-danger" name="action" value="delete" formnovalidate>delete</button>
                                </div>
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




