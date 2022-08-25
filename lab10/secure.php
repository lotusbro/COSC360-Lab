<?php
session_start();
if(isset($_SESSION['username']))
{
 echo "<input type= 'text'> <br>";  
 echo '<a href="http://localhost/lab10/logout.php"> Logout </a> '; 
}
else
{
  echo "content is only available to users";
  echo '<a href="http://localhost/lab10/login.php"> Login </a> '; 
}

?>