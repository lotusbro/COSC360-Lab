<?php
session_start();

if(isset($_SESSION['username']))
{
echo "Welcome to the test site! <br>";
echo '<a href="http://localhost/lab10/secure.php"> Secure Data Page </a> <br>';
echo '<a href="http://localhost/lab10/logout.php"> Logout </a> <br>';  
}
else
{
header("location: http://localhost/lab10/login.php");
exit(); 
}





?>