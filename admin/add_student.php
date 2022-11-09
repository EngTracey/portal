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
    <h2>Add new student</h2>
</div>
<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"></h4>

            <div class="panel-options">
               
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">

		
          <div class="row">
        <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
            <form class="form-horizontal" validate method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Name<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name"  required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Surname<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="surname" type="text"  required >
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-sm-4">EMAIL<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="email" name="email"  required >
                            </div>
                        </div>   
						<div class="form-group">
                            <label class="control-label col-sm-4">LEVEL<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <select name="level" class="form-control">
						<option class="form-control"  value="">Select Level...</option>
						<?php
				$query2=mysqli_query($conn, "select * from level ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$temp = $rows2['level_name']; ?>

		<option class="form-control"  value="<?= $rows2['level_id']; ?>"><?= $rows2['level_name']; ?></option>
				<?php } ?>						
			</select>
                            </div>
                        </div>  
						<div class="form-group">
                            <label class="control-label col-sm-4">STATUS<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="text" value= "Active"  name="status" disabled>
                            </div>
                        </div>   
			<div class="form-group">
			<div class="col-sm-8">
			<button type="submit" name="add" class="btn btn-primary">ADD NOW</button>
			  </div>  
			    </div>  
			
        </div>
    </div>   
		 </form>  
			  </div>
			 			<?php
	if (isset($_POST['add'])){
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$email=$_POST['email'];
	$level=$_POST['level'];
//validation starts
	if (empty($_POST["name"])) {
		echo "  <div class='alert alert-danger'>Name should not be empty</div>";
	}
	elseif (empty($_POST["surname"])){
		echo " <div class='alert alert-danger'>Surname should not be empty</div>";
	}
	
		elseif(empty($_POST["email"])){
			
	echo " <div class='alert alert-danger'>Email should  not be empty </div>";
		}
	
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
	echo " <div class='alert alert-danger'>Invalid email format</div>";
		}
		elseif(empty($_POST["level"])){
			
	echo " <div class='alert alert-danger'>Please select level</div>";
		}
	else	
	{
		
	$re=mysqli_query($conn, "INSERT INTO students (name, surname, email, level_id,status,password) values('$name', '$surname', '$email','$level','Active','12345')")or die(mysqli_error($conn)); 
	 if($re)
{



echo "<div class='alert alert-danger'>Student added successfully. </div>";
}
else
{
 echo "<div class='alert alert-danger'>We have found some technical glitch and unable to process your request. Try again later.</div>";
}
//updating status if validation passes
?>
	
	<?php
	}
	}
	?>	
			  </div>
        </div>
    </div>
						
					