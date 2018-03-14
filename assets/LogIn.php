<?php
session_start();
include_once("functions.php");
include_once("header.php");
include_once("dbconnect.php");

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$db = dbconnect();

switch($action) {
    case 'submit':

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $valid = checkUserCustomer($db, $username, $password, $passwordhash);
        if($valid > 0) { // if user exists brings to CUSTOMER PAGE
            $_SESSION['username'] = $valid;
            $_SESSION['access'] = true;
            header('Location: customerSavedCars.php');
        }
        if($valid == -1) { // user exists but gave wrong password brings back to log in
            $_SESSION['access'] = false;
            $result = "Incorrect password";
            echo getMessage($result);

            $form = LoginForm($username, $password);
            echo $form;

        }
        if($valid == 0) { // if no user under username exists
            $admin = checkUserEmployee($db, $username, $password, $passwordhash);
            if($admin > 0) { // if an admin account was found brings to ADMIN PAGE
                $_SESSION['username'] = $valid;
                $_SESSION['adminaccess'] = true;
                header('Location: AdminInventory.php');
                $_SESSION['employee_id'] = $admin;
            }
            if($admin = -1) {
                $_SESSION['access'] = false;
                $_SESSION['adminaccess'] = false;
                $form = LoginForm($username, $password);

                $result = "Incorrect password";
                echo getMessage($result);

                echo $form;


            }
            if($admin == 0) {
                $_SESSION['access'] = false;
                $_SESSION['adminaccess'] = false;
                $form = LoginForm($username, $password);
                $result = "User doesn't exist";
                echo getMessage($result);

                echo $form;

            }
        }
        if($valid || $admin == -2) {
            $_SESSION['access'] = false;
            $_SESSION['adminaccess'] = false;

            $result = "We apologize, there was a problem 
            getting into database";
            echo getMessage($result);

            echo LoginForm();
        }
        break;
    case 'register':
        header('Location: newUser.php');
        break;
    default:
        $_SESSION['access'] = false;
        echo LoginForm();
        break;
}
include_once("footer.html");
?>
