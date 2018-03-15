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
        $position = filter_input(INPUT_POST, 'position');
        $phoneNum = filter_input(INPUT_POST, 'phoneNum');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $passwordRE = filter_input(INPUT_POST, 'passwordRE');
        $db = dbconnect();
        if(1 == 1) {
            if ($password != $passwordRE) {
                echo "passwords must match!";
            } else {
                echo 'Success! ';
                $cleanPhoneNum = preg_replace("/[^0-9]/", "", $phoneNum); //strips all non-numeric values from phone number before storing to db.
                $result = addEmployee($db, $firstName, $lastName, $email, $cleanPhoneNum, $position, $username, $password, $og_name);
                echo getMessage($result);
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
    $form = "<div class='container'>
                <section>
                    <form method='post' action='' enctype='multipart/form-data'>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <h1>Add Employee</h1>
                                <div class='form-group'>
                                    <label for='firstName'>First Name: </label>
                                    <input type='text' class='form-control' name='firstName' id='firstName'  placeholder='First Name' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>   
                                  
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label for='lastName'>Last Name: </label>
                                    <input type='text' class='form-control' name='lastName' id='lastName' placeholder='Last Name' required/>
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
                                           id='phoneNum'
                                           name='phoneNum'
                                           placeholder='Phone Number'
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
                                    <input type='text' class='form-control' name='email' id='email'  placeholder='Email' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label for='username'>Position: </label>
                                    <input type='text' class='form-control' name='position' id='position'  placeholder='Position' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>
                                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                     <label for='username'>Username: </label>
                                     <input type='text' class='form-control' name='username' id='username' placeholder='User Name' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>                
                                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                     <label for='password'>Password: </label>
                                     <input type='password' class='form-control' name='password' id='password' placeholder='Password' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>                                
                                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                     <label for='passwordRE'>Re enter Password: </label>
                                     <input type='password' class='form-control' name='passwordRE' id='passwordRE' placeholder='Re-enter Password' required/>
                                </div>
                            </div>
                            <div class='col-lg-4'></div>
                            <div class='col-lg-4'></div>
                        </div>                         
                                        
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                     <label for='photo'>Profile Picture: </label>
                                     <input type='file' name='file' required/>
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
echo $form;