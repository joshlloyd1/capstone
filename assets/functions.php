
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
            if (password_verify($$password, $results['customer_password'])) {
                $user_id = $results['user_id'];
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
function checkUserEmployee($db, $employee_username, $password, $hash) {
    $sql = $db->prepare("SELECT * FROM employees WHERE employee_username = :employee_username");
      $binds = array(
          ":employee_username" => $employee_username,
      );
    if($sql->execute($binds)) {
        $results = $sql->fetch(PDO::FETCH_ASSOC);
        $rows = $sql->rowCount();
        if($rows == 1) {
            if(password_verify($password, $results['password'])) {
                $user_id = $results['user_id'];
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
    $form .= "<input type='hidden' name='action' value='register' /><input type='submit' name='action' value='$newpage' style='height: 80px; width: 180px; font-size : 20px;'/></form></div>";
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

                $dropDown .= "<a class='dropdown-item' href='#'>" . $vendor['vendor_name'] . "</a>";
            }
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
            $displayVendors = "<div class='container'>" . PHP_EOL;
                $displayVendors .= "<div class='visibleDiv'>" . PHP_EOL;
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
            $displayVendors .= "</div>" . PHP_EOL;

        } else { //if there is not any data, say so.
            $displayVendors = "NO DATA" . PHP_EOL;
        }
        return $displayVendors; //return it.

    }catch(PDOException $e){ //if it fails, throw the exception and display error message.
        die("There was a problem creating drop down");
    }
}
function addVendor($db, $vendorName, $vendorContactFname, $vendorContactLname, $vendorEmail, $vendorPhone, $vendorCountry, $vendorCity, $vendorState, $vendorZipCode){
    try{
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
