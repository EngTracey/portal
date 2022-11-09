 <?php
include('session.php'); 
 include 'template-parts/header.php' ;
 include 'template-parts/nav.php' ?>
        <div class="page-wrapper">          
 <?php include 'template-parts/sidebar.php' ?>
            <div class="page-content">
        

<div class="page-heading page-heading-md">
    <h2></h2>
</div>
	
<div class="container-fluid-md">
    <div class="row">
	<div class="container-fluid-md">
    <div class="row">
        <div class="col-md-7 col-lg-8">
            <div class="panel panel-default panel-profile-details">
                <div class="panel-body">
				<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				    <div class="page-subheading page-subheading-md">UPLOAD CONTENT<i>(only pps,pdf,swf,doc,png,jpg) </i></div>
                   	 <div class="form-group">
                            <label class="control-label col-sm-4">LEVEL<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="employee_id"  required >
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-sm-4">SUBJECT<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="employee_id"  required >
                            </div>
                        </div>
				   <div class="form-group">
                            <label class="control-label col-sm-4">TOPIC NAME<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="employee_id"  required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">CHOOSE FILE<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
					<h4 class="thin"><input type="file" id="inputEmail" name="image" accept="application/jpg" required>	</h4>
                        </div>
						(SIZE, TYPE IT IS DEFINED BY THE SYSTEM)
                    <div class="col-sm-7 profile-details">
					
                   <h3><button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Upload</button></h3>
                                              </div>
					</form>   
                     <p><img id="filePreview" style="display:none;"/></p>
                    </div>
				
                </div>
               <?php
	if (isset($_POST['submit'])){
		
	 if(isset($_FILES['image'])){
    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $explode = explode('.',$_FILES['image']['name']);
	  $file_ext = strtolower(end($explode));
	  $newfilename =$username.".".$file_ext;
      $expensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if (file_exists("../teacher/images/" . $file_name))
		{
			// file already exists error
			//echo "You have already uploaded this file.";
			 unlink($newfilename);
			 move_uploaded_file($file_tmp,"../teacher/images/".$newfilename);
         mysqli_query($conn, "UPDATE teacher SET images ='$newfilename' where teacher_id='$session_id'")or die(mysqli_error()); ?>
	<script>
	alert('Successfully updated');
	window.location="change_profile.php";
	</script>
	<?php
		}
      if($file_size > 2097152) {
         $errors[]='File size must be 2 MB or less';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../teacher/images/".$newfilename);
         mysqli_query($conn, "UPDATE students SET images ='$newfilename' where student_id='$session_id'")or die(mysqli_error()); ?>
	<script>
	alert('Successfully updated');
	window.location="change_profile.php";
	</script>
	<?php
	
      }else{
         print_r($errors);
      }
   }
}  
	
	}
	?>         
                    </div>
                </div>
            </div>
        </div> 
        </div> 
        </div> 
		</div>
		</div>

        </div>
    </div>
</div>
        </div>
    </div>
</div>
            </div>
        </div>   
	
    </body>
</html>
