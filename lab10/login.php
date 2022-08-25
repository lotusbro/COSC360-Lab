<html>
<?php
session_start();
if(!(isset($_SESSION['username'])))
{ ?>
<body>
<form method="post" action="processlogin.php" id="mainForm" >
  Username:<br>
  <input type="text" name="username" id="username" class="required">
  <br>
  Password:<br>
  <input type="password" name="password" id="password" class="required">
  <br>
  <br><br>
  <input type="submit" value="Login">
</form>
</body>
<?php } 
else
{
    header("location: http://localhost/lab10/home.php");
    exit();
}

?>