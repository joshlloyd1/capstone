<?php
session_start();

unset($_SESSION['lsc']);

echo "<script>window.location='SavedCars.php'</script>";

