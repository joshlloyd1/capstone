<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="/htdocs/capstone/css/style.css" rel="stylesheet">
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
                    <a class="nav-link" href="/htdocs/capstone/assets/adminViewInventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/htdocs/capstone/assets/adminAppointments.php">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/htdocs/capstone/assets/adminVendors.php">Vendors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/htdocs/capstone/assets/adminMyAccount.php">My Account</a>
                </li>
            </ul>
            <div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/htdocs/capstone/index.php">Log Out</a> <!--- LOG OUT JUST RETURNING TO INDEX ATM !-->
                    </li>
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <section>
        <div class="container body-content" style="margin-top:90px">