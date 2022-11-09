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
    <h2>Add teacher- subjects</h2>
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
                            <label class="control-label col-sm-4">TEACHER ID<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="teacher"  required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">SUBJECT<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                   <select name="subject" class="form-control">
						<option class="form-control"  value="">Select Subject...</option>
						<?php
				$query=mysqli_query($conn, "select * from subjects ")or die(mysqli_error($conn));
								while($rows=mysqli_fetch_array($query)){
									$tem = $rows['subject_name']; ?>
		<option class="form-control"  value="<?= $rows['subject_id']; ?>"><?= $rows['subject_name']; ?></option>
				<?php } ?>						
			</select>
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
	$teacher=$_POST['teacher'];
	$subject=$_POST['subject'];
//validation starts
	if (empty($_POST["teacher"])) {
		echo "  <div class='alert alert-danger'>Teacher ID should not be empty</div>";
	}
	elseif (empty($_POST["subject"])){
		echo " <div class='alert alert-danger'>Please select subject</div>";
	}
	
	else	
	{
		
	$re=mysqli_query($conn, "INSERT INTO teacher_subject (teacher_id, subject_id) values('$teacher', '$subject')")or die(mysqli_error($conn)); 
	 if($re)
{



echo "<div class='alert alert-danger'>Subject Assigned successfully. </div>";
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
						
					