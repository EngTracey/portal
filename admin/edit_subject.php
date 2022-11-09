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
    <h2>Add new subject</h2>
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
				$client=mysqli_query($conn, "SELECT * FROM subjects WHERE subject_id = '$posted'")or die(mysqli_error($conn));
									while($s_row=mysqli_fetch_array($client)){						
							$subject_id =$s_row['subject_id'];
							$level =$s_row['level_id'];
							$subject =$s_row['subject_name'];
						
						
									} 
					
									?> 
<?php									
if (isset($_POST['edit'])){
	
		$val = $_POST['level'];
	$query=mysqli_query($conn, "select * from level where level_id = '$val' ")or die(mysqli_error($conn));
								$rows=mysqli_fetch_array($query);
								$tem = $rows['level_name']; 
	$level=$_POST['level'];
	$subject= $tem . " " . $_POST['subject'];
//validation starts
	if (empty($_POST["level"])) {
		echo "  <div class='alert alert-danger'>level name should not be empty</div>";
	}
	
	else	
	{
		
	mysqli_query($conn, "Update subjects set subject_name ='$subject', level_id ='$level' where subject_id = '$posted'")or die(mysqli_error($conn)); ?>
	<script>
	alert(' Successfully update subject details');
	var id = "<?php echo $posted?>";
	window.location.href= "edit_subject.php?id="+id;
	</script>
	<?php
	}
	}
	?>	
		
          <div class="row">
        <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
            <form class="form-horizontal" validate method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-4">SUBJECT NAME<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="subject" value="<?php echo $subject; ?>" required >
                            </div>
                        </div>
                    
						 <div class="form-group">
                            <label class="control-label col-sm-4">LEVEL<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                    <select name="level" class="form-control">
									<?php 
									$qu=mysqli_query($conn, "select * from level where level_id = '$posted' ")or die(mysqli_error($conn));
								$row=mysqli_fetch_array($qu); ?>
						<option class="form-control"  value="<?php echo $level; ?>"><?php echo $row['level_name'];; ?></option>
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
			<div class="col-sm-8">
		<button type="" name="edit" class="btn btn-primary">UPDATE NOW</button>
			 </div> 
			 </div>
    </div>    	
			
		 </form>  
			  </div>
	
			  </div>
        </div>
    </div>
						
					