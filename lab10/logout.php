<?php
if(!isset($_SESSION['username']))
{
    header("location: http://localhost/lab10/login.php");
}
session_start();
session_unset();
session_destroy();
header("location: http://localhost/lab10/home.php");



?>