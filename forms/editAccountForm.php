<?php
include_once ("../assets/dbconnect.php");
include_once ("../assets/functions.php");
$db = dbconnect();
$max_size = 2097152; //2 mb
$location = '../images/'; //where the file is going
if (isset($_POST['submit']) && isset($_POST['new'])) { //checking for anything will break the code
    $newpassword = filter_input(INPUT_POST, 'newpassword', FILTER_SANITIZE_STRING) ?? "";
    $newpasswordRE = filter_input(INPUT_POST, 'newpasswordRE', FILTER_SANITIZE_STRING) ?? "";

    if ($newpassword != $newpasswordRE) {
        echo "<h2>Passwords must match</h2>";
    }
    if ($newpassword == $newpasswordRE && isset($_POST['new'])) {
        $name = $_FILES['file']['name']; //file name
        $size = $_FILES['file']['size']; //file size
        $type = $_FILES['file']['type']; //file type
        $tmp_name = $_FILES['file']['tmp_name']; //temp location on server

        if ($newpassword != "") { // user checks for new picture and changes password
            if (checkType($name, $type) && checkSize($size, $max_size)) {
                if (isset($name)) {
                    save_file($tmp_name, $name, $location); //call my function
                }
            }
        }
        if ($newpassword == "") { // if user checks for new picture but not new password
            if (checkType($name, $type) && checkSize($size, $max_size)) {
                if (isset($name)) {
                    save_fileNO_PASSWORD($tmp_name, $name, $location); //call my function
                }
            }
        }
    }
}
if (isset($_POST['submit']) && !isset($_POST['new'])) { //checking for anything will break the code

    $db = dbconnect();
    $f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING) ?? "";
    $l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING) ?? "";
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
    $phone_num = filter_input(INPUT_POST, 'phone_num', FILTER_SANITIZE_STRING) ?? "";
    $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING) ?? "";
    $newpassword = filter_input(INPUT_POST, 'newpassword', FILTER_SANITIZE_STRING) ?? "";
    $newpasswordRE = filter_input(INPUT_POST, 'newpasswordRE', FILTER_SANITIZE_STRING) ?? "";
    $old_image = filter_input(INPUT_POST, 'old_image', FILTER_SANITIZE_STRING) ?? "";
    $employee_id = $_SESSION['employee_id'];

    if ($newpassword != $newpasswordRE) {
        echo "<h2>Passwords must match</h2>";
    }
    else {
        $password = password_hash($newpassword, PASSWORD_DEFAULT);

        $stmt = $db->prepare("UPDATE employees SET f_name = :f_name, l_name = :l_name, email = :email, phone_num = :phone_num, position = :position, password = :password WHERE employee_id = :employee_id");

        $binds = array(
            ":f_name" => $f_name,
            ":l_name" => $l_name,
            ":email" => $email,
            ":phone_num" => $phone_num,
            ":position" => $position,
            ":password" => $password,
            ":employee_id" => $employee_id
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            echo '<h2>Update Complete</h2>';
            echo Empform($f_name, $l_name, $email, $phone_num, $position, $old_image);
        }
    }
}
else {
    $results = getCredentials($db, $_SESSION['employee_id']);
    echo Empform($results['f_name'], $results['l_name'], $results['email'], $results['phone_num'], $results['position'], $results['photo']);
}
function checkType($name, $type){ // checks file type
    $extension = pathinfo($name, PATHINFO_EXTENSION); //better way to get extension
    if (!empty($name)) {
        if (($extension == 'jpg' || $extension == 'png') && ($type == 'image/jpeg' || $type == 'image/png')) {
            return true;
        } else{
            echo 'That is not a jpg or png';
            return false;
        }
    }
}
function checkSize($size, $max_size){ // checks file size to not take up too much space in images file
    if($size <= $max_size){
        return true;
    } else{
        echo 'File is too large. Max size in 2mb.';
        return false;
    }
}
function fileExists($name){ // if file already exists it will rename it so php doesn't get comfused
    $filename = rand(1000,9999).md5($name).rand(1000, 9999);
    echo $filename;
    return false;
}
function save_file($tmp_name, $name, $location) // saves file and uploads path to sql
{
    $og_name = $name;
    //so long as the name is in existance - loop to check new name after it is generated
    while (file_exists('../images/' . $name)) {
        echo 'File already exists. Generating name.<br/>';
        $rand = rand(10000, 99999);
        $name = $rand . '.' . pathinfo($name, PATHINFO_EXTENSION); //create new name
    }
    if (move_uploaded_file($tmp_name, $location . $name)) {
        $db = dbconnect();
        $f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING) ?? "";
        $l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING) ?? "";
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
        $phone_num = filter_input(INPUT_POST, 'phone_num', FILTER_SANITIZE_STRING) ?? "";
        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING) ?? "";
        $newpassword = filter_input(INPUT_POST, 'newpassword', FILTER_SANITIZE_STRING) ?? "";
        $employee_id = $_SESSION['employee_id'];
        $old_image = filter_input(INPUT_POST, 'old_image', FILTER_SANITIZE_STRING) ?? "";
        $password = password_hash($newpassword, PASSWORD_DEFAULT);

        $stmt = $db->prepare("UPDATE employees SET f_name = :f_name, l_name = :l_name, email = :email, phone_num = :phone_num, position = :position, password = :password, photo = :photo WHERE employee_id = :employee_id");
        // SQL STATMENT ^^
        $binds = array(
            ":f_name" => $f_name,
            ":l_name" => $l_name,
            ":email" => $email,
            ":phone_num" => $phone_num,
            ":position" => $position,
            ":password" => $password,
            ":photo" => $name,
            ":employee_id" => $employee_id
        );

        $message = 'Update failed';
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            unlink($old_image);
            $message = 'Update Complete';
            echo Empform($f_name, $l_name, $email, $phone_num, $position, $old_image);
        }
        if (!($og_name == $name)) { //if original name != name
            echo ' and renamed to ' . $name . '.<br/>';
        } else {
            echo '.';
        }
    } else {
        echo 'ERROR!';
    }
}
function save_fileNO_PASSWORD($tmp_name, $name, $location) // saves file and uploads path to sql
{
    $og_name = $name;
    //so long as the name is in existance - loop to check new name after it is generated
    while (file_exists('../images/' . $name)) {
        echo 'File already exists. Generating name.<br/>';
        $rand = rand(10000, 99999);
        $name = $rand . '.' . pathinfo($name, PATHINFO_EXTENSION); //create new name
    }
    if (move_uploaded_file($tmp_name, $location . $name)) {
        $db = dbconnect();
        $f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING) ?? "";
        $l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING) ?? "";
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
        $phone_num = filter_input(INPUT_POST, 'phone_num', FILTER_SANITIZE_STRING) ?? "";
        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING) ?? "";
        $old_image = filter_input(INPUT_POST, 'old_image', FILTER_SANITIZE_STRING) ?? "";
        $employee_id = $_SESSION['employee_id'];

        $stmt = $db->prepare("UPDATE employees SET f_name = :f_name, l_name = :l_name, email = :email, phone_num = :phone_num, position = :position photo = :photo WHERE employee_id = :employee_id");
        // SQL STATMENT ^^
        $binds = array(
            ":f_name" => $f_name,
            ":l_name" => $l_name,
            ":email" => $email,
            ":phone_num" => $phone_num,
            ":position" => $position,
            ":photo" => $name,
            ":employee_id" => $employee_id
        );

        $message = 'Update failed';
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            unlink($old_image);
            $message = 'Update Complete';
            echo Empform($f_name, $l_name, $email, $phone_num, $position, $old_image);
        }
        if (!($og_name == $name)) { //if original name != name
            echo ' and renamed to ' . $name . '.<br/>';
        } else {
            echo '.';
        }
    } else {
        echo 'ERROR!';
    }
}
function Empform($f_name, $l_name, $email, $phone_num, $position, $photo)
{
    $form = "<div class='container'>
        <div class='row'>
        <div class='col-lg-4'>
        
        <section>
        <form method='post' action='' enctype='multipart/form-data'>
        
        <div class='form-group'>
        <label for='f_name'>First Name: </label>
        <input type='text' class='form-control' name='f_name' id = 'f_name' value='$f_name'/>
        
        <label for='l_name'>Last Name: </label>
        <input type='text' class='form-control' name='l_name' id = 'l_name' value='$l_name'/>
        
        <label for='email'>Email: </label>
        <input type='email' class='form-control' name='email' id = 'email' value='$email'/>

        <label for='phone_num'>Phone Number: </label>
        <input type='text' class='form-control' name='phone_num' id = 'phone_num' value='$phone_num'/>
        
        <label for='position'>Position: </label>
        <input type='text' class='form-control' name='position' id = 'position' value='$position'/>

        <label for='newpassword'>Change Password: </label>
        <input type='password' class='form-control' name='newpassword' id = 'newpassword' value=''/>
        
        <label for='newpasswordRE'>Re enter Password: </label><br>
        <input type='password' class='form-control' name='newpasswordRE' id = 'newpasswordRE' value=''/>
        
        </div>
        </form>
        </section>
        </div>
        <div class='col-lg-4'></div>
        <div class='col-lg-4'></div>
        </div>";
    $form .= "New Image?: <input type='checkbox' name='new' value='new'>Yes<br>";
    $form .= "New Image: <input type='file' name='file'/>
    <br>Old image:<br>";
    $form .= "<img src='../images/" . $photo . "'  width='200' height='200'/>
    <br />
    <br />
    <input type='hidden' name='old_image' value = '../images/" . $photo . "'/>
        
        <input type='submit' class='btn btn-primary' name='submit' value='submit' />
    </form></section></div>";
    return $form;
}