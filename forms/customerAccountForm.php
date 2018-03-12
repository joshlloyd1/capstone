<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 2/21/2018
 * Time: 9:49 AM
 */
include_once ("../assets/dbconnect.php");
include_once ("../assets/functions.php");
//if(isset)
$db = dbconnect();
$action = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? "";

if($action == ""){
$cust = getCustomer($db, $_SESSION['username']);
echo Custform($cust['customer_fname'], $cust['customer_lname'], $cust['customer_phone'], $cust['customer_email']);
}

if($action == "submit") {
    $customer_fname = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING) ?? "";
    $customer_lname = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING) ?? "";
    $customer_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
    $customer_phone = filter_input(INPUT_POST, 'phone_num', FILTER_SANITIZE_STRING) ?? "";
    $customer_password = filter_input(INPUT_POST, 'newpassword', FILTER_SANITIZE_STRING) ?? "";
    $passwordRE = filter_input(INPUT_POST, 'newpasswordRE', FILTER_SANITIZE_STRING) ?? "";
    $var = 0;
    if($var == 0) {
        if ($customer_password == "") {
            $sql = $db->prepare("UPDATE customers SET customer_fname = :customer_fname, customer_lname = :customer_lname, customer_email = :customer_email, customer_phone = :customer_phone");

            $sql->bindParam(':customer_fname', $customer_fname);
            $sql->bindParam(':customer_lname', $customer_lname);
            $sql->bindParam(':customer_email', $customer_email);
            $sql->bindParam(':customer_phone', $customer_phone);

            if ($sql->execute() && $sql->rowCount() == 1) {
                $msg = "<h1>Updated your account!</h1>";
            }
        }
        if ($customer_password != "") {
            if ($customer_password = $passwordRE) {
                $sql = $db->prepare("UPDATE customers SET customer_fname = :customer_fname, customer_lname = :customer_lname, customer_email = :customer_email, customer_phone = :customer_phone, customer_password = :customer_password");

                $sql->bindParam(':customer_fname', $customer_fname);
                $sql->bindParam(':customer_lname', $customer_lname);
                $sql->bindParam(':customer_email', $customer_email);
                $sql->bindParam(':customer_phone', $customer_phone);
                $sql->bindParam(':customer_password', $customer_password);

                if ($sql->execute() && $sql->rowCount() == 1) {
                    $msg = "<h4>Updated your account and changed password!</h4>";
                }


            }
        }
    }

    $cust = getCustomer($db, $_SESSION['username']);
    echo $msg;
    echo Custform($cust['customer_fname'], $cust['customer_lname'], $cust['customer_phone'], $cust['customer_email']);

}



function Custform($first, $last, $phone, $email)
{
    $form = "<div class='container' class='col-md-6 box'><div class='form-control-danger'><section><form method='post' action='' enctype='multipart/form-data'>
        <label for='f_name'>First Name: </label><br>
        <input type='text' name='f_name' id = 'f_name' style='text-align:center;' value='$first'/><br>
        <label for='l_name'>Last Name: </label><br>
        <input type='text' name='l_name' id = 'l_name' style='text-align:center;' value='$last'/><br>
        <label for='email'>Email: </label><br>
        <input type='email' name='email' id = 'email' style='text-align:center;' value='$email'/><br>

        <label for='phone_num'>Phone Number: </label><br>
        <input type='text' name='phone_num' id = 'phone_num' style='text-align:center;' value='$phone' pattern='\d{3}[\-]\d{3}[\-]\d{4}'/><br>
        <label for='newpassword'>Change Password: </label><br>
        <input type='password' name='newpassword' id = 'newpassword' style='text-align:center;' value=''/><br>
        <label for='newpasswordRE'>Re enter Password: </label><br>
        <input type='password' name='newpasswordRE' id = 'newpasswordRE' style='text-align:center;' value=''/><br>
        
        <input type='submit' name='submit' value='submit' />
    </form></section></div></div>";
    return $form;
}