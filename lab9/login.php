<?php
$username= $_POST['username'];
$password= $_POST['password'];
$host = "localhost";
$database = "test";
$user = "root";
$pass = "";
$conn= mysqli_connect($host,$user,$pass,$database);
if(mysqli_connect_errno())
{
    die(mysqli_connect_error());
}
else
{
    $hashpass= md5($password);
    $sql= "SELECT * FROM users WHERE username= '".$username."';";
    $result= mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($result);
    $databasepassword= $row['password'];
    //mysqli_num_rows($result)==1
    //$row['username']==$username &&  $row['password']==$hashpass
    if($row['username']==$username && password_verify($password,$databasepassword) === true)
    {   
        echo "user has valid account";
    }
    else
    {
        echo "username and/or password are invalid";
    }
}
mysqli_close($conn);

?>