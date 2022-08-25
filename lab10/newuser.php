<?php
$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$username= $_POST['username'];
$email= $_POST['email'];
$username= $_POST['username'];
$pass= $_POST['password'];
$host = "localhost";
$database = "test";
$user = "root";
//$password = "";
$conn= mysqli_connect($host,$user,"",$database);
if(mysqli_connect_errno())
{
    die(mysqli_connect_error());
}
else
{
    //$file= $_FILES['userImage'];
    $fileExt= explode('.',$_FILES['userImage']['name']);
    $filetrim= strtolower(end($fileExt));
    $imageFileType= array('jpg','png','gif');
    $filesize= $_FILES["userImage"]["size"];
     if($filesize<100000)  
     {
      if(in_array($filetrim,$imageFileType))
      {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["userImage"]["name"]);
        $imagedata = file_get_contents($_FILES["userImage"]["tmp_name"]);
        move_uploaded_file($_FILES['userImage']['tmp_name'], $target_file);
        $sql= "ALTER TABLE `users` ADD `userID` INT NOT NULL AUTO_INCREMENT , ADD UNIQUE (`userID`)";
        //$result= mysqli_query($conn,$sql);
        
         $hashpass= md5($pass);
         $sql3= "INSERT INTO users(username,firstName,lastName,email,password) VALUES( '".$username."','".$firstname."','".$lastname."','".$email."','".$hashpass."')";
         mysqli_query($conn,$sql3);
         echo "An account for the user",$username,"has been created";
         $sql2="SELECT * from users where username= '".$username."'  ";
         $result2= mysqli_query($conn,$sql2);
         $row2= mysqli_fetch_assoc($result2);
         $userID= $row2['userID'];
         //$imagedata = file_get_contents($_FILES["userImage"]["tmp_name"]);
         //store the contents of the files in memory in preparation for upload
         $sql4 = "INSERT INTO userImages (userID, contentType, image) VALUES(?,?,?)";
          // create a new statement to insert the image into the table. Recall
         // that the ? is a placeholder to variable data.
         $stmt = mysqli_stmt_init($conn); //init prepared statement object
          
         mysqli_stmt_prepare($stmt, $sql4); // register the query 
          
         $null = NULL;
         // isb= i=integer, s=string, b=blob (d=double)
         mysqli_stmt_bind_param($stmt, "isb", $userID, $filetrim, $null); 
         // bind the variable data into the prepared statement. You could replace
         // $null with $data here and it also works. You can review the details 
         // of this function on php.net. The second argument defines the type of 
         // data being bound followed by the variable list. In the case of the 
         // blob, you cannot bind it directly so NULL is used as a placeholder. 
         // Notice that the parametner $imageFileType (which you created previously) 
         // is also stored in the table. This is important as the file type is
         // needed when the file is retrieved from the database. 
          
         mysqli_stmt_send_long_data($stmt, 2, $imagedata); 
         // This sends the binary data to the third variable location in the 
         // prepared statement (starting from 0).
         $result = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
         // run the statement 
          
         mysqli_stmt_close($stmt); // and dispose of the statement. 
         
        echo"Sucess";
      }  
      else{
        echo "Incorrect file type";
      }
       
    }
     else
     {
         echo "File too big";
     }
}
mysqli_close($conn);
?>
