
<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 1/31/2018
 * Time: 9:47 AM
 */
function specialBlock($db) {
    $block = "<div class=firstBlock><h2>Specials:</h2>";
    $slide = 1;
    if($slide == 1)
    $block .= "</div>";
    return $block;
}
function aboutusBlock() {
    $block = "<div class=secondBlock><h2>About Us:</h2>";
    $block .= "</div>";
    return $block;
}
function LoginForm($username = "", $password = "") { // displays the login form
    $form = "<div style='position:relative; margin:auto; text-align:center; border:1px solid black; width:400px; margin-top: 65px;'><section>
    <form method='post' action='LogIn.php'>
        <h1>Log In</h1>
        <label for='email'>Username: </label><br>
                <input type='text' name='username' id = 'username' style='text-align:center;' value='$username'/><br>
        <label for='password'>Password: </label><br>
        <input type='password' name='password' id = 'password' style='text-align:center;' value='$password'/><br>

        <input type='hidden' name='action' value='submit' />
        <input type='submit' />
    </form></section></div>";
    return $form;

}
function checkUserCustomer($db, $customer_username, $password, $hash) {
    $sql = $db->prepare("SELECT * FROM customers WHERE customer_username = :customer_username");
        $binds = array(
                ":customer_username" => $customer_username,
        );
    if($sql->execute($binds)) {
        $results = $sql->fetch(PDO::FETCH_ASSOC);
        $rows = $sql->rowCount();
        if ($rows == 1) {
            if (password_verify($password, $results['customer_password'])) {
                $user_id = $results['customer_id'];
                $bln = $user_id;
            } else {
                $bln = -1;
            }
        } else {
            $bln = 0;
        }
    } else {
        $bln = -2;
    }
    return $bln;
}
function checkUserEmployee($db, $username, $password, $hash) {
    $sql = $db->prepare("SELECT * FROM employees WHERE username = :username");
      $binds = array(
          ":username" => $username,
      );
    if($sql->execute($binds)) {
        $results = $sql->fetch(PDO::FETCH_ASSOC);
        $rows = $sql->rowCount();
        if($rows == 1) {
            if(password_verify($password, $results['password'])) {
                $user_id = $results['employee_id'];
                $bln = $user_id;
            } else {
                $bln = -1;
            }
        } else {
            $bln = -2;
        }
    }
    return $bln;
}
function NewUser($newpage) { // brings user to a new page based on what the $newpage variable supplied is
    $form = "<div style='float:right'><form method='post' action='LogIn.php' ";
    $form .= "<input type='hidden' name='action' value='register' /><input type='submit' name='action' value='$newpage' class='btn btn-success'/></form></div>";
    return $form;
}
function getVendorsDropDown($db){
    try{
        $sql = "SELECT * FROM vendors";
        $sql = $db->prepare($sql);
        $sql->execute(); //executes statement
        $vendors = $sql->fetchALL(PDO::FETCH_ASSOC); //gets data and dumps it into array called corps.

        if($sql->rowCount() > 0){ //if there is data, pop it out into a dropdown.
            $dropDown = "" . PHP_EOL;
            foreach($vendors as $vendor){
                $dropDown .= "<button type='submit' class='dropdown-item' name='id' value='" . $vendor['vendor_id'] . "'>" . $vendor['vendor_name']. "</button>";
            }
            $dropDown .= "<input type='hidden' name='action' value='update'>";
        } else { //if there is not any data, say so.
            $dropDown = "NO DATA" . PHP_EOL;
        }
        return $dropDown; //return it.

    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was a problem creating drop down");
    }
}
function getVendorsAsTable($db){
    try{
        $sql = "SELECT * FROM vendors";
        $sql = $db->prepare($sql);
        $sql->execute(); //executes statement
        $vendors = $sql->fetchALL(PDO::FETCH_ASSOC); //gets data and dumps it into array called corps.

        if($sql->rowCount() > 0){ //if there is data, pop it out into a dropdown.
            $displayVendors = "<div class='container' id='viewVendors'>" . PHP_EOL;
            foreach($vendors as $vendor){
                //row
                $displayVendors .= "<div class='row'>";
                //col 1
                $displayVendors .= "<div class='col-lg-4'>";
                $displayVendors .= "</div>";
                //col 2
                $displayVendors .= "<div class='col-lg-4'>";
                $displayVendors .= "<h2>" . $vendor['vendor_name'] . "</h2>";
                $displayVendors .= "<span>" . "Contact: " .  $vendor['vendor_contact_fname'] . " " . $vendor['vendor_contact_lname'] . "</span>" . "</br>";
                $displayVendors .= "<span>" . "phone: " . $vendor['vendor_phone'] . "</span>" . "</br>";
                $displayVendors .= "<span>" . "email: " . $vendor['vendor_email'] . "</span>" . "</br>";
                $displayVendors .= "<span>" .  $vendor['vendor_city'] . ", " . $vendor['vendor_state'] . "</span>" . "</br>";
                $displayVendors .= "<span>" . $vendor['vendor_country'] . ", " .  $vendor['vendor_zipcode'] . "</span>" . "</br>";
                $displayVendors .= "</br>";
                $displayVendors .= "</br>";
                $displayVendors .= "</div>";

                $displayVendors .= "<div class='col-lg-4'>";
                $displayVendors .= "</div>";
                $displayVendors .= "</div>";
            }
            $displayVendors .= "</div>" . PHP_EOL;

        } else { //if there is not any data, say so.
            $displayVendors = "NO DATA" . PHP_EOL;
        }
        return $displayVendors; //return it.

    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was a problem creating drop down");
    }
}
function AddUser($firstName = "", $lastName = "", $phoneNum = "", $email = "", $username = "", $password = "", $passwordRE = "") {
    $form = "<div style='position:relative; margin:auto; text-align:center; border:1px solid black; width:400px;'><section><form method='post' action='NewUser.php'>
        <h1>New User</h1>
        <label for='firstName'>First Name: </label><br>
        <input type='firstName' name='firstName' id = 'firstName' style='text-align:center;' value='$firstName'/><br>
        <label for='lastName'>Last Name: </label><br>
        <input type='lastName' name='lastName' id = 'lastName' style='text-align:center;' value='$lastName'/><br>
        <label for='phoneNum'>Phone Number: </label><br>
        <input type='phoneNum' name='phoneNum' id = 'phoneNum' style='text-align:center;' value='$phoneNum'/><br>

        <label for='email'>Email: </label><br>
                <input type='text' name='email' id = 'email' style='text-align:center;' value='$email'/><br>
        <label for='username'>Username: </label><br>
            <input type='text' name='username' id = 'username' style='text-align:center;' value='$username'/><br>

        <label for='password'>Password: </label><br>
        <input type='password' name='password' id = 'password' style='text-align:center;' value='$password'/><br>
        <label for='passwordRE'>Re enter Password: </label><br>
        <input type='password' name='passwordRE' id = 'passwordRE' style='text-align:center;' value='$passwordRE'/><br>
        
        <input type='hidden' name='action' value='submit' />
        <input type='submit' />
    </form></section></div>";
    return $form;
}
function validate($firstName, $lastName, $username, $password) {
    $ret = 0;
    if($firstName == "") {
        $ret = 1;
    }
    if($lastName == "") {
        $ret = 1;
    }
    if($username == "") {
        $ret = 3;
    }
    if($password == "") {
        $ret = 3;
    }
    return $ret;
}
function StoreNewUser($db, $customer_fname, $customer_lname, $customer_email, $customer_phone, $customer_username, $customer_password) {
    $sql = $db->prepare("SELECT customer_username FROM customers WHERE customer_username = :customer_username");
    $sql->bindParam('customer_username', $customer_username);
    $sql->execute();
    $rows = $sql->rowCount();
    if($rows == 0) {
        $sql = $db->prepare("SELECT customer_email FROM customers WHERE customer_email = :customer_email");
        $sql->bindParam('customer_email', $customer_email);
        $sql->execute();
        $emailrows = $sql->rowCount();
        if($emailrows == 0) {
            try {
                $sql = $db->prepare("INSERT INTO customers VALUES (null, :customer_fname, :customer_lname, :customer_phone, :customer_email, :customer_username, :customer_password)");
                $sql->bindParam(':customer_fname', $customer_fname);
                $sql->bindParam(':customer_lname', $customer_lname);
                $sql->bindParam(':customer_phone', $customer_phone);
                $sql->bindParam(':customer_email', $customer_email);
                $sql->bindParam(':customer_username', $customer_username);
                $sql->bindParam(':customer_password', $customer_password);

                $sql->execute();

                if ($sql) {
                    $str = "User entered successfully";
                }
            } catch (PDOException $e) {
                die("There was a problem adding the user");
            }
        }
        if($emailrows != 0) {
            $str = "Email already has an account";
        }
    }
    else {
        $str = "Username already has an account, please chose a new username.";
    }
    return $str;
}
function phoneCheck ($phone) {
    if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
        $ret = 0;
    }
    else {
        $ret = 2;
    }
    return $ret;
}
function AddEmployee($db, $f_name, $l_name, $email, $phone_number, $username, $password0, $photo) {
    $password = password_hash($password0, PASSWORD_DEFAULT);

    $sql = $db->prepare("INSERT INTO employees VALUES (null, :f_name, :l_name, :email, :phone_number, :username, :password, :photo)");

    $sql->bindParam(':f_name', $f_name);
    $sql->bindParam(':l_name', $l_name);
    $sql->bindParam(':email', $email);
    $sql->bindParam('phone_number', $phone_number);
    $sql->bindParam('username', $username);
    $sql->bindParam('password', $password);
    $sql->bindParam('photo', $photo);

    $sql->execute();

    if ($sql) {
        $str = " User entered successfully";
    }
    return $str;
}
function employeejobs() {
    $btns = "<input type='hidden' name='action' value='newcar' /><input type='submit' value='New Car' style='height: 50px; width: 100px; font-size : 20px;'>
    </form><input type='hidden' name='action' value='editcar' /><input type='submit' value='Edit Car' style='height: 50px; width: 100px; font-size : 20px;'>
    </form>";

    return $btns;

}
function getCredentials($db, $employee_id) {
    $sql = $db->prepare("SELECT * FROM employees WHERE employee_id = :employee_id");
    $binds = array(
        ":employee_id" => $employee_id,
    );
    if($sql->execute($binds)) {
        $results = $sql->fetch(PDO::FETCH_ASSOC);
    }
    else {
        $results = "there was a problem accessing your data";
    }
    return $results;
}
function theTeam($db) {
    $sql = $db->prepare("SELECT * FROM employees");
    if ($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    $table = "<table cellpadding='10px;'>";
    foreach($results as $r) {
        $table .= "<tr>";
        $table .= "<td> <img src='../images/" . $r['photo'] . "' height=100px width:100px'></td>";
        $table .= "<td>" . $r['f_name'] . " " . $r['l_name'] . "</br>" . $r['phone_num'] . "<br>" . $r['email'] . "</td>";
        $table .= "</tr>";

    }
    $table .= "</table>";
    return $table;
}
function addVendor($db, $vendor){
    try{

            $add = $vendor;

            $vendorName = $add['vendorName'];
            $vendorContactFname = $add['vendorContactFname'];
            $vendorContactLname = $add['vendorContactLname'];
            $vendorEmail = $add['vendorEmail'];
            $vendorPhone = $add['vendorPhone'];
            $vendorCountry = $add['vendorCountry'];
            $vendorCity = $add['vendorCity'];
            $vendorState = $add['vendorState'];
            $vendorZipCode = $add['vendorZipCode'];


        $sql = $db->prepare("INSERT INTO `vendors`(`vendor_id`, `vendor_name`, `vendor_contact_fname`, `vendor_contact_lname`, `vendor_email`, `vendor_phone`, `vendor_country`, `vendor_city`, `vendor_state`, vendor_zipcode) VALUES (null, :vendorName, :vendorContactFname, :vendorContactLname, :vendorEmail, :vendorPhone, :vendorCountry, :vendorCity, :vendorState, :vendorZipCode)");
        $sql->bindParam(':vendorName', $vendorName);
        $sql->bindParam(':vendorContactFname', $vendorContactFname);
        $sql->bindParam(':vendorContactLname', $vendorContactLname);
        $sql->bindParam(':vendorEmail', $vendorEmail);
        $sql->bindParam(':vendorPhone', $vendorPhone);
        $sql->bindParam(':vendorCountry', $vendorCountry);
        $sql->bindParam(':vendorCity', $vendorCity);
        $sql->bindParam(':vendorState', $vendorState);
        $sql->bindParam(':vendorZipCode', $vendorZipCode);
        $sql->execute();
        $message = $sql->RowCount() . " Rows inserted.";

        return $message;
    }catch(PDOException $e){
        die("There was a problem connecting to the database");
    }
}
function getVendorUpdateForm($db, $vendorId){ //this will be used to update and delete. Will be used to grab a specific record by primary key number.
    $sql = $db->prepare("SELECT * FROM vendors WHERE vendor_id = :vendor_id"); //select all with a particular id (primary key)
    $sql->bindParam(':vendor_id', $vendorId, PDO::PARAM_INT);
    $sql->execute();
    $vendor = $sql->fetch(PDO::FETCH_ASSOC);//get all columns in associated array. ? I think

    $db = dbconnect();
    $dropdown = getVendorsDropDown($db);

    $form = "<div class='container'>";
        $form .= "<form method='post' action='#'>";
            $form .= "<div class='row'>";
                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='dropDownVendor'>Vendor</label>";
                        $form .= "<div class='dropdown' id='myDropdown'>";
                            $form .= "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                $form .= $vendor['vendor_name'];
                            $form .= "</button>";
                            $form .= "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                               echo $dropdown; //vendor name in dropdown
                            $form .= "</div>";
                         $form .= "</div>";
                    $form .= "</div>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";
            $form .= "</div>";

            $form .= "<div class='row'>";
                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorContactFname'>First Name</label>";
                        $form .= "<input type='text' class='form-control' id='txtVendorContactFname' name='vendorContactFname' value='" . $vendor['vendor_contact_fname']. "'>";
                    $form .= "</div>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorContactLname'>Last Name</label>";
                        $form .= "<input type='text' class='form-control' id='txtVendorContactLname' name='vendorContactLname' value='" . $vendor['vendor_contact_lname']. "'>";
                    $form .= "</div>";
                $form .= "</div>";
            $form .= "</div>";

            $form .= "<div class='row'>";
                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorPhone'>Phone Number</label>";
                        $form .= "<input type='text' class='form-control' id='txtVendorPhone' name='vendorPhone' value='" . $vendor['vendor_phone'] . "'>";
                    $form .= "</div>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorEmail'>Email</label>";
                        $form .= "<input type='text' class='form-control' id='txtVendorEmail' name='vendorEmail' value='" . $vendor['vendor_email'] . "'>";
                    $form .= "</div>";
                $form .= "</div>";
            $form .= "</div>";

            $form .= "<div class='row'>";
                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorCountry'>Country</label>";
                        $form .= "<input type='text' class='form-control' id='txtCountry' name='vendorCountry' value='" . $vendor['vendor_country'] . "'>";
                    $form .= "</div>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorCity'>City</label>";
                        $form .= "<input type='text' class='form-control' id='txtVendorCity' name='vendorCity' value='" . $vendor['vendor_city'] . "'>";
                    $form .= "</div>";
                $form .= "</div>";
            $form .= "</div>";

            $form .= "<div class='row'>";
                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorZipCode'>Zip Code</label>";
                        $form .= "<input type='text' class='form-control' id='txtVendorZipCode' name='vendorZipCode' value='" . $vendor['vendor_zipcode'] . "'>";
                    $form .= "</div>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<div class='form-group'>";
                        $form .= "<label for='txtVendorState'>State</label>";
                        $form .= "<input type='text' class='form-control' id='txtVendorState' name='vendorState' value='" . $vendor['vendor_state'] . "'>";
                    $form .= "</div>";
                $form .= "</div>";
            $form .= "</div>";

            $form .= "<div class='row'>";
                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                    $form .= "<button type='submit' name='action' class='btn btn-primary' value='edit'>Update</button>";
                    $form .= "<button type='submit' name='action' class='btn btn-danger' value='delete'>Delete</button>";
                $form .= "</div>";

                $form .= "<div class='col-lg-4'>";
                $form .= "</div>";
            $form .= "</div>";
        $form .= "</form>";
    $form .= "</div>";
    return $form;
}