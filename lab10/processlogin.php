<?php
$username= $_POST['username'];
$password= $_POST['password'];
$host = "localhost";
$database = "test";
$user = "root";
$pass = "";
$conn= mysqli_connect($host,$user,$pass,$database);
if(isset($_SESSION['username']))
{
    //echo("IM here");
    header("localhost/lab10/home.php");
    exit(); 
}
else{
    if(mysqli_connect_errno())
    {
        die(mysqli_connect_error());
    }
    else
    {
        //echo "HI";
        $hashpass= md5($password);
        $sql= "SELECT * FROM users WHERE username= '".$username."' and password= '".$hashpass."';";
        $result= mysqli_query($conn,$sql);
        $row= mysqli_fetch_assoc($result);
        
        echo "HI";
        if($row['username']==$username)
        {
          //echo("HOI!");
          session_start(); 
          $_SESSION["username"]= $row["username"];
          header("location: http://localhost/lab10/home.php");
          //exit(); 
        }
        else if($row['username']!=$username)
        {
            //echo("HELLO");
            header("location: http://localhost/lab10/login.php");
            //exit(); 
        }
        else
        {
            //echo("ITS ME");
            header(" location: http://localhost/lab10/login.php");
            //exit(); 
        }
        
    }
}



?>