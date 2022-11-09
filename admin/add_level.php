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
    <h2>Add new level</h2>
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
                            <label class="control-label col-sm-4">LEVEL NAME<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="level"  required >
                            </div>
                        </div>
                    
						                 
        </div>
		<div class="form-group">
			<div class="col-sm-8">
		<button type="" name="add" class="btn btn-primary">ADD NOW</button>
			 </div> 
			 </div>
    </div>    	
			
		 </form>  
			  </div>
						 			 			<?php
	if (isset($_POST['add'])){
	$level=$_POST['level'];
//validation starts
	if (empty($_POST["level"])) {
		echo "  <div class='alert alert-danger'>Level should not be empty</div>";
	}
	
		
	else	
	{
		
	$re=mysqli_query($conn, "INSERT INTO level (level_name) values('$level')")or die(mysqli_error($conn)); 
	 if($re)
{



echo "<div class='alert alert-danger'>Level added successfully. </div>";
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
						
					