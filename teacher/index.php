<?php
//error_reporting(E_ERROR | E_PARSE);
session_start(); 
 include 'dbcon.php' ?>
 <!doctype html>
<html class="no-js">
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
                <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Teacher Sign In </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!--<link rel="shortcut icon" href="/favicon.ico">-->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/iriy-admin.min.css">
        <link rel="stylesheet" href="demo/css/demo.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">

        <!--[if lt IE 9]>
        <script src="assets/libs/html5shiv/html5shiv.min.js"></script>
        <script src="assets/libs/respond/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="body-sign-in">						
    <div class="container">
        <div class="panel panel-default form-container">
            <div class="panel-body">
                <form  method="POST">
				  <h4 class="text-left "><img class="" src="logo2.png"></h4>
                    <h3 class="text-center margin-xl-bottom">Teacher's Login!</h3>
						
                    <div class="form-group text-center">
                        <label class="sr-only" for="account">Email</label>
                        <input name="username" type="email" class="form-control " id="username" placeholder="Email">
                    </div>
                    <div class="form-group text-center">
                        <label class="sr-only" for="password">Password</label>
                        <input name="password" type="password" class="form-control " id="password" placeholder="Password">
                    </div>
					
				<button id="signin" name="submit" type="submit" class="btn btn-primary btn-block btn-lg">
				<i class="icon-signin icon-large"></i>&nbsp;LOGIN</button>
				<i><a href="forgotpassword.php"><h5 class="text-center margin-xl-bottom">Forgot password!</h5></a></i>
					<?php
if (isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM teacher WHERE email='$username' AND password='$password'";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if( $num_row > 0 ) { 
          $_SESSION['teacherid']=$row['teacher_id'];
		header('location: dashboard.php');
		}
		else{ ?>
		<br>
		<br>
	<div class="alert alert-danger">Incorrect Account Number and/or Password. !Access Denied</div>	
<?php		}
		
		}
?>
                </form>
            </div>
            <div class="panel-body text-center">
         
              <div class="margin-bottom">
                    <a class="" href="javascript:;">Developed by Tracey Ndoro 2019</a>
                </div>
            </div>
        </div>
    </div>
		
</body>

</html>
