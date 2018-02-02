<head>
    <link rel="stylesheet" href="style/style.css">
</head>
<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 1/31/2018
 * Time: 9:47 AM
 */
function specialBlock($db) {
    $block = "<div class=firstBlock><h2>Specials:</h2>";
    $slide = 1;
    if($slide == 1)
    $block .= "</div>";
    return $block;
}

function aboutusBlock() {
    $block = "<div class=secondBlock><h2>About Us:</h2>";
    $block .= "</div>";
    return $block;
}
function LoginForm($username = "", $password = "") { // displays the login form
    $form = "<div style='position:relative; margin:auto; text-align:center; border:1px solid black; width:400px; margin-top: 65px;'><section>
    <form method='post' action='index.php'>
        <h1>Log In</h1>
        <label for='email'>Username: </label><br>
                <input type='text' name='email' id = 'email' style='text-align:center;' value='$username'/><br>
        <label for='password'>Password: </label><br>
        <input type='password' name='password' id = 'password' style='text-align:center;' value='$password'/><br>

        <input type='hidden' name='action' value='submit' />
        <input type='submit' />
    </form></section></div>";
    return $form;

}
