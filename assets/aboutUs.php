<?php
include_once ("header.html");
include_once("functions.php");
include_once("dbconnect.php");
$db = dbconnect();
?>
    <br>
    <h1>About Us</h1>
<p>Used cars of New England Tech is a great website for users to view cars they may want to buy from New England Tech. Cars we have span from</b>
    your run of the mill old Volvo wagons and all the way to the highest of sport proformance to Porsches to Mclarens. We here pride ourselved</b>
    to offer all customers the best in car buying and will guarentee your staisfaction! We offer competative pricing with all our cars and we, the team</b>
    at UCNEIT will offer you the BEST in car buying!</p>
</p>
    <img src="../images/capture.png" alt="map" height="500" style="display: inline">
    <p>our location</p>
<h1>Meet our team!</h1>
<?php
echo getTheTeam($db);
include_once ("footer.html");