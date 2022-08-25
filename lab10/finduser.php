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
    $userID= $row['userID'];
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
        <tr> <td> userID: <?php echo $row['userID']; ?>  </td> </tr>
        </tbody>
        </table>
        </fieldset>
    </body>
   <?php 
   $sql2 = "SELECT contentType, image FROM userImages where userID=?";
   
   // build the prepared statement SELECTing on the userID for the user
   $stmt = mysqli_stmt_init($conn); 
   //init prepared statement object
   mysqli_stmt_prepare($stmt, $sql2); 
   // bind the query to the statement
   mysqli_stmt_bind_param($stmt, "i", $userID);
   // bind in the variable data (ie userID)
   $result = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
   // Run the query. run spot run! 
   mysqli_stmt_bind_result($stmt, $type, $image); //bind in results
    // Binds the columns in the resultset to variables
   mysqli_stmt_fetch($stmt);
   // Fetches the blob and places it in the variable $image for use as well 
   // as the image type (which is stored in $type) 
   mysqli_stmt_close($stmt);
   // release the statement
   echo '<img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';
} 
   else
   {
    echo "Does not exist"; 
   }
}
mysqli_close($conn);
?>
</html>
