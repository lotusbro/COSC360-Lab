<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lab 6</title>

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/lab7.css" rel="stylesheet">

</head>

<body>
<?php
include('lab7-data.php');
$emailerror='';
$passworderror='';
if(empty($_POST['email']))
{
    $emailerror='has error in email';
}
else
{
    $email=$_POST['email'];
}
if(empty($_POST['password']))
{
    $passworderror='has error in password';
}
else
{
    $password=$_POST['password'];
}
include('lab7-data.php');
?>
<div class="container">
   <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
         <div id="login">
            <div class="page-header">
               <h2>Login</h2>
            </div>
            <form role="form" action="lab7.php" method="POST">
              <div class="form-group has-error">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="">
                <p class="help-block"><?php echo $emailerror ?></p>
              </div>
              <div class="form-group has-error">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" >
                <p class="help-block"><?php echo $passworderror ?></p>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Server</label>
                <select name="server" class="form-control">
                  <!--Replace the following elements with PHP-->
                  <?php 
                  $server= array('Server 1','Server 2','Server 3','Server 4','Server 5');
                  foreach($server as $value) 
                  { ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php
                  } ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
      <div class="col-md-3">
      </div>
   </div>
</div>  <!-- end container -->

 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>
</body>
</html>
