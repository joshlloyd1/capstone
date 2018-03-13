<?php
include_once ("assets/header.php");
include_once("assets/functions.php");
include_once("assets/dbconnect.php");
?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active" style="background-color:#0f0f0f; color:#f7f7f7; text-align:right;">
                <div style="display:block; margin:0 auto;">
                    <div style="position: absolute; margin-left:750px;">
                        <h1 class="display-2">Mazda 3</h1>
                        <p class="lead">4-Door Grand Touring Auto, Sedan. 36 mpg.</p>
                        <br>
                        <h1 class="display-4">$24,999</h1>
                    </div>
                    <img class="d-block img-fluid" src="images/mazda3Hero.png" alt="Mazda 3 slide">
                </div>

            </div>

            <div class="carousel-item" style="background-color:#0f0f0f; color:#f7f7f7; text-align:right;">
                <div>
                    <img class="d-block img-fluid" src="images/18_WRX_photos_ext_19.png" alt="Subaru Wrx slide" style="margin-left: 200px">
                </div>
                <div style="position:absolute; margin:10px 0 0 860px">
                    <h1 class="display-2">Subaru WRX STI</h1>
                    <p class="lead">4-door, all-wheel-drive, Sedan 27 mpg.</p>
                    <br>
                    <h1 class="display-4">$27,855</h1>
                </div>
            </div>

            <div class="carousel-item" style="background-color:#0f0f0f; color:#f7f7f7">
                <div>
                    <img class="d-block img-fluid" src="images/ford1.jpeg" alt="Ford Mustang slide" style="margin-left: 200px">
                </div>
                <div style="position:absolute; margin:10px 0 0 860px">
                    <h1 class="display-2">Ford Mustang</h1>
                    <p class="lead">2 doors, rear-wheel drive, 28 mpg, 6-speed manual transmission.</p>
                    <br>
                    <h1 class="display-4">$33,000</h1>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php
include_once ("assets/newUser.php");
include_once ("assets/footer.html");
?>