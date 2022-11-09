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
				$s_id = $adminsession_id;
				$employee=mysqli_query($conn, "SELECT * FROM admin WHERE username = '$s_id'")or die(mysqli_error($conn));
									while($e_row=mysqli_fetch_array($employee)){
									$id=$e_row['employee_id']; 
									$first_name=$e_row['first_name']; 
									$surname=$e_row['surname']; 
									$dob=$e_row['dob']; 
									$gender=$e_row['gender'];
									$phone=$e_row['phone'];
									$email=$e_row['email'];	
									$branch=$e_row['branch'];
									$description=$e_row['description'];									
									}
									?>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Employee ID  <span class="asterisk">*</span></label>

                            <div class="col-sm-8">
                                <input readonly class="form-control" name="employee_id" value="<?php echo $id;?>" required>

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
                                <label class="control-label col-sm-4">Branch <span class="asterisk">*</span></label>

                                <div class="col-sm-8">
                                    <select class="form-control form-chosen" name="branch" data-placeholder="Choose a Branch..." required>
                                        <option value="<?php echo $branch;?>" ><?php echo $branch;?> </option>
                                        <option value="Harare">Harare</option>
                                        <option value="Mutare">Mutare</option>
                                        <option value="Chirundu">Chirundu</option>
                                        <option value="Bulawayo">Bulawayo</option>
                                        <option value="Mutoko">Mutoko</option>
                                        <option value="Chinhoyi">Chinhoyi</option>
                                        <option value="Kariba">Kariba</option>
                                        <option value="Beitbridge">Beitbridge</option>
                                        <option value="Chiredzi">Chiredzi</option>
                                    
                                    </select>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="control-label col-sm-4">Brief/Short Description About You<span class="asterisk">*</span></label>
<div class="col-sm-8"><address><textarea rows="16" cols="80" class="form-control" type="text" name="description"   required>
<?php echo $description;?>
                            </textarea></address>
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
	
	$employee_id=$_POST['employee_id'];
	$first_name=$_POST['first_name'];
	$surname=$_POST['surname'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$branch=$_POST['branch'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$description=trim($_POST['description']);
	mysqli_query($conn, "UPDATE employees SET first_name ='$first_name', surname ='$surname', dob ='$dob', gender ='$gender', branch ='$branch', phone ='$phone', email ='$email', description ='$description' where employee_id='$employee_id'")or die(mysqli_error()); ?>
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
