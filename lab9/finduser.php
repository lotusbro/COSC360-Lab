<html>
<?php
$username= $_POST['username'];
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
    $sql= "SELECT * FROM users WHERE username= '".$username."' ;";
    $result= mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($result);
   
    if($username==$row['username'])
    { ?>
        <body>
        <fieldset>
        <table>
        <thead>
        <th> User: <?php echo $username; ?> </th>
    </thead>
        <tbody>
        <tr> <td>First Name: <?php echo $row['firstName']; ?>  </td> </tr>
        <tr> <td> Last Name: <?php echo $row['lastName']; ?> </td> </tr>
        <tr> <td> Email: <?php echo $row['email']; ?>  </td> </tr>
        </tbody>
        </table>
        </fieldset>
    </body>
   <?php } 
   else
   {
    echo "Does not exist"; 
   }
}
mysqli_close($conn);
?>
</html>
