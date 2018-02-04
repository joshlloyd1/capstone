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

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


switch($action) {
    case 'submitt':
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $valid = checkUserCustomer($db, $username, $password, $passwordhash);
        if($valid > 0) { // if user exists brings to CUSTOMER PAGE
            $_SESSION['username'] = $valid;
            $_SESSION['access'] = true;
            header('Location: CustomerHomePage.php');
        }
        if($valid == -1) { // user exists but gave wrong password brings back to log in
            $_SESSION['access'] = false;
            $form = LoginForm($username, $password);
            echo $form;
            echo "<h3 style='text-align: center'>Incorrect password</h3>";
        }
        if($valid == 0) { // if no user under username exists
            $admin = checkUserEmployee($db, $username, $password, $passwordhash);
            if($admin > 0) { // if an admin account was found brings to ADMIN PAGE
                $_SESSION['username'] = $valid;
                $_SESSION['adminaccess'] = true;
                header('Location: AdminHomePage.php');
            }
            if($admin = -1) {
                $_SESSION['access'] = false;
                $_SESSION['adminaccess'] = false;
                $form = LoginForm($username, $password);
                echo $form;
                echo "<h3 style='text-align: center'>Incorrect password</h3>";
            }
            if($admin == 0) {
                $_SESSION['access'] = false;
                $_SESSION['adminaccess'] = false;
                $form = LoginForm($username, $password);
                echo $form;
                echo "<h3 style='text-align: center'>User doesn't exist</h3>";
            }
        }
        if($valid || $admin == -2) {
            $_SESSION['access'] = false;
            $_SESSION['adminaccess'] = false;
            $form = LoginForm($username, $password);
            echo $form;
            echo "<h3 style='text-align: center'>We apologize, there was a problem 
            getting into database</h3>";
        }
    default:
        $_SESSION['access'] = false;
        echo NewUser("New User");
        echo LoginForm();
        break;
}
include_once("assets/footer.html");
?>
</body>
</html>