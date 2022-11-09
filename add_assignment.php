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
   <h2>Submit assignment</h2>
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
                            <label class="control-label col-sm-4">ASSIGNMENT NAME<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                     <select name="level" class="form-control">
						<option class="form-control"  value="">Select Assignment...</option>
						<?php
						$s_id = $session_id;
						$query=mysqli_query($conn, "select * from students where student_id = $s_id  ")or die(mysqli_error($conn));
								$rows=mysqli_fetch_array($query);
									$lev = $rows['level_id'];
				$query2=mysqli_query($conn, "select * from assignments where level_id = $lev  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$tem = $rows2['level_name']; ?>

		<option class="form-control"  value="<?= $rows2['asssign_id']; ?>"><?= $rows2['assign_name']; ?></option>
				<?php } ?>						
			</select>
                            </div>
                        </div>
						
						
						<div class="form-group">
                            <label class="control-label col-sm-4">Assignment File<span class="asterisk">* </span></label>
                            <div class="col-sm-8">
                              <input type="file" name="myfile" id="myfile" id="fileToUpload" required>
                        </div>
                        </div>  
			<div class="form-group">
			<div class="col-sm-8">
			<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit NOW</button>
			  </div>  
			    </div>  
			
        </div>
    </div>   
		 </form>  
			  </div>
<?php


    if (isset($_POST['submit'])) {
		
$assignment=$_POST['assignment'];
	 $currentDir = getcwd();
    $uploadDirectory = "/assignments/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['pdf']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    $file_size = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $file_type = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a PDF";
        }

       
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
		mysqli_query($conn, "INSERT INTO sudent_assignment (assign_id,Student_assign_id, type,size,date_in,files) values('$assignment', '$session_id','$file_type','$file_size',now(),'$fileName')")or die(mysqli_error($conn)); 
						

    
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }


	

?>
		           
			  </div>
        </div>
    </div>
			