<head>
    <link rel="stylesheet" href="/css/style.css">
</head>

<style>

    .reg {
        font-size: large;
        border-bottom: double;}
    .btn2 {
        background-color: #33ff66;
        border: none;
        color: white;
        padding: 10px 16px;
        font-size: 16px;
        cursor: pointer;
    }
    .btn1 {
        background-color: Red;
        border: none;
        color: white;
        padding: 10px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn2:hover {
        background-color: Green;
    }
    .btn1:hover {
        background-color: Crimson;
    }
    .search {
        width: 175px;
        height: 40px;
    }
    .showcar {
        margin: auto;
        width:1500px;
    }
    .showcarcust {

        width:1500px;
    }
    .incar{
        margin: auto;
        width:75%;
    }
    .descript {
        margin: auto;
        height:260px;
        background-color: firebrick;
        color: white;
        width:85%;
    }
    .dec {


    }
</style>

<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 1/31/2018
 * Time: 9:47 AM
 */
/*function LoginForm($username = "", $password = "") { // displays the login form
    //style='position:relative; margin:auto; text-align:center; border:1px solid black; width:400px; margin-top: 65px;'<div class="row">
    $form = "<div class='container' style='margin: auto'>
        <div class='col-lg-4'>
            <div class='form-group'>
                <h1>Log In</h1>
                <form method='post' action = 'LogIn.php'>
                <label for='email'>Username: </label><br>
                    <input type='text' name='username' id = 'username' style='text-align:center; margin: auto;' value='$username' class='form-control'/><br>
                <label for='password'>Password: </label><br>
                    <input type='password' name='password' id = 'password' style='text-align:center;' value='$password' class='form-control'/><br>
    
                    <input type='hidden' name='action' value='submit' />
                    <input type='submit' class='btn btn-primary' />
                    </form>
            </div>
        </div>
    </div>";

    return $form;
}*/
function loginForm($username = "", $password = "") { // displays the login form

    $form = "<div class='container'>
        <div class='row' style='margin-top:50px;'>
            <div class='col-lg-4'>
                    <div class='form-group'>
                        <h1>Log In</h1>
                        <form method='post' action = 'LogIn.php'>
                        <label for='email'>Username: </label>
                            <input type='text' name='username' id = 'username' style='text-align:center; margin: auto;' value='$username' class='form-control'/>
                        <label for='password'>Password: </label>
                            <input type='password' name='password' id = 'password' style='text-align:center;' value='$password' class='form-control'/><br>
            
                            <input type='hidden' name='action' value='submit' />
                            <input type='submit' class='btn btn-primary' />
                            </form>
                    </div>
                </div>
        </div>    
    </div>";
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
                $bln = 0;
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
                $bln = 0;
            }
        } else {
            $bln = 0;
        }
    } else {
        $bln = -2;
    }
    return $bln;
}
/*function NewUser($newpage) { // brings user to a new page based on what the $newpage variable supplied is
    $form = "<div style='float:right'><form method='post' action='LogIn.php' ";
    $form .= "<input type='hidden' name='action' value='register' /><input type='submit' name='action' value='$newpage' class='btn btn-success'/></form></div>";
    return $form;
}*/
function newUser($newpage) { // brings user to a new page based on what the $newpage variable supplied is
    $form = "<div style='float:right'><form method='post' action='LogIn.php' ";
    $form .= "<input type='hidden' name='action' value='register' /><input type='submit' name='action' value='$newpage' class='btn btn-success'/></form></div>";
    return $form;
}
function getVendorsDropDown($db){
    try{
        $sql = "SELECT * FROM vendors";
        $sql = $db->prepare($sql);
        $sql->execute(); //executes statement
        $vendors = $sql->fetchALL(PDO::FETCH_ASSOC); //gets data and dumps it into array called vendors.
        if($sql->rowCount() > 0){ //if there is data, pop it out into a dropdown.
            $dropDown = "" . PHP_EOL;
            foreach($vendors as $vendor){
                $dropDown .= "<button type='submit' class='dropdown-item' name='vendorId' value='" . $vendor['vendor_id'] . "|" . $vendor['vendor_name'] . "'>" . $vendor['vendor_name'] . "</button>";
            }  //passes vendor id and vendor name
            $dropDown .= "<input type='hidden' name='action' value='got vendor'>"; //passes "got vendor" to action
        } else { //if there is not any data, say so.
            $dropDown = "NO DATA" . PHP_EOL;
        }
        return $dropDown; //return it.
    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was a problem creating drop down");
    }
}
function getModelsDropDown($db){
    try{
        $sql = "SELECT * FROM inventory";
        $sql = $db->prepare($sql);
        $sql->execute(); //executes statement
        $models = $sql->fetchALL(PDO::FETCH_ASSOC); //gets data and dumps it into array called vendors.
        if($sql->rowCount() > 0){ //if there is data, pop it out into a dropdown.
            $dropDown = "" . PHP_EOL;
            foreach($models as $model){
                $dropDown .= "<button type='submit' class='dropdown-item' name='carId' value='" . $model['car_id'] . "'>" . $model['year']  . " " .  $model['model'] . ", " . $model['trim'] . ", " . $model['type_of_car'] . "</button>";
            }  //passes vendor id and vendor name
            $dropDown .= "<input type='hidden' name='action' value='got model'>"; //passes "got vendor" to action
        } else { //if there is not any data, say so.
            $dropDown = "NO DATA" . PHP_EOL;
        }
        return $dropDown; //return it.
    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was a problem creating drop down");
    }
}
function getModel($db, $carId){ //this will be used to update and delete. Will be used to grab a specific record by primary key number.
    $sql = $db->prepare("SELECT * FROM inventory WHERE car_id = :car_id"); //select all with a particular id (primary key)
    $sql->bindParam(':car_id', $carId, PDO::PARAM_INT);
    $sql->execute();
    $model = $sql->fetch(PDO::FETCH_ASSOC);//get all columns in associated array. ? I think
    return $model;
}
function updateInventory($db, $inventory){
    try{
        $update = $inventory;
        $carId = $update['car_id'];
        $vendorId = $update['vendor_id'];
        $vinNum = $update['vin_num'];
        $trim = $update['trim'];
        $make = "";
        $year = $update['year'];
        $mileage = $update['mileage'];
        $fuelType = $update['fuel_type'];
        $engineType = $update['engine_type'];
        $transmission = $update['transmission'];
        $mpg = $update['mpg'];
        $color = $update['color'];
        $driveTrain = $update['drive_train'];
        $typeOfCar = $update['type_of_car'];
        $dateSold = $update['date_sold'];
        $price = $update['price'];
        $description = $update['description'];
        $model = $update['model'];

        $sql = $db->prepare("UPDATE inventory SET vendor_id=:vendor_id, vin_num=:vin_num, trim=:trim, make=:make, 
                                year=:year, mileage=:mileage, fuel_type=:fuel_type, engine_type=:engine_type, 
                                transmission=:transmission, mpg=:mpg, color=:color, drive_train=:drive_train, type_of_car=:type_of_car, 
                                date_sold=:date_sold, price=:price, description=:description, model=:model WHERE car_id='$carId'");
        $sql->bindParam(':vendor_id', $vendorId);
        $sql->bindParam(':vin_num', $vinNum);
        $sql->bindParam(':trim', $trim);
        $sql->bindParam(':make', $make);
        $sql->bindParam(':year', $year);
        $sql->bindParam(':mileage', $mileage);
        $sql->bindParam(':fuel_type', $fuelType);
        $sql->bindParam(':engine_type', $engineType);
        $sql->bindParam(':transmission', $transmission);
        $sql->bindParam(':mpg', $mpg);
        $sql->bindParam(':color', $color);
        $sql->bindParam(':drive_train', $driveTrain);
        $sql->bindParam(':type_of_car', $typeOfCar);
        $sql->bindParam(':date_sold', $dateSold);
        $sql->bindParam(':price', $price);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':model', $model);
        $sql->execute();

        if($sql->rowCount() < 1){
            $result = "You made no changes to the record";
            return $result;
        } else{
            $result = "Record Updated";
            return $result;
        }
    }catch (PDOException $e) { //if it fails, throw the exception and display error message.
        die($e);
    }
}
function deleteInventory($db, $carId){
    try{
        $sql = $db->prepare("DELETE FROM inventory WHERE car_id=:car_id"); //select all with a particular id (primary key)
        $sql->bindParam(':car_id', $carId, PDO::PARAM_INT);
        $sql->execute();
        $success = "Record successfully deleted";
        return $success;
    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was an error deleting the record");
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
                //adding parentheses to format phone number
                $first3digits = substr($vendor['vendor_phone'], 0, 3);
                $next3digits = substr($vendor['vendor_phone'], 3, 3);
                $replace = "(" . $first3digits . ")" . $next3digits . "-";
                $vendorPhone = substr_replace($vendor['vendor_phone'], $replace, 0, 6 );


                //row
                $displayVendors .= "<div class='row'>";
                //col 1

                $displayVendors .= "<div class='col-lg-4'>";
                $displayVendors .= "<h2>" . $vendor['vendor_name'] . "</h2>";
                $displayVendors .= "<span>" . "contact: " .  $vendor['vendor_contact_fname'] . " " . $vendor['vendor_contact_lname'] . "</span>" . "</br>";
                $displayVendors .= "<span>" . "phone: " . $vendorPhone . "</span>" . "</br>";
                $displayVendors .= "<span>" . "email: " . $vendor['vendor_email'] . "</span>" . "</br>";
                $displayVendors .= "<span>" .  $vendor['vendor_city'] . ", " . $vendor['vendor_state'] . "</span>" . "</br>";
                $displayVendors .= "<span>" . $vendor['vendor_country'] . ", " .  $vendor['vendor_zipcode'] . "</span>" . "</br>";
                $displayVendors .= "</br><hr>";
                $displayVendors .= "</br>";
                $displayVendors .= "</div>";

                //col 2
                $displayVendors .= "<div class='col-lg-8'>";
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
        $str = "<h5>Username already has an account, please chose a new username.</h5>";
    }
    return $str;
}
/* ian made new function phoneCheck ($phone) {
    if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
        $ret = 0;
    }
    else {
        $ret = 2;
    }
    return $ret;
} */
function phoneCheck ($phone) {
    if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
        $ret = 0;
    }
    else {
        $ret = 2;
    }
    return $ret;
}
/* ian added in his own function addEmployee($db, $f_name, $l_name, $email, $phone_number, $username, $password0, $photo) {
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
        $str = "<h5>User entered successfully</h5>";
    }
    return $str;
}*/
function addEmployee($db, $f_name, $l_name, $email, $phone_number, $position, $username, $password0, $photo) {



    $password = password_hash($password0, PASSWORD_DEFAULT);
    $sql = $db->prepare("INSERT INTO employees VALUES (null, :f_name, :l_name, :email, :phone_number, :position, :username, :password, :photo)");
    $sql->bindParam(':f_name', $f_name);
    $sql->bindParam(':l_name', $l_name);
    $sql->bindParam(':email', $email);
    $sql->bindParam('phone_number', $phone_number);
    $sql->bindParam('position', $position);
    $sql->bindParam('username', $username);
    $sql->bindParam('password', $password);
    $sql->bindParam('photo', $photo);
    $sql->execute();
    if ($sql) {
        $str = "User entered successfully";

    }
    return $str;
}

/*function employeeJobs() {
    $btns = "<input type='hidden' name='action' value='newcar' /><input type='submit' value='New Car' style='height: 50px; width: 100px; font-size : 20px;'>
    </form><input type='hidden' name='action' value='editcar' /><input type='submit' value='Edit Car' style='height: 50px; width: 100px; font-size : 20px;'>
    </form>";
    return $btns;
}*/
/* ian made new function getCredentials($db, $employee_id) {
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
}*/
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
/* ian made new function theTeam($db) {
    $sql = $db->prepare("SELECT * FROM employees");
    if ($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    $table = "<table cellpadding='10px;'>";
    foreach($results as $r) {
        $table .= "<tr class='reg'>";
        $table .= "<td> <img src='../images/" . $r['photo'] . "' height=100px width:100px'></td>";
        $table .= "<td>" . $r['f_name'] . " " . $r['l_name'] . "</br>" . $r['position'] . "<br>" . $r['phone_num'] . "</td><td>" . $r['email'] ."</td>";
        $table .= "</tr>";

    }
    $table .= "</table>";
    return $table;
}*/
function getTheTeam($db) {
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
        $vendorName = $add['vendor_name'];
        $vendorContactFname = $add['vendor_contact_fname'];
        $vendorContactLname = $add['vendor_contact_lname'];
        $vendorEmail = $add['vendor_email'];
        $vendorPhone = $add['vendor_phone'];
        $vendorCountry = $add['vendor_country'];
        $vendorCity = $add['vendor_city'];
        $vendorState = $add['vendor_state'];
        $vendorZipCode = $add['vendor_zipcode'];
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
        $message = $vendorName . " added to vendors.";
        return $message;
    }catch(PDOException $e){
        die("There was a problem connecting to the database");
    }
}
function getVendor($db, $vendorId){ //this will be used to update and delete. Will be used to grab a specific record by primary key number.
    $sql = $db->prepare("SELECT * FROM vendors WHERE vendor_id = :vendor_id"); //select all with a particular id (primary key)
    $sql->bindParam(':vendor_id', $vendorId, PDO::PARAM_INT);
    $sql->execute();
    $vendor = $sql->fetch(PDO::FETCH_ASSOC);//get all columns in associated array. ? I think
    return $vendor;
}
function updateVendor($db, $vendor){
    try{
        $update = $vendor;
        $vendorId = $update['vendor_id'];
        $vendorName = $update['vendor_name'];
        $vendorContactFname = $update['vendor_contact_fname'];
        $vendorContactLname = $update['vendor_contact_lname'];
        $vendorEmail = $update['vendor_email'];
        $vendorPhone = $update['vendor_phone'];
        $vendorCountry = $update['vendor_country'];
        $vendorCity = $update['vendor_city'];
        $vendorState = $update['vendor_state'];
        $vendorZipCode = $update['vendor_zipcode'];

        $sql = $db->prepare("UPDATE vendors SET vendor_id=:vendor_id, vendor_name=:vendor_name, vendor_contact_fname=:vendor_contact_fname, vendor_contact_lname=:vendor_contact_lname, vendor_email=:vendor_email, vendor_phone=:vendor_phone, vendor_country=:vendor_country, vendor_city=:vendor_city, vendor_state=:vendor_state, vendor_zipcode=:vendor_zipcode WHERE vendor_id='$vendorId'");
        $sql->bindParam(':vendor_id', $vendorId);
        $sql->bindParam(':vendor_name', $vendorName); //bind "place holders" to vars passed from forms. helps with security.
        $sql->bindParam(':vendor_contact_fname', $vendorContactFname);
        $sql->bindParam(':vendor_contact_lname', $vendorContactLname);
        $sql->bindParam(':vendor_email', $vendorEmail);
        $sql->bindParam(':vendor_phone', $vendorPhone);
        $sql->bindParam(':vendor_country', $vendorCountry);
        $sql->bindParam(':vendor_city', $vendorCity);
        $sql->bindParam(':vendor_state', $vendorState);
        $sql->bindParam(':vendor_zipcode', $vendorZipCode);
        $sql->execute();

        return $sql->rowCount() . " row updated.";
    }catch (PDOException $e) { //if it fails, throw the exception and display error message.
        die($e);
    }
}
function deleteAVendor($db, $vendorId){
    try{
        $sql = $db->prepare("DELETE FROM vendors WHERE vendor_id=:vendor_id"); //select all with a particular id (primary key)
        $sql->bindParam(':vendor_id', $vendorId, PDO::PARAM_INT);
        $sql->execute();
        $success = "Record successfully deleted";
        return $success;
    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was an error deleting the record");
    }
}
function getMessage($result){
    $message = "<div class='row'>";
    $message .= "<div class='col-lg-4'></div>";
    $message .= "<div class='col-lg-4'><h3>" . $result . "</h3></div>";
    $message .= "<div class='col-lg-4'></div>";
    $message .= "</div>";
    return $message;
}
function getEmployeeNames($db) {
    $sql = $db->prepare("SELECT * FROM employees");
    $sql->execute();

    $employees = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $employees;
}
function scheduleApp($db, $employee_id, $customer_id, $appointment) {
    $approve = 0;
    $sql = $db->prepare("INSERT INTO appointments VALUES (null, :appointment, :employee_id, :customer_id, :approve)");

    $sql->bindParam(':appointment', $appointment);
    $sql->bindParam(':employee_id', $employee_id);
    $sql->bindParam(':customer_id', $customer_id);
    $sql->bindParam(':approve', $approve);

    $sql->execute();
    $ret = $sql->RowCount() . " appoint requested";

    return $ret;
}
function customerApp($db, $customer_id) { // NEXT TO WORK ON, THE JOIN STATEMENT FOR THE EMPLOYEE NAMES
    $sql = $db->prepare("SELECT appointments.appointment_id as appointment_id, appointments.appointment as appointment, employees.f_name as f_name, employees.l_name as l_name,appointments.approve as approve 
  FROM appointments 
  INNER JOIN employees 
  ON appointments.employee_id = employees.employee_id 
  WHERE appointments.customer_id = :customer_id");

    $binds = array(
        ":customer_id" => $customer_id
    );
    $results = array();
    if($sql->execute($binds) && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        $table = "<table class='table table striped'>";
        $table .= "<tr class='reg'><td>Date</td><td>Name of Employee</td><td>Status</td></tr>";
        foreach($results as $result) {
            if($result['approve'] == 0) {$approve = "Not Approved";} else{$approve = "Approved";}
            $table .= "</td><td>" . $result['appointment'] . "</td><td>" . $result['f_name'] . " " . $result['l_name'] . "</td><td>approved: " . $approve . "</td></tr>";
        }
        $table .= "</table>";
    } else {
        $table = "There are no scheduled appointments.";
    }
    return $table;
}
function myAppointments($db, $employee_id) {
    $sql = $db->prepare("SELECT customers.customer_id, appointments.appointment_id as appointment_id, appointments.appointment as appointment, customers.customer_fname as fName, customers.customer_lName as lName, appointments.approve as approve 
  FROM appointments 
  INNER JOIN customers
  ON appointments.customer_id = customers.customer_id 
  WHERE employee_id = :employee_id");
    $binds = array(
        ":employee_id" => $employee_id
    );
    if($sql->execute($binds) && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        $table = "<table class='table'>";
        $table .= "<thead class='thead-dark'><tr class='reg'><th>#</th><th>Date</th><th>Time</th><th>Customer Name</th><th>Approved</th><th>Delete</th></tr></thead>";
        foreach($results as $result) {
            $date = date_create($result['appointment']);
            if($result['approve'] == 1) {
                $table .= "</td><td>" . $result['appointment_id'] . "</td><td>" . date_format($date, "m/d/Y") . "</td><td>" . date_format($date, 'h:i a') . "</td><td>" . $result['fName'] . " " . $result['lName'] . "</td><td><a href='approve.php?appointment_id=" . $result['appointment_id'] . "'><button disabled class='btn'>Approved</button></a></td><td><a href='adminDeleteAppointment.php?appointment_id=" . $result['appointment_id'] . "'><button class='btn btn-danger'><i id='trash' class='fa fa-trash'></i></button></a></td>";
            }
            if($result['approve'] == 0) {
                $table .= "</td><td>" . $result['appointment_id'] . "</td><td>" . date_format($date, "m/d/Y") . "</td><td>" . date_format($date, 'h:i a') . "</td><td>" . $result['fName'] . " " . $result['lName'] . "</td><td><a href='approve.php?appointment_id=" . $result['appointment_id'] . "'><button class='btn btn-success'>Approve</button></a></td><td><a href='adminDeleteAppointment.php?appointment_id=" . $result['appointment_id'] . "'><button class='btn btn-danger'><i id='trash' class='fa fa-trash'></i></button></a></td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table>";
    } else {
        $table = "<h4>You have no scheduled appointments</h4>";
    }
    return $table;
}
function getCustomer($db, $customer_id) {
    $sql = $db->prepare("SELECT * FROM customers WHERE :customer_id = customer_id");
    $sql->bindParam(":customer_id", $customer_id);
    $sql->execute();

    $results = $sql->fetch(PDO::FETCH_ASSOC);

    return $results;
}
function addInventory($db, $inventory){
    try{
        $add = $inventory;
        $vendorId = $add['vendor_id'];
        $vinNum = $add['vin_num'];
        $trim = $add['trim'];
        $make="";
        $year = $add['year'];
        $mileage = $add['mileage'];
        $fuelType = $add['fuel_type'];
        $engineType = $add['engine_type'];
        $transmission = $add['transmission'];
        $mpg = $add['mpg'];
        $color = $add['color'];
        $driveTrain = $add['drive_train'];
        $typeOfCar = $add['type_of_car'];
        $dateSold = $add['date_sold'];
        $price = $add['price'];
        $description = $add['description'];
        $model = $add['model'];

        $sql = $db->prepare("INSERT INTO `inventory`(`car_id`, `vendor_id`, `vin_num`, `trim`, `make`, `year`, `mileage`, `fuel_type`, `engine_type`, `transmission`, `mpg`, `color`, `drive_train`, `type_of_car`, `date_of_arrival`, `date_sold`, `price`, `description`, `model`) VALUES (null, :vendorId, :vinNum, :inventoryTrim, :make, :inventoryYear, :mileage, :fuelType, :engineType, :transmission, :mpg, :color, :driveTrain, :typeOfCar, NOW(), :dateSold, :price, :description, :model)");
        $sql->bindParam(':vendorId', $vendorId);
        $sql->bindParam(':vinNum', $vinNum);
        $sql->bindParam(':inventoryTrim', $trim);
        $sql->bindParam(':make', $make);
        $sql->bindParam(':inventoryYear', $year);
        $sql->bindParam(':mileage', $mileage);
        $sql->bindParam(':fuelType', $fuelType);
        $sql->bindParam(':engineType', $engineType);
        $sql->bindParam(':transmission', $transmission);
        $sql->bindParam(':mpg', $mpg);
        $sql->bindParam(':color', $color);
        $sql->bindParam(':driveTrain', $driveTrain);
        $sql->bindParam(':typeOfCar', $typeOfCar);
        $sql->bindParam(':dateSold', $dateSold);
        $sql->bindParam(':price', $price);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':model', $model);
        $sql->execute();
        $pk = $db->lastInsertId();

        return $pk;
    }catch(PDOException $e){
        die($e);
    }
}
function viewInventory($db, $vendor_id, $type_of_car, $mileage, $price) { // function that grabs information given through the sort form and displays inventory based on the variables passed through function
    $query = "SELECT inventory.car_id as car_id, inventory.vendor_id as vendor_id, inventory.trim as trim, inventory.year as year, inventory.mileage as mileage, inventory.fuel_type as fuel, inventory.model as model, inventory.price as price,
    vendors.vendor_id, vendors.vendor_name as vendor, inventory.mpg as mpg, inventory.engine_type as engine, inventory.color as color, inventory.type_of_car as type 
    FROM inventory
    INNER JOIN vendors
    ON inventory.vendor_id = vendors.vendor_id ";

    if($vendor_id == "All Makes" && $type_of_car == "All Types" && $mileage == "All Miles" && $price == "All Prices") {
        $query .= " WHERE 1 = 1 ";
    }
    if($vendor_id != "All Makes") {
        $query .= " WHERE inventory.vendor_id = :vendor_id "; }

    if($type_of_car != "All Types") {
        if ($vendor_id == "All Makes") {
            $query .= " WHERE type_of_car = :type_of_car ";
        } else {
            $query .= " AND type_of_car = :type_of_car ";
        }
    }
    if($mileage != "All Miles") {
        if($vendor_id == "All Makes" || $type_of_car == "All Types") {
            $query .= "WHERE mileage < :mileage ";
        } else {
            $query .= " AND mileage < :mileage ";
        }
    }

    if($price == "ASC") {
        $query .= " ORDER BY price ASC ";
    }
    if($price == "DESC") {
        $query .= " ORDER BY price DESC ";
    }

    $sql = $db->prepare($query);
    if($vendor_id != "All Makes") { $sql->bindParam(':vendor_id', $vendor_id); }
    if($type_of_car != "All Types") {$sql->bindParam(':type_of_car', $type_of_car); }
    if($mileage != "All Miles") { $sql->bindParam(':mileage', $mileage); }

    if($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        $table = "<center><table>";
        foreach($results as $result) {
            $sql = $db->prepare("SELECT DISTINCT * FROM images WHERE car_id = :car_id");
            $sql->bindParam(":car_id", $result['car_id']);
            $sql->execute();
            $pic = $sql->fetch(PDO::FETCH_ASSOC);
            $table .= "<tr><td style='padding-right: 10px;'><a href='viewACar.php?car_id=" . $result['car_id'] . "'><img src='/htdocs/capstone" . $pic['image_location'] . "' height='200'/></a></td>";
            $table .= "<td><b><a href='viewACar.php?car_id=" . $result['car_id'] . "'>" . $result['year'] . " " . $result['vendor'] . " " . $result['model'] . " " .  $result['trim'] . "</a></b>
            <Br><br>Engine: " . $result['engine']. "<br>Mileage: " . $result['mileage'] . "<br>MPG: " . $result['mpg'] . "</td>";
            $table .= "<td><br><br>Color: " . $result['color'] . "<br>Fuel: " . $result['fuel'] . "<br>Type: " . $result['type'] . "</td>";
            $table .= "<td align='right' width='200;'><p style='color:firebrick'><b> $" . $result['price'];
            $table .= ".00</p></b></td></tr>";
        }
        $table .= "</table></center>";

    }
    else {
        $table = "<h5 style='color:red'>There is nothing in the inventory with the credentials vendor id: \""  . $vendor_id . "\", \"" . $type_of_car . "\" and \"" .  $mileage . "\" </h5>";
    }
    return $table;
}
function customerViewInventory($db, $vendor_id, $type_of_car, $mileage, $price) { // function that grabs information given through the sort form and displays inventory based on the variables passed through function
    $query = "SELECT inventory.car_id as car_id, inventory.vendor_id as vendor_id, inventory.trim as trim, inventory.year as year, inventory.mileage as mileage, inventory.fuel_type as fuel, inventory.model as model, inventory.price as price,
    vendors.vendor_id, vendors.vendor_name as vendor, inventory.mpg as mpg, inventory.engine_type as engine, inventory.color as color, inventory.type_of_car as type 
    FROM inventory
    INNER JOIN vendors
    ON inventory.vendor_id = vendors.vendor_id ";

    if($vendor_id == "All Makes" && $type_of_car == "All Types" && $mileage == "All Miles" && $price == "All Prices") {
        $query .= " WHERE 1 = 1 ";
    }
    if($vendor_id != "All Makes") {
        $query .= " WHERE inventory.vendor_id = :vendor_id "; }

    if($type_of_car != "All Types") {
        if ($vendor_id == "All Makes") {
            $query .= " WHERE type_of_car = :type_of_car ";
        } else {
            $query .= " AND type_of_car = :type_of_car ";
        }
    }
    if($mileage != "All Miles") {
        if($vendor_id == "All Makes" || $type_of_car == "All Types") {
            $query .= "WHERE mileage < :mileage ";
        } else {
            $query .= " AND mileage < :mileage ";
        }
    }

    if($price == "ASC") {
        $query .= " ORDER BY price ASC ";
    }
    if($price == "DESC") {
        $query .= " ORDER BY price DESC ";
    }

    $sql = $db->prepare($query);
    if($vendor_id != "All Makes") { $sql->bindParam(':vendor_id', $vendor_id); }
    if($type_of_car != "All Types") {$sql->bindParam(':type_of_car', $type_of_car); }
    if($mileage != "All Miles") { $sql->bindParam(':mileage', $mileage); }

    if($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        $table = "<center><table>";
        foreach($results as $result) {
            $sql = $db->prepare("SELECT DISTINCT * FROM images WHERE car_id = :car_id");
            $sql->bindParam(":car_id", $result['car_id']);
            $sql->execute();
            $pic = $sql->fetch(PDO::FETCH_ASSOC);

            $table .= "<tr><td style='padding-right: 10px;'><a href='customerViewACar.php?car_id=" . $result['car_id'] . "'><img src='/htdocs/capstone" . $pic['image_location'] . "' height='200'/></a></td>";
            $table .= "<td><b><a href='customerViewACar.php?car_id=" . $result['car_id'] . "'>" . $result['year'] . " " . $result['vendor'] . " " . $result['model'] . " " .  $result['trim'] . "</a></b>
            <Br><br>Engine: " . $result['engine']. "<br>Mileage: " . $result['mileage'] . "<br>MPG: " . $result['mpg'] . "</td>";
            $table .= "<td><br><br>Color: " . $result['color'] . "<br>Fuel: " . $result['fuel'] . "<br>Type: " . $result['type'] . "</td>";
            $table .= "<td align='right' width='200;'><p style='color:firebrick'><b> $" . $result['price'];
            $table .= ".00</p></b></td></tr>";
        }
        $table .= "</table></center>";

    }
    else {
        $table = "<h5 style='color:red'>There is nothing in the inventory with the credentials vendor id: \""  . $vendor_id . "\", \"" . $type_of_car . "\" and \"" .  $mileage . "\" </h5>";
    }
    return $table;
}
function getVendorsList($db) {
    $sql = $db->prepare("SELECT * FROM vendors ORDER BY vendor_id");
    $vendors = array();
    if($sql->execute() && $sql->rowCount() > 0) {
        $vendors = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $vendors = "there are no vendors in our db.";
    }
    return $vendors;

}
function getCarTypesList($db) {
    $sql = $db->prepare("SELECT DISTINCT type_of_car FROM inventory");
    $types = array();
    if($sql->execute() && $sql->rowCount() > 0) {
        $types = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $types = "there are no cars in our db.";
    }
    return $types;

}
function search($brands, $types, $locate) {
    $ret = "<div style='background-color: lightgray; font-size:20px; padding:10px; margin-bottom:15px;'><table width='100%'><form action=" . $locate . " method='get'>
    <tr><td style='text-align:right;'>
    Sort By Brand: </td>";
    $ret .= "<td><select name='make' id='make' class='search'>";
    $ret .= "<option>All Makes</option>";
    foreach ($brands as $brand) {
        $ret .= "<option value = " . $brand['vendor_id'] . ">" . $brand['vendor_name'] . "</option>";
    }
    $ret .= "</select></div>";
    $ret .= "</td>";

    $ret .= "<td style='text-align:right;'>Sort By Price:</td>";
    $ret .= "<td><select name='price' id='price' class='search' >";
    $ret .= "<option>All Prices</option>";
    $ret .= "<option value = ASC>Ascending</option>";
    $ret .= "<option value = DESC>Descending</option>";
    $ret .= "</select></td></tr>";

    $ret .= "<tr><td style='text-align:right;'>Sort By Car Type: </td>";
    $ret .= "<td><select name='type' id='type' class='search'>";
    $ret .= "<option>All Types</option>";
    foreach ($types as $type) {
        $ret .= "<option value = " . $type['type_of_car'] . ">" . $type['type_of_car'] . "</option>";
    }
    $ret .= "</select>";
    $ret .= "</td>";


    $ret .= "<td style='text-align:right;'>Sort By Mileage: </td>";
    $ret .= "<td><select name='mileage' id='mileage' class='search'>";
    $ret .= "<option>All Miles</option>";
    $ret .= "<option value = 25000>Under 25,000</option>";
    $ret .= "<option value = 50000>Under 50,000</option>";
    $ret .= "<option value = 75000>Under 75,000</option>";
    $ret .= "<option value = 100000>Under 100,000</option>";
    $ret .= "<option value = 100001>Over 100,000</option>";
    $ret .= "</select></td></tr>";
    $ret .= "<tr><th colspan='4' align='center'><center><input type='submit' name='submit' value='Submit' class='btn btn-info my-2 my-sm-0'></center></th></tr>";
    $ret .= "</div>";

    $ret .= "</form></table></div>";

    return $ret;
}
function showCarInfo($db, $car_id, $from) {
    $sql = $db->prepare("SELECT inventory.car_id as car_id, inventory.vendor_id as vendor_id, inventory.trim as trim, inventory.year as year, inventory.mileage as mileage, inventory.fuel_type as fuel, inventory.model as model,
 inventory.price as price, vendors.vendor_id, vendors.vendor_name as vendor, inventory.mpg as mpg, inventory.engine_type as engine, 
 inventory.color as color, inventory.type_of_car as type, inventory.vin_num as vin_num, inventory.transmission as trans, inventory.drive_train as drive_train, inventory.description as description
    FROM inventory
    INNER JOIN vendors
    ON inventory.vendor_id = vendors.vendor_id 
    WHERE inventory.car_id = :car_id");
    $sql->bindParam(":car_id", $car_id);



    if($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $sql = $db->prepare("SELECT * FROM images WHERE car_id = :car_id");
            $sql->bindParam(":car_id", $car_id);
            $sql->execute();
            $pics = $sql->fetchAll(PDO::FETCH_ASSOC);

            $sql = $db->prepare("SELECT * FROM images WHERE car_id = :car_id");
            $sql->bindParam(":car_id", $car_id);
            $sql->execute();
            $carlook = $sql->fetch(PDO::FETCH_ASSOC);

            $int = intval($result['price']);
            $payment = $int / 60;

            $car = "<div class='showcar'><h1>" . $result['year'] . " " . $result['vendor'] . " " . $result['model'] . " " . $result['trim'] . "<p style='float: right;'>";

            if($from != "customer") { $car.= "<a href='inventory.php'><button class='btn btn-secondary' style='margin-top:15px;'>&nbsp;Return</button></a></p></h1><hr>"; }
            if($from == "customer") { $car.= "<a href='customerInventory.php'><button class='btn btn-secondary'>&nbsp;Return</button></a></p></h1><hr>"; }

            $car .= "<div class='incar'><table><tr><td><img src='/htdocs/capstone" . $carlook['image_location'] . "' height='350' style='margin-right:10px;'></td>&nbsp;&nbsp;&nbsp;&nbsp;<td> <p style='font-size: 42; color: firebrick;'><b>$" . $result['price'] . ".00</p></b>
            <br><p style='font-size: 18'>&#x2714; Est. Payment Over 5 years $" . number_format($payment, 2, '.', ',') . " a month!<br>
            &#x2714; All cars get the same 270 point inspection<br>";
            if($from == "customer") {
                $car .= "<button class='btn-success'>Add To Saved Cars!</button>"; }
            if($from != "customer") {
                $car .= "&#x2714;<a href='/htdocs/capstone/index.php'>JOIN the community</a> for a better car buying expierence!<br>
                <a href='locallySaveCar.php?car_id=" . $result['car_id'] . "'><button class='btn btn-success' style='margin-top:10px;'>ADD TO FAVORITES</button></a>";
               // $car .= "<a href='customerSaveCar.php?car_id=" . $result['car_id'] . "'><button class='btn-success'>Add To Saved Cars!</button></a>"; }

        }
            $car .= "</td></tr></table></div><br><div class='descript' style='border-radius:9px; margin-bottom:25px;'>

                <div style='background-color: white; position: relative; right:100px; top: 10px; float:right; width:15%; border-radius:9px;'>
                        <table><tr><td>Model: " . $result['model'] . "</td></tr>
                        <tr><td>Trim: " . $result['trim'] . "</td></tr>
                        <tr><td>Year: " . $result['year'] . "</td></tr>
                        <tr><td>Type: " . $result['type'] . "</td></tr>
                        <tr><td>Color: " . $result['color'] . "</td></tr>
                        <tr><td>Mileage: " . $result['mileage'] . "</td></tr>
                        <tr><td>Engine: " . $result['engine'] . "</td></tr>
                        <tr><td>Transmission: " . $result['trans'] . "</td></tr>
                        <tr><td>Fuel Type: " . $result['fuel'] . "</td></tr>
                        <tr><td>MPG: " . $result['mpg'] . "</td></tr></table>
                    </div>
                    
                    <div style='width: 70%;'>
                    <h1 style='margin-left: 12.5px;'>Description:<br></h1><p style='margin-left: 25px;'>" . $result['description'] . "</p></div>
                    <br>";

            $car .= "</div><div style='margin: auto; margin-left:110px;'>";

            foreach($pics as $pic) {
                    $car .= "<img src='/htdocs/capstone" . $pic['image_location'] . "' height='720' width='1280' style='margin: 0 auto;'><br><br>";

            }
            $car .= "</div>";

            $car .= "</div></div>";
        }
    } else {
        $car = "<h3>This car is not available for viewing right now, sorry</h3>";
    }

    return $car;
}
function customershowCarInfo($db, $car_id, $from) {
    $sql = $db->prepare("SELECT inventory.car_id as car_id, inventory.vendor_id as vendor_id, inventory.trim as trim, inventory.year as year, inventory.mileage as mileage, inventory.fuel_type as fuel, inventory.model as model,
 inventory.price as price, vendors.vendor_id, vendors.vendor_name as vendor, inventory.mpg as mpg, inventory.engine_type as engine, 
 inventory.color as color, inventory.type_of_car as type, inventory.vin_num as vin_num, inventory.transmission as trans, inventory.drive_train as drive_train, inventory.description as description
    FROM inventory
    INNER JOIN vendors
    ON inventory.vendor_id = vendors.vendor_id 
    WHERE inventory.car_id = :car_id");
    $sql->bindParam(":car_id", $car_id);



    if($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $sql = $db->prepare("SELECT * FROM images WHERE car_id = :car_id");
            $sql->bindParam(":car_id", $car_id);
            $sql->execute();
            $pics = $sql->fetchAll(PDO::FETCH_ASSOC);

            $sql = $db->prepare("SELECT * FROM images WHERE car_id = :car_id");
            $sql->bindParam(":car_id", $car_id);
            $sql->execute();
            $carlook = $sql->fetch(PDO::FETCH_ASSOC);


            $int = intval($result['price']);
            $payment = $int / 60;

            $car = "<div style='width:1500px; margin-left: -190px; margin-top: -95px;'><h1>" . $result['year'] . " " . $result['vendor'] . " " . $result['model'] . " " . $result['trim'] . "<p style='float: right;'>";

            if($from != "customer") { $car.= "<a href='inventory.php'><button class='btn btn-secondary' style='margin-top:13px;'>&nbsp;Return</button></a></p></h1><hr>"; }
            if($from == "customer") { $car.= "<a href='customerInventory.php'><button class='btn btn-secondary' style='margin-top:13px;'>&nbsp;Return</button></a></p></h1><hr>"; }

            $car .= "<div class='incar'><table><tr><td><img src='/htdocs/capstone" . $carlook['image_location'] . "' height='350' style='margin-right:10px;'></td>&nbsp;&nbsp;&nbsp;&nbsp;<td> <p style='font-size: 42; color: firebrick;'><b>$" . $result['price'] . ".00</p></b>
            <br><p style='font-size: 18'>&#x2714; Est. Payment Over 5 years $" . number_format($payment, 2, '.', ',') . " a month!<br>
            &#x2714; All cars get the same 270 point inspection<br>";
            if($from == "customer") {
                $car .= "<a href='customerSaveCar.php?car_id=" . $result['car_id'] . "'><button class='btn btn-success' style='margin-top:10px;'>ADD TO FAVORITES</button></a>"; }
            if($from != "customer") {
                $car .= "&#x2714;<a href='/htdocs/capstone/index.php'>JOIN the community</a> for a better car buying expierence!";
            }
            $car .= "</td></tr></table></div><br><div class='descript' style='border-radius:9px; margin-bottom:25px;'>

                <div style='background-color: white; position: relative; right:100px; top: 10px; float:right; width:15%; border-radius:9px;'>
                        <table><tr><td>Model: " . $result['model'] . "</td></tr>
                        <tr><td>Trim: " . $result['trim'] . "</td></tr>
                        <tr><td>Year: " . $result['year'] . "</td></tr>
                        <tr><td>Type: " . $result['type'] . "</td></tr>
                        <tr><td>Color: " . $result['color'] . "</td></tr>
                        <tr><td>Mileage: " . $result['mileage'] . "</td></tr>
                        <tr><td>Engine: " . $result['engine'] . "</td></tr>
                        <tr><td>Transmission: " . $result['trans'] . "</td></tr>
                        <tr><td>Fuel Type: " . $result['fuel'] . "</td></tr>
                        <tr><td>MPG: " . $result['mpg'] . "</td></tr></table>
                    </div>
                    
                    <div style='width: 70%;'>
                    <h1 style='margin-left: 12.5px;'>Description:<br></h1><p style='margin-left: 25px;'>" . $result['description'] . "</p></div>
                    <br>";

            $car .= "</div><div style='margin: auto; margin-left:110px;'>";

            foreach($pics as $pic) {
                $car .= "<img src='/htdocs/capstone" . $pic['image_location'] . "' height='720' width='1280'><br><br>";

            }
            $car .= "</div>";

            $car .= "</div></div>";
        }
    } else {
        $car = "<h3>This car is not available for viewing right now, sorry</h3>";
    }

    return $car;
}
function addImages($db, $pk, $imagePath){
    try{
        for($i = 0; $i < count($imagePath); $i++) {
            $image_location = $imagePath[$i];
            $sql = $db->prepare("INSERT INTO images (`car_id`, `image_location`) VALUES (:car_id, :image_location)"); //loop through and insert each image path into images table
            $sql->bindParam(':car_id', $pk);
            $sql->bindParam(':image_location', $image_location);
            $sql->execute();
        }
        $message = "Image added";
        return $message;
    }catch(PDOException $e){
        die("There was a problem connecting to the database");
    }
}
function getInventoryAsTable($db){
    try{

        $sql = "SELECT 
        inventory.car_id as car_id, 
        inventory.vendor_id as vendor_id,
        inventory.vin_num as vin_num, 
        inventory.trim as trim, 
        vendors.vendor_name as make,
        inventory.year as year, 
        inventory.mileage as mileage, 
        inventory.fuel_type as fuel_type, 
        inventory.engine_type as engine_type, 
        inventory.transmission as transmission, 
        inventory.mpg as mpg, 
        inventory.color as color, 
        inventory.drive_train as drive_train, 
        inventory.type_of_car as type_of_car, 
        inventory.date_of_arrival as date_of_arrival,  
        inventory.description as description,  
        inventory.price as price,
        inventory.model as model,
        vendors.vendor_id as vendor_id, 
        vendors.vendor_name as vendor_name
    FROM inventory
    INNER JOIN vendors
    ON inventory.vendor_id = vendors.vendor_id
        ";
        $sql = $db->prepare($sql);
        $sql->execute(); //executes statement
        $products = $sql->fetchALL(PDO::FETCH_ASSOC); //gets data and dumps it into array called corps.

        if($sql->rowCount() > 0){ //if there is data, pop it out into a dropdown.
            $displayProds = "<div class='container' id='viewInventory'>" . PHP_EOL;
            foreach($products as $product){
                $pk = $product['car_id'];
                $images = getImages($db, $pk);
                //row
                $displayProds .= "<div class='row'>";
                //col 1
                $displayProds .= "<div class='col-lg-4'>";
                $displayProds .= "<h2>" . $product['vendor_name'] . "</h2>";
                $displayProds .= "<h6>" . $product['year']  . " " .  $product['model'] . ", " . $product['trim'] . ", " . $product['type_of_car'] . "</h6>". "</br>";
                $displayProds .= "<span>" . "<h6>Description:</h6> " . $product['description'] . "</span>" . "</br>" . "</br>";
                $displayProds .= "<span>" . "Vin Number: " . $product['vin_num'] . "</span>" . "</br>";
                $displayProds .= "<span>" . "Date of arrival: " . $product['date_of_arrival'] . "</span>" . "</br>";
                $displayProds .= "<span>" . "Price: " . $product['price'] . "</span>" . "</br>";
                $displayProds .= "</br><hr>";
                $displayProds .= "</br>";
                $displayProds .= "</div>";

                //col 2
                $displayProds .= "<div class='col-lg-4'>";
                $displayProds .= "<div class='flex-container'>";
                foreach($images as $image){
                    $displayProds .= "<div class='flexItem'>";
                    $displayProds .= "<img src='.." . $image['image_location'] . "' alt='' height='140px' width='auto'>";
                    $displayProds .= "</div>";

                }
                $displayProds .= "</div>";
                $displayProds .= "</div>";

                //col 3
                $displayProds .= "<div class='col-lg-4'>";
                $displayProds .= "</div>";

                //close row
                $displayProds .= "</div>";
            }
            $displayProds .= "</div>" . PHP_EOL;

        } else { //if there is not any data, say so.
            $displayProds = "NO DATA" . PHP_EOL;
        }
        return $displayProds; //return it.

    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die($e . "There was a problem finding inventory");
    }
}
function findUsername($db, $customer_id) {
    $sql = $db->prepare("SELECT * FROM customers WHERE customer_id = :customer_id");
    $sql->bindParam(':customer_id', $customer_id);

    $sql->execute();
    $username = $sql->fetch(PDO::FETCH_ASSOC);
    return $username;
}
function displaySavedCars($db, $customer_id) {
    $sql = $db->prepare("SELECT DISTINCT saved_cars.car_id as saved_car_id, inventory.car_id as car_id, inventory.vendor_id as vendor_id, inventory.trim as trim, inventory.year as year, inventory.mileage as mileage, inventory.fuel_type as fuel, inventory.model as model,
 inventory.price as price, vendors.vendor_id, vendors.vendor_name as vendor, inventory.mpg as mpg, inventory.engine_type as engine, 
 inventory.color as color, inventory.type_of_car as type, inventory.vin_num as vin_num, inventory.transmission as trans, inventory.drive_train as drive_train, inventory.description as description 
  FROM saved_cars 
  INNER JOIN inventory
  ON saved_cars.car_id = inventory.car_id
  INNER JOIN vendors
  ON vendors.vendor_id = inventory.vendor_id
  WHERE customer_id = :customer_id 
  ORDER BY date_saved ASC");
    $sql->bindParam(':customer_id', $customer_id);

    if($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        $table = "<center><table>";
            foreach($results as $result) {

                $sql = $db->prepare("SELECT * FROM images WHERE car_id = :car_id");
                $sql->bindParam(":car_id", $result['car_id']);
                $sql->execute();
                $carlook = $sql->fetch(PDO::FETCH_ASSOC);


                $table .= "<tr><td style='padding-right: 25px;'><a href='unsaveCar.php?car_id=" . $result['car_id'] . "'><button class='btn btn-danger'><i id='trash' class='fa fa-trash'></i></button></a></td>

                <td style='padding-right: 10px;'><a href='customerViewACar.php?car_id=" . $result['car_id'] . "'>
                <img src='/htdocs/capstone" . $carlook['image_location'] . "' height='200'/></a></td>";
                $table .= "<td><b><a href='customerViewACar.php?car_id=" . $result['car_id'] . "'>" . $result['year'] . " " . $result['vendor'] . " " . $result['model'] . " " .  $result['trim'] . "</a></b>
            <Br><br>Engine: " . $result['engine']. "<br>Mileage: " . $result['mileage'] . "<br>MPG: " . $result['mpg'] . "</td>";
                $table .= "<td><br><br>Color: " . $result['color'] . "<br>Fuel: " . $result['fuel'] . "<br>Type: " . $result['type'] . "</td>";
                $table .= "<td align='right' width='200;'><p style='color:firebrick'><b> $" . $result['price'];
                $table .= ".00</p></b></td></tr>";
            }
            $table .= "</table></center>";

        } else {
        $table = "<h2>There are no saved cars in your inventory</h2>";
    }

    return $table;
}
function deleteImages($db, $carId){
    try{
        $sql = $db->prepare("DELETE FROM images WHERE car_id=:car_id"); //select all with a particular id (primary key)
        $sql->bindParam(':car_id', $carId, PDO::PARAM_INT);
        $sql->execute();
        $success = "Record successfully deleted";
        return $success;
    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was an error deleting the record");
    }
}
function getImages($db, $pk){
    try{
        $sql = "SELECT * FROM images WHERE car_id=$pk";
        $sql = $db->prepare($sql);
        $sql->execute(); //executes statement
        $images = $sql->fetchALL(PDO::FETCH_ASSOC); //gets data and dumps it into array called corps.
        return $images; //return it.
    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die($e . "There was a problem finding inventory");
    }
}
function locallySavedCar($db, $car_id) {
    $sql = $db->prepare("SELECT inventory.car_id as car_id, inventory.vendor_id as vendor_id, inventory.trim as trim, inventory.year as year, inventory.mileage as mileage, inventory.fuel_type as fuel, inventory.model as model, inventory.price as price,
    vendors.vendor_id, vendors.vendor_name as vendor, inventory.mpg as mpg, inventory.engine_type as engine, inventory.color as color, inventory.type_of_car as type 
    FROM inventory
    INNER JOIN vendors
    ON inventory.vendor_id = vendors.vendor_id
    WHERE car_id = :car_id");
    $sql->bindParam(":car_id", $car_id);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);

        $sql = $db->prepare("SELECT DISTINCT * FROM images WHERE car_id = :car_id");
        $sql->bindParam(":car_id", $result['car_id']);
        $sql->execute();
        $pic = $sql->fetch(PDO::FETCH_ASSOC);

        $table = "<tr><td style='padding-right: 10px;'><a href='customerViewACar.php?car_id=" . $result['car_id'] . "'><img src='/htdocs/capstone" . $pic['image_location'] . "'  height='200'/></a></td>";
        $table .= "<td><b><a href='customerViewACar.php?car_id=" . $result['car_id'] . "'>" . $result['year'] . " " . $result['vendor'] . " " . $result['model'] . " " .  $result['trim'] . "</a></b>
            <Br><br>Engine: " . $result['engine']. "<br>Mileage: " . $result['mileage'] . "<br>MPG: " . $result['mpg'] . "</td>";
        $table .= "<td><br><br>Color: " . $result['color'] . "<br>Fuel: " . $result['fuel'] . "<br>Type: " . $result['type'] . "</td>";
        $table .= "<td align='right' width='200;'><p style='color:firebrick'><b> $" . $result['price'];
        $table .= ".00</p></b></td></tr>";
    return $table;
}