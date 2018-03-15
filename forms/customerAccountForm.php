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
            $sql = $db->prepare("UPDATE customers SET customer_fname = :customer_fname, customer_lname = :customer_lname, customer_email = :customer_email, customer_phone = :customer_phone WHERE customer_id = :customer_id");

            $sql->bindParam('customer_id', $_SESSION['username']);
            $sql->bindParam(':customer_fname', $customer_fname);
            $sql->bindParam(':customer_lname', $customer_lname);
            $sql->bindParam(':customer_email', $customer_email);
            $sql->bindParam(':customer_phone', $customer_phone);

            if ($sql->execute()) {
                $result = "Updated your account!";
                echo getMessage($result);
            }
        }
        if ($customer_password != "") {
            if ($customer_password = $passwordRE) {

                $cleanPhoneNum = preg_replace("/[^0-9]/", "", $customer_phone); //strips all non-numeric values from phone number before storing to db.
                $sql = $db->prepare("UPDATE customers SET customer_fname = :customer_fname, customer_lname = :customer_lname, customer_email = :customer_email, customer_phone = :customer_phone, customer_password = :customer_password WHERE customer_id = :customer_id");

                $sql->bindParam('customer_id', $_SESSION['username']);
                $sql->bindParam(':customer_fname', $customer_fname);
                $sql->bindParam(':customer_lname', $customer_lname);
                $sql->bindParam(':customer_email', $customer_email);
                $sql->bindParam(':customer_phone', $cleanPhoneNum);
                $sql->bindParam(':customer_password', $customer_password);

                if ($sql->execute()) {
                    $result = "Updated your account and changed password!";
                    echo getMessage($result);
                }


            }
        }
    }

    $cust = getCustomer($db, $_SESSION['username']);
    echo Custform($cust['customer_fname'], $cust['customer_lname'], $cust['customer_phone'], $cust['customer_email']);

}



function Custform($first, $last, $phone, $email)
{
    $form = "<div class='container'>
                <section>
                    <form method='post' action='' enctype='multipart/form-data'>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <h1>My Account</h1>
                                <div class='form-group'>
                                    <label for='firstName'>First Name: </label>
                                    <input type='text' class='form-control' name='f_name' id='f_name'  placeholder='First Name' value='$first' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>   
                                  
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label for='lastName'>Last Name: </label>
                                    <input type='text' class='form-control' name='l_name' id='l_name' placeholder='Last Name' value='$last' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label for='phoneNum'>Phone Number: </label>
                                    <input type='text'
                                           class='form-control'
                                           id='phone_num'
                                           name='phone_num'
                                           placeholder='Phone Number'
                                           value='$phone'
                                           required pattern='^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$'
                                           data-toggle='tooltip'
                                           title='Please enter a valid 10 digit phone number ex: (123)123-1234'
                                    >
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label for='email'>Email: </label>
                                    <input type='text' class='form-control' name='email' id='email'  placeholder='Email' value='$email' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                     <label for='password'>Password: </label>
                                     <input type='password' class='form-control' name='newpassword' id = 'newpassword' placeholder='Password' value='' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>                                
                                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                     <label for='passwordRE'>Re enter Password: </label>
                                     <input type='password' class='form-control' name='newpasswordRE' id = 'newpasswordRE' placeholder='Re-enter Password' value='' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>                         
            
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                     <input type='submit' class='btn btn-primary' name='submit' value='submit' style='margin-top:15px;' />
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>                    
                    </form>
                </section>
        </div>";
    return $form;
}