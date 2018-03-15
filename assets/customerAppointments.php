<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 2/14/2018
 * Time: 8:24 AM
 */
include_once ('customerHeader.php');
include_once ('functions.php');
include_once ('dbconnect.php');
$db = dbconnect();

$employees = getEmployeeNames($db);

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jQuery UI Datepicker - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        </script>
    </head>
    <body>
    <h1>Schedule An Appointment</h1>
    <form method='post' action='' enctype='multipart/form-data'>
        <p>Who would you like to meet with?<br></p>
        <select name='employee_id' id='employee_id' class="custom-select">
            <option value="NO">Please select an employee:</option>
        <?php foreach($employees as $employee) {
          echo "<option value=" . $employee['employee_id'] . ">" . $employee['f_name'] . " " . $employee['l_name'] . " - " . $employee['position'] . "</option>";
        }
        ?>
        </select>
        <div class="row">
            <div class="col-lg-4"> <p>Date: <br><input type="text" class="form-control" name="datepicker" id="datepicker"></p></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row">
            <div class="col-lg-4"><p>Time: <br><input type="time" name="time" value="time" id="time"</p> <br><br></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row">
            <div class="col-lg-4"> <input type="submit" class="btn btn-primary" value="submit" name="submit"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>



    </form>
    </body>
    </html>

<?php
if (isset($_POST['submit'])) {
$employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_SANITIZE_STRING) ?? "";
$date = filter_input(INPUT_POST, 'datepicker', FILTER_SANITIZE_STRING) ?? "";
$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING) ?? "";
$customer = $_SESSION['username'];

    if($date < date("m/d/YYYY")) {
        echo "<p><font color='red'>Date needs to be a future date!</font></p>";
    }
    else if($employee_id  == "NO") {
        echo "<p><font color='red'>Please select an employee to work with!</font></p>";
    }
    else {
        $appointment = date('Y-m-d H:i:s', strtotime("$date $time"));


        echo scheduleApp($db, $employee_id, $customer, $appointment);
    }
}
?> <div class="container">
    <h2>My Scheduled Appointments</h2>
<?php echo customerApp($db, $_SESSION['username']);  ?>
</div><?php
include_once ('footer.html');
