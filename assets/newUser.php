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
        echo addUser();
        break;
    case 'submit':
        if($password == $passwordRE) {
            $validatecheck = validate($firstName, $lastName, $username, $password);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "<h2>Invalid email format</h2>";
                echo addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE); // shows form again with origionally entered info so user doesn't have to start all over again
                echo $emailErr;
            }
            else {
                if($validatecheck == 1) {
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo "problem in name";
                }
                if($validatecheck == 2) {
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo "problem in phone number";
                }
                if($validatecheck == 3) {
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo "problem in username";
                }
                if(phoneCheck($phoneNum) != 0) {
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo "Invalid phone number";
                }
                if($validatecheck == 0 && phoneCheck($phoneNum) == 0) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $users = storeNewUser($db, $firstName, $lastName, $email, $phoneNum, $username, $hash);
                    echo addUser();
                    echo "<h1>$users</h1>";
                }

            }
        }

}
include_once ("footer.html");
function AddUser($firstName = "", $lastName = "", $phoneNum = "", $email = "", $username = "", $password = "", $passwordRE = "") {
    $form = "<div style='position:relative; text-align:center; width:100%;background-color:#f7f7f7; height:375px;'><section><form method='post' action=/htdocs/capstone/index.php>
        <h1 style='float:right; padding-right:250px;'>New User</h1><br><BR>
        <div style='position:absolute; right:30%;'><br>
        <input type='firstName' name='firstName' id = 'firstName' style='text-align:center;' placeholder='First Name' value='$firstName'/>
        <input type='lastName' name='lastName' id = 'lastName' style='text-align:center;' placeholder='Last Name' value='$lastName'/><br><br>
        <input type='phoneNum' name='phoneNum' id = 'phoneNum' style='text-align:center;' placeholder='Phone Number' value='$phoneNum'/>
                <input type='text' name='email' id = 'email' style='text-align:center;' placeholder='Email' value='$email'/><br><br>
            <input type='text' name='username' id = 'username' style='text-align:center;' placeholder='Username' value='$username'/><br>

        <input type='password' name='password' id = 'password' style='text-align:center;' placeholder='Password' value='$password'/><br>
        <input type='password' name='passwordRE' id = 'passwordRE' style='text-align:center;' placeholder='Re Enter Password' value='$passwordRE'/><br>
        <br>
        <input type='hidden' name='action' value='submit' />
        <input type='submit' /><br><label for='nothing' ></label>
        </div>
        <div style='float: left; position: absolute; top:11px; left:7%;' ><img src='images/car.jpg' width='400px' height='350px'></div>

    </form></section></div>";
    return $form;
}
