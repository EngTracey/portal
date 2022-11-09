<?php
include_once ("dbcon.php");

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Forgot Password Request</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/iriy-admin.min.css">
        <link rel="stylesheet" href="demo/css/demo.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->       
</head>
<body class="body-sign-in">
<div class="container">
<div class="panel panel-default form-container">
<div class="panel-body">
  
      <header class="wrapper text-center"> <strong>Enter Registered Username and E-Mail To Reset The Password</strong> </header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
        <div class="list-group">
          <div class="list-group-item">
		     <input type="text" placeholder="Registered Username" class="form-control" name="username" required>
			  </div>
			 <div class="list-group-item">
            <input type="email" placeholder="Registered E-Mail" class="form-control" name="femail" required>
          </div>
          
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
        <div class="text-center m-t m-b"><small style="color:red;">Got The Password?</small></div>
        <a href="index.php" class="btn btn-lg btn-default btn-block">Sign In Now</a>
        
      </form>
  </div>
  <?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['femail']) && isset($_POST['username']))
{

$email=mysqli_real_escape_string($conn,$_POST['femail']);
$username=mysqli_real_escape_string($conn,$_POST['username']);
$status=1;
if($status==1){

$status = "OK";
$msg="";
//checking constraints
if ( strlen($email) < 1 ){
$msg=$msg."Please Enter Your Email Id.<BR>";
$status= "NOTOK";}
if ( strlen($username) < 6 ){
$msg=$msg."Please Enter a valid username.<BR>";
$status= "NOTOK";}

$result = mysqli_query($conn,"SELECT count(*) FROM  employees where email = '$email'");
$row = mysqli_fetch_row($result);
$numrow = $row[0];

if(($numrow) == 0) {
$msg=$msg."Email address not found. Please contact your administrator.<BR>";
$status= "NOTOK";}

$results = mysqli_query($conn,"SELECT count(*) FROM  employees where username = '$username'");
$rows = mysqli_fetch_row($results);
$numrows = $rows[0];

if(($numrows) == 0) {
$msg=$msg."Username not found. Please contact your administrator.<BR>";
$status= "NOTOK";}

$epwd = mysqli_query($conn,"SELECT count(*) FROM  employees where username = '$username' and email = '$email'");
$rowss = mysqli_fetch_row($epwd);
$numrowss = $rowss[0];

if(($numrowss) == 0) {
$msg=$msg."Username and Email should belong to one user. Please contact your administrator.<BR>";
$status= "NOTOK";}

$wlink="votingsystem.co.zw"; //assigning website address
}

$newpassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*') , 0 , 14 );

if ( strlen($newpassword) < 8 ){
$msg=$msg."Password Can not generated, system error. Try again.<BR>";
$status= "NOTOK";}


if($status=="OK")
{


$re = mysqli_query($conn,"update employees set password = '$newpassword' where email = '$email' and username = '$username' ");
if($re)
{

$to=$email;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
$subject="Password Request";
$message="Hello $username, This is your new password : <b> $newpassword </b><br/><br/>";
mail($to,$subject,$message,$headers);

echo "<div class='alert alert-danger'>Your password has been sent to your registered mail id. Please check your junk or spam folder if you do not find in your inbox. </div>";
}
else
{
 echo "<div class='alert alert-danger'>We have found some technical glitch and unable to process your request. Please Ask Admin or try again later.</div>";
}
//updating status if validation passes

}
else{
echo "<div class='alert alert-danger'>$msg</div>"; //priting error if found in validation


}
}
?>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
  <div class="panel-body text-center">
         
              <div class="margin-bottom">
                    <a class="" href="javascript:;">Developed by Tracey Ndoro 2019</a>
                </div>
            </div>
  </div>
</footer>
</div>
</div>
</div>
</body>
</html>