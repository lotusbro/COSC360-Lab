<?php
$username    =$_POST['username'];
$oldpassword =$_POST['oldpassword'];
$newpassword =$_POST['newpassword'];
$host = "localhost";
$database = "test";
$user = "root";
$password = "";
$conn= mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die(mysqli_connect_error());
}
else
{
    $sql= "SELECT * FROM users WHERE username = '".$username."' ;";
    $result= mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($result);
    $hasholdpass= md5($oldpassword);
    if($row['username']==$username && $row['password']==$hasholdpass)
    {
        $sql2= "UPDATE users SET password= '".$newpassword."' WHERE username= '".$username."' ";
        mysqli_query($conn,$sql2);
    }
}
mysqli_close($conn);
?>