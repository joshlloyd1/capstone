<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 2/7/2018
 * Time: 9:58 AM
 */
include_once ("../assets/dbconnect.php");
include_once ("../assets/functions.php");
$db = dbconnect();
// NEW PRODUCT PAGE TO ADD A NEW PRODUCT
$max_size = 2097152; //2 mb
$location = "../images/"; //where the file is going



if (isset($_POST['submit'])) { //checking for anything will break the code
    $name = $_FILES['file']['name']; //file name
    $size = $_FILES['file']['size']; //file size
    $type = $_FILES['file']['type']; //file type
    $tmp_name = $_FILES['file']['tmp_name']; //temp location on server
    if(checkType($name, $type) && checkSize($size, $max_size)){
        if (isset($name)) {
            save_file($tmp_name, $name, $location); //call my function
        }
    }
} else {
    echo '<br>Please select a file:';
}
function checkType($name, $type){
    //$extension = strtolower(substr($name, strpos($name, '.') + 1)); //get the extension
    $extension = pathinfo($name, PATHINFO_EXTENSION); //better way to get extension
    if (!empty($name)) {
        if (($extension == 'jpg' || $extension == 'png') && ($type == 'image/jpeg' || $type == 'image/png')) {
            return true;
        } else{
            echo 'That is not a jpg';
            return false;
        }
    }
}
function checkSize($size, $max_size){
    if($size <= $max_size){
        return true;
    } else{
        echo 'File is too large. Max size in 30KB.';
        return false;
    }
}
function fileExists($name){
    $filename = rand(1000,9999).md5($name).rand(1000, 9999);
    echo $filename;
    return false;
}
function save_file($tmp_name, $name, $location){
    $og_name = $name;
    //so long as the name is in existance - loop to check new name after it is generated
    while (file_exists('images/' . $name)) {
        echo 'File already exists. Generating name.<br/>';
        $rand = rand(10000, 99999);
        $name = $rand . '.' . pathinfo($name, PATHINFO_EXTENSION); //create new name
    }
    if (move_uploaded_file($tmp_name, $location . $name)) {

        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $email = filter_input(INPUT_POST, 'email');
        $phoneNum = filter_input(INPUT_POST, 'phoneNum');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $passwordRE = filter_input(INPUT_POST, 'passwordRE');
        $db = dbconnect();
        if(is_numeric(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phoneNum))) {
            if ($password != $passwordRE) {
                echo "passwords must match!";
            } else {
                echo 'Success! ';
                echo addEmployee($db, $firstName, $lastName, $email, $phoneNum, $username, $password, $og_name);
            }
        }
        else {
            echo "Phone number must be a read phone number";
        }
        if(!($og_name==$name)){ //if original name != name
            echo ' and renamed to '.$name.'.<br/>';
        } else{
            echo '.';
        }
    } else {
        echo 'ERROR!';
    }
}


$form = "<div style='position:relative; margin:auto; text-align:center; border:1px solid black; width:400px;'><section><form method='post' action='' enctype='multipart/form-data'>
        <h1>Add Employee</h1>
        <label for='firstName'>First Name: </label><br>
        <input type='firstName' name='firstName' id = 'firstName' style='text-align:center;' /><br>
        <label for='lastName'>Last Name: </label><br>
        <input type='lastName' name='lastName' id = 'lastName' style='text-align:center;'/><br>
        <label for='phoneNum'>Phone Number: </label><br>
        <input type='phoneNum' name='phoneNum' id = 'phoneNum' style='text-align:center;' /><br>
        <label for='email'>Email: </label><br>
                <input type='text' name='email' id = 'email' style='text-align:center;' /><br>
        <label for='username'>Username: </label><br>
            <input type='text' name='username' id = 'username' style='text-align:center;'/><br>

        <label for='password'>Password: </label><br>
        <input type='password' name='password' id = 'password' style='text-align:center;'/><br>
        <label for='passwordRE'>Re enter Password: </label><br>
        <input type='password' name='passwordRE' id = 'passwordRE' style='text-align:center;'/><br>
            <label for='photo'>Profile Picture: </label>
            <input type='file' name='file'/> <br>
        <input type='submit' name='submit' value='submit' />
    </form></section></div>";


    echo $form;
