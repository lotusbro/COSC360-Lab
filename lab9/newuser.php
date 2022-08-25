<?php
$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$username= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
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
    $sql= "SELECT username FROM users;";
    $result= mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($result);
    if($row['username']==$username || $row['email']==$email)
    {
        echo "User already exists with this name/email" ."<br>";
        echo '<a href="http://localhost/lab9/lab9-1.html"> Return to user entry </a> ';
    }
    else
    {
        echo "An account for the user",$username,"has been created";
        $hashpass= md5($password);
        $sql2= "INSERT INTO users VALUES( '".$username."','".$firstname."','".$lastname."','".$email."','".$hashpass."')";
        mysqli_query($conn,$sql2);
    }
}
mysqli_close($conn);
?>
