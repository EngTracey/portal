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
    <h2>Add assignment mark</h2>
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
            <form class="form-horizontal"  method="post" enctype="multipart/form-data">
                       
                        <div class="form-group">
                            <label class="control-label col-sm-4">Student Name<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                   <select name="level" class="form-control" disabled>
						<?php
						$posted= $_GET['id'];
				$query2=mysqli_query($conn, "select * from sudent_assignment where id = '$posted' ")or die(mysqli_error($conn));
								$row=mysqli_fetch_array($query2);
									$temp = $row['Student_assign_id']; 
									$query=mysqli_query($conn, "select * from students where student_id = '$temp' ")or die(mysqli_error($conn));
								while($rows=mysqli_fetch_array($query)){
									$tem = $rows['name']; 
									?>

		<option class="form-control"  value="<?= $rows['student_id']; ?>"><?= $rows['name']; ?> <?= $rows['surname']; ?></option>
				<?php } ?>						
			</select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-sm-4">Assignment Mark<span class="asterisk">* </span></label>
                            <div class="col-sm-8">
                              <input type="number" name="mark" id="mark" id="mark"  class="form-control" required>
                        </div>
                        </div>  
			<div class="form-group">
			<div class="col-sm-8">
			<button type="submit" name="submit" value="Submit" class="btn btn-primary">ADD NOW</button>
			  </div>  
			    </div>  
			
        </div>
    </div>   
		 </form>  
			  </div>
<?php


    if (isset($_POST['submit'])) {
		
$assignment=$_POST['mark'];
	mysqli_query($conn, "UPDATE sudent_assignment SET grade ='$assignment' where id='$posted'")or die(mysqli_error()); ?>
	<script>
	alert('Successfully updated');
	window.location="add_mark.php";
	</script>
	<?php
	}
	?>
		           
			  </div>
        </div>
    </div>
						
					