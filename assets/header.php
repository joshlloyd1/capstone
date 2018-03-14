<?php
/**
 * Created by PhpStorm.
 * User: 005505537
 * Date: 2/22/2018
 * Time: 10:37 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="/htdocs/capstone/css/style.css" rel="stylesheet">

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <title>Used Cars of New England Tech</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/htdocs/capstone/index.php">Used Cars of New England Tech</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/htdocs/capstone/assets/inventory.php">Inventory</a></li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/htdocs/capstone/assets/aboutUs.php">About Us</a></li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/htdocs/capstone/assets/savedCars.php">Saved Cars</a>
            </li>
        </ul>
        <form method="post" class="form-inline my-2 my-lg-0" action="/htdocs/capstone/assets/LogIn.php">
            <input class="form-control mr-sm-2" type="text" name = 'username' id='username' placeholder="Username">
            <input class="form-control mr-sm-2" type="password" name = 'password' id='password' placeholder="Password">
            <input type='hidden' name="action" value="submit" />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In</button>
        </form>
    </div>
</nav>
<section>
    <div class="container-fluid body-content">