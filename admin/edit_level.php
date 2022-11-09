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
    <h2>Edit level</h2>
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
				$client=mysqli_query($conn, "SELECT * FROM level WHERE level_id = '$posted'")or die(mysqli_error($conn));
									while($s_row=mysqli_fetch_array($client)){						
							$level_id =$s_row['level_id'];
							$level =$s_row['level_name'];
						
						
									} 
					
									?> 
<?php									
if (isset($_POST['edit'])){
	
	$level=$_POST['level'];
	
//validation starts
	if (empty($_POST["level"])) {
		echo "  <div class='alert alert-danger'>level name should not be empty</div>";
	}
	
	else	
	{
		
	mysqli_query($conn, "Update level set level_name ='$level' where level_id = '$posted'")or die(mysqli_error($conn)); ?>
	<script>
	alert(' Successfully update level details');
	var id = "<?php echo $posted?>";
	window.location.href= "edit_level.php?id="+id;
	</script>
	<?php
	}
	}
	?>										
		
          <div class="row">
        <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
            <form class="form-horizontal" validate method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Level<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="level"  value="<?php echo $level; ?>" required >
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
						
					