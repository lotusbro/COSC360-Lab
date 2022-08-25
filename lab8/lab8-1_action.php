
<?php 
$key;
$firstname;
$caption;
$image_path;
$file= file("data.txt");
//echo file_get_contents("data.txt");
$delimeter= ",";
foreach($file as $value)
{
    $line= explode($delimeter,$value);
    $key=$line[0];
    $firstname=$line[1];
    $caption=$line[2];
    $image_path=$line[3];
    if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if( !(empty($_POST['Firstname'])) && !(empty($_POST['Key'])) )
    {
        if( strcasecmp($firstname,$_POST['Firstname'])==0 && $_POST['Key']==$key )
        {
          //echo $_POST['Firstname'],"<br>",$_POST['Key'];   
          echo "<h1> $firstname </h1>";
          echo "<img src=$image_path >";
          echo "<figcaption>$caption </figcaption>";
        }
        
    }
}

if($_SERVER["REQUEST_METHOD"]=="GET")
{
    if( !(empty($_GET['Firstname'])) && !(empty($_GET['Key'])) )
    {
        //echo $_GET['Firstname'],"<br>",$_GET['Key'];
        if( strcasecmp($firstname,$_POST['Firstname'])==0 && $_POST['Key']==$key )
        {
          //echo $_POST['Firstname'],"<br>",$_POST['Key'];   
          echo "<h1> $firstname </h1>";
          echo "<img src=$image_path >";
          echo "<figcaption>$caption </figcaption>";
        } 
    }
}
}

?>



