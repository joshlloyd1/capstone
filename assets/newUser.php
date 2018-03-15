<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/6/2018
 * Time: 10:28 AM
 */
include_once ('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? null;
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) ?? "";
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) ?? "";
$passwordRE = filter_input(INPUT_POST, 'passwordRE', FILTER_SANITIZE_STRING) ?? "";

$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING) ?? "";
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING) ?? "";
$phoneNum = filter_input(INPUT_POST, 'phoneNum', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";

$db = dbconnect();

switch ($action) {
    default:
        echo AddUser();
        break;
    case 'submit':
        if($password == $passwordRE) {
            $validatecheck = validate($firstName, $lastName, $username, $password);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "<h2>Invalid email format</h2>";
                echo AddUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE); // shows form again with origionally entered info so user doesn't have to start all over again
                echo $emailErr;
            }
            else {


                if($validatecheck == 1) {
                    echo AddUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE); //fills out form if not valid

                    $result = "problem in name";
                    echo getMessage($result);
                }
                if($validatecheck == 2) {
                    echo AddUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE); //fills out form if not valid
                    $result = "problem in phone number";
                    echo getMessage($result);
                }
                if($validatecheck == 3) {
                    echo AddUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE); //fills out form if not valid
                    $result = "problem in username";
                    echo getMessage($result);
                }
                if(phoneCheck($phoneNum) != 0) {
                    echo AddUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE); //fills out form if not valid
                    $result = "Invalid phone number";
                    echo getMessage($result);
                }
                if($validatecheck == 0 && phoneCheck($phoneNum) == 0) { //passed valildation and stores new user
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $users = StoreNewUser($db, $firstName, $lastName, $email, $phoneNum, $username, $hash);
                    echo AddUser();
                    echo "<h1>$users</h1>";
                }

            }
        }

}
include_once ("footer.html");
function AddUser($firstName = "", $lastName = "", $phoneNum = "", $email = "", $username = "", $password = "", $passwordRE = "") {
    $form = "<div style='position:relative; width:100%; background-color:#f7f7f7; height:375px;'>
    <section>
           <div style='float:right; width:25%; margin-right:300px; margin-top:28px;'>
                 <h1>Sign Up!</h1><br>
                 <form method='post' action=/htdocs/capstone/index.php>
                 
                 <div class='row'>
                    <div class='col-12'>
                        <div class='form-group'>                     
                            <input type='text' name='username' id='username' class='form-control'  placeholder='Username' value='$username'/>
                        </div>
                    </div>                   
                 </div>
                 
                 <div class='row'>
                    <div class='col-6'>
                        <div class='form-group'>                     
                            <input type='text' name='firstName' id='firstName' class='form-control form-control-sm'  placeholder='First Name' value='$firstName'/> 
                        </div>
                    </div>
                  
                    <div class='col-6'>
                        <div class='form-group'>   
                            <input type='text' name='lastName' id='lastName' class='form-control form-control-sm'  placeholder='Last Name' value='$lastName'/>
                         </div>   
                    </div>
                 </div>
                 
                 <div class='row'>
                    <div class='col-6'>
                        <div class='form-group'>                     
                            <input type='password' name='password' id='password' class='form-control form-control-sm'  placeholder='Password' value='$password'/>
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class='form-group'>   
                            <input type='password' name='passwordRE' id='passwordRE' class='form-control form-control-sm'  placeholder='Re Enter Password' value='$passwordRE'/>
                        </div>   
                    </div>
                 </div>
                 
                 <div class='row'>
                    <div class='col-6'>
                        <div class='form-group'>                       
                            <input type='text' name='phoneNum' id='phoneNum' class='form-control form-control-sm'  placeholder='Phone Number' value='$phoneNum'/>
                        </div>
                    </div>
                  
                    <div class='col-6'>
                        <div class='form-group'>
                            <input type='text' name='email' id='email' class='form-control form-control-sm'  placeholder='Email' value='$email'/>
                        </div>   
                    </div>
                   
                 </div>
                 
                 <div class='row'>
                    <div class='col-12'>
                        <div class='form-group'>                     
                            <input type='hidden' name='action' value='submit' />
                        <input type='submit' class='btn btn-outline-primary' /><br><label for='nothing' ></label>
                        </div>
                    </div>
                 </div>
           </div>
           </form>
           <div style='float:left; margin-left:300px; margin-top:36px;'><img src='images/car.jpg' width='400px'></div>
    </section>
</div>";
    return $form;
}
