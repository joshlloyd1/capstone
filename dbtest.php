<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>project test</title>
</head>
<body>
Hey guys
<?php
include_once ("assets/dbconnect.php");
include_once("testfunction.php");

$db = dbconnect();
echo func($db);

?>
</body>
</html>