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
    <h2>My Profile</h2>
</div>
	
<div class="container-fluid-md">
    <div class="row">
        <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
            <form class="form-horizontal" novalidate method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"></h4>
                    </div>
					<?php 
				$s_id = $session_id;
				$employee=mysqli_query($conn, "SELECT * FROM students WHERE student_id = '$s_id'")or die(mysqli_error($conn));
									while($e_row=mysqli_fetch_array($employee)){
									$id=$e_row['student_id']; 
									$first_name=$e_row['name']; 
									$surname=$e_row['surname']; 
									$dob=$e_row['dob']; 
									$gender=$e_row['gender'];
									$phone=$e_row['phone'];
									$email=$e_row['email'];									
									$level=$e_row['level_id'];									
									}
									?>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Student ID  <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input readonly class="form-control" name="student_id" value="<?php echo $id;?>" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">First Name <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input class="form-control" name="first_name" type="text" value="<?php echo $first_name;?>" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-sm-4">Surname <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="surname" value="<?php echo $surname;?>" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-sm-4">DOB <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input class="form-control" type="date" name="dob" value="<?php echo $dob;?>"  required>

                            </div>
                        </div>
						<div class="form-group">
                                <label class="control-label col-sm-4">Gender <span class="asterisk">*</span></label>

                                <div class="col-sm-8">
                                    <select class="form-control form-chosen" name="gender" data-placeholder="Your Gender..." required>
                                        <option value="<?php echo $gender;?>" ><?php echo $gender;?> </option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    
                                    </select>
                                </div>
                            </div>
						  <div class="form-group">
                            <label class="control-label col-sm-4">Phone Number <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="phone" value="<?php echo $phone;?>"  required>

                            </div>
                        </div>
						  <div class="form-group">
                            <label class="control-label col-sm-4">Email <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input class="form-control" type="email" name="email" value="<?php echo $email;?>"  required>

                            </div>
                        </div>
                        
						 <div class="form-group">
                                <label class="control-label col-sm-4">Level <span class="asterisk">*</span></label>

                                <div class="col-sm-8">
                                    
                                      	<select name="level" class="form-control">
										<?php
										$query2=mysqli_query($conn, "select * from level where level_id = '$level' ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$level_name = $rows2['level_name']; 
										?>
										<option class="form-control"  value="<?= $level_name; ?>"><?= $level_name; ?></option>
						<?php
				$query2=mysqli_query($conn, "select * from level ")or die(mysqli_error($conn));
				
								while($rows2=mysqli_fetch_array($query2)){
									$temp = $rows2['level_name']; ?>

		
		<option class="form-control"  value="<?= $rows2['level_id']; ?>"><?= $rows2['level_name']; ?></option>
								<?php } }?>						
			</select>
                                
                                </div>
                            </div>
							
						
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" name="edit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
	
	<?php
	if (isset($_POST['edit'])){
	
	$student_id=$_POST['student_id'];
	$first_name=$_POST['first_name'];
	$surname=$_POST['surname'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	mysqli_query($conn, "UPDATE students SET name ='$first_name', surname ='$surname', dob ='$dob', gender ='$gender', phone ='$phone', email ='$email' where student_id='$student_id'")or die(mysqli_error()); ?>
	<script>
	alert('Successfully updated');
	window.location="profile.php";
	</script>
	<?php
	}
	?>
            </div>
        </div>
       
    </body>
</html>
