 <?php
include 'session.php'; 
 include 'template-parts/header.php' ;
 include 'template-parts/nav.php' ?>
        <div class="page-wrapper">
            
 <?php include 'template-parts/sidebar.php' ?>
            <div class="page-content">
                <div class="page-subheading page-subheading-md">
    
</div>
<div class="page-heading page-heading-md">
    <h2>Edit teacher</h2>
</div>
<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"></h4>

            <div class="panel-options">
               
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
<?php
				$posted= $_GET['id'];
				$client=mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$posted'")or die(mysqli_error($conn));
									while($s_row=mysqli_fetch_array($client)){						
							$student_id =$s_row['teacher_id'];
							$name =$s_row['name'];
							$surname =$s_row['surname'];
							$email=$s_row['email'];
						
						
									} 
					
									?> 
<?php									
if (isset($_POST['edit'])){
	
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$email=$_POST['email'];
	
//validation starts
	if (empty($_POST["name"])) {
		echo "  <div class='alert alert-danger'>First name should not be empty</div>";
	}
	elseif (empty($_POST["surname"])){
		echo " <div class='alert alert-danger'>Surname should not be empty</div>";
	}
	
		elseif(empty($_POST["email"])){
			
	echo " <div class='alert alert-danger'>Email should not be empty </div>";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
	echo " <div class='alert alert-danger'>Invalid email format</div>";
		}
	
	else	
	{
		
	mysqli_query($conn, "Update teacher set name ='$name', surname= '$surname', email ='$email' where teacher_id = '$posted'")or die(mysqli_error($conn)); ?>
	<script>
	alert(' Successfully update teacher details');
	var id = "<?php echo $posted?>";
	window.location.href= "edit_teacher.php?id="+id;
	</script>
	<?php
	}
	}
	?>										
		
          <div class="row">
        <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
            <form class="form-horizontal" validate method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Name<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name"  value="<?php echo $name; ?>" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Surname<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="surname" type="text" value="<?php echo $surname; ?>" required >
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-sm-4">EMAIL<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="email" name="email"  value="<?php echo $email; ?>" required >
                            </div>
                        </div>   
			<div class="form-group">
			<div class="col-sm-8">
			<button type="submit" name="edit" class="btn btn-primary">UPDATE NOW</button>
			  </div>  
			    </div>  
			
        </div>
    </div>   
		 </form>  
			  </div>
			 		
			  </div>
        </div>
    </div>
						
					