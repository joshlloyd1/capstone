<?php

?>
<div class="container">
    <form method="post" action="#">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorName">Vendor</label>
                    <input type="text" class="form-control" id="txtVendorName" name="vendorName" placeholder="Vendor" required>
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
                    <input type="text" class="form-control" id="txtVendorContactFname" name="vendorContactFname" placeholder="Contact First Name" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorContactLname">Last Name</label>
                    <input type="text" class="form-control" id="txtVendorContactLname" name="vendorContactLname" placeholder="Contact Last Name" required>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorPhone">Phone Number</label>
                    <input type="text" class="form-control" id="txtVendorPhone" name="vendorPhone" placeholder="Phone Number" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorEmail">Email</label>
                    <input type="text" class="form-control" id="txtVendorEmail" name="vendorEmail" placeholder="Email" required>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCountry">Country</label>
                    <input type="text" class="form-control" id="txtCountry" name="vendorCountry" placeholder="Country" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorCity">City</label>
                    <input type="text" class="form-control" id="txtVendorCity" name="vendorCity" placeholder="City" required>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorZipCode">Zip Code</label>
                    <input type="text" class="form-control" id="txtVendorZipCode" name="vendorZipCode" placeholder="Zip Code" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="txtVendorState">State</label>
                    <select class="form-control" id="txtVendorState" name="vendorState" required>
                        <option value="" selected disabled hidden>State</option>
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
            <div class="col-lg-4">
                <button type="submit" name="action" class="btn btn-primary" value="Add Vendor">Add Vendor</button>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </form>
</div>







