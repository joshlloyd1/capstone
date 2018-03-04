<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/6/2018
 * Time: 10:28 AM
 */
include_once ('functions.php');
include_once ('dbconnect.php');
include_once ('header.html');

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
        $newUser = newUser('Log In');
        $newUser .= addUser();
        echo $newUser;
        break;
    case 'Log In':
        header('Location: LogIn.php');
        break;
    case 'submit':
        if($password == $passwordRE) {
            $validatecheck = validate($firstName, $lastName, $username, $password);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "<h2>Invalid email format</h2>";
                echo addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE); // shows form again with origionally entered info so user doesn't have to start all over again
                echo $emailErr;
                $newUser = newUser('Log In');
                echo $newUser;
            }
            else {
                if($validatecheck == 1) {
                    $newUser = newUser('Log In');
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo $newUser;
                    echo "problem in name";
                }
                if($validatecheck == 2) {
                    $newUser = newUser('Log In');
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo $newUser;
                    echo "problem in phone number";
                }
                if($validatecheck == 3) {
                    $newUser = newUser('Log In');
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo $newUser;
                    echo "problem in username";
                }
                if(phoneCheck($phoneNum) != 0) {
                    $newUser = newUser('Log In');
                    $newUser .= addUser($firstName, $lastName, $phoneNum, $email, $username, $password, $passwordRE);
                    echo $newUser;
                    echo "Invalid phone number";
                }
                if($validatecheck == 0 && phoneCheck($phoneNum) == 0) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $users = storeNewUser($db, $firstName, $lastName, $email, $phoneNum, $username, $hash);
                    $newUser = newUser('LogIn');
                    echo $newUser;
                    echo addUser();
                    echo "<h1>$users</h1>";
                }

            }
        }

}
include_once ("footer.html");