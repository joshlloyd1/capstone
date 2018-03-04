<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
</head>
<body>
<?php
session_start();
include_once("functions.php");
include_once("header.html");
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
            header('Location: loginSuccess.php');
        }
        if($valid == -1) { // user exists but gave wrong password brings back to log in
            $_SESSION['access'] = false;
            $form = loginForm($username, $password);
            echo $form;
            echo "<h3 style='text-align: center'>Incorrect password</h3>";
        }
        if($valid == 0) { // if no user under username exists
            $admin = checkUserEmployee($db, $username, $password, $passwordhash);
            if($admin > 0) { // if an admin account was found brings to ADMIN PAGE
                $_SESSION['username'] = $valid;
                $_SESSION['adminaccess'] = true;
                header('Location: AdminHeader.php');
                $_SESSION['employee_id'] = $admin;
            }
            if($admin = -1) {
                $_SESSION['access'] = false;
                $_SESSION['adminaccess'] = false;
                $form = loginForm($username, $password);
                echo $form;
                echo "<h3 style='text-align: center'>Incorrect password</h3>";
            }
            if($admin == 0) {
                $_SESSION['access'] = false;
                $_SESSION['adminaccess'] = false;
                $form = loginForm($username, $password);
                echo $form;
                echo "<h3 style='text-align: center'>User doesn't exist</h3>";
            }
        }
        if($valid || $admin == -2) {
            $_SESSION['access'] = false;
            $_SESSION['adminaccess'] = false;
            echo "<h3 style='text-align: center'>We apologize, there was a problem 
            getting into database</h3>";
        }
        break;
    case 'register':
        header('Location: newUser.php');
        break;
    default:
        $_SESSION['access'] = false;
        echo newUser("register");
        echo loginForm();
        break;
}
include_once("footer.html");
?>
</body>
</html>