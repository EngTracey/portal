 <?php
include('session.php'); 
 include 'template-parts/header.php' ;
 include 'template-parts/nav.php' ?>
        <div class="page-wrapper">          
 <?php include 'template-parts/sidebar.php' ?>
 
            <div class="page-content">
                <div class="page-subheading page-subheading-md">
</div>
<div class="page-heading page-heading-md">
    
</div>
	<?php 
				$s_id = $session_id;
				$client=mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$s_id'")or die(mysqli_error());
									while($row=mysqli_fetch_array($client)){
									$id=$row['teacher_id']; 
									$pwd=$row['password']; 								
									}
									?>
									<?php
	if (isset($_POST['edit'])){
	$emid=$_POST['teacher_id'];
	$newpwd=$_POST['newpwd'];
	$password=$_POST['password'];
	$oldpassword=$_POST['oldpassword'];
	$oldpassword2=$_POST['oldpassword2'];
	
	
//validation starts
	if ( $oldpassword <> $oldpassword2 ){
		echo "  <div class='alert alert-danger'>Old Password Did Not Match.</div>";
	}
	elseif ( $newpwd <> $password ){
		echo " <div class='alert alert-danger'>Both New Passwords Are Not Matching.</div>";
	}
	elseif
		( strlen($password) < 8 ) {
	echo " <div class='alert alert-danger'>Password Must Be At Least 8 Characters Length.</div>";
		}
		elseif
		( strlen($newpwd) < 8 ){
	echo " <div class='alert alert-danger'>Password Must Be At Least 8 Characters Length.</div>";
		}
	else	
	{
	mysqli_query($conn, "UPDATE teacher SET password ='$newpwd' where teacher_id='$emid'")or die(mysqli_error($conn)); ?>
	<script>
	alert('Password Successfully updated, Login again');
	window.location="logout.php";
	</script>
	<?php
	}
	}
	
	?>
<div class="container-fluid-md">
    <div class="row">
        <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
            <form class="form-horizontal" novalidate method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Change Password</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Teacher ID  <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input readonly class="form-control" name="employee_id" id="employee_id" value="<?php echo $id;?>" required>

                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-4">Old Password <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input  class="form-control"  type="hidden" name="oldpassword" type="password" value="<?php echo $pwd;?>" required>
                                <input  class="form-control" name="oldpassword2" type="password"  required>
                            </div>
                        </div>
                        
						 <div class="form-group">
                            <label class="control-label col-sm-4">New Password <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input class="form-control" type="password" name="newpwd"  required>

                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-sm-4">Confirm Password <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input  class="form-control" name="password" type="password"  required>
                            </div>
                        </div>
                       
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" name="edit" id="edit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
	  </div>
        </div>
       
    </body>
</html>
