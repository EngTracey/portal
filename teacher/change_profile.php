 <?php
include('session.php'); 
 include 'template-parts/header.php' ;
 include 'template-parts/nav.php' ?>
        <div class="page-wrapper">          
 <?php include 'template-parts/sidebar.php' ?>
            <div class="page-content">
        
	<?php 
				
				$employee=mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id'")or die(mysqli_error($conn));
									while($e_row=mysqli_fetch_array($employee)){
									$id=$e_row['teacher_id']; 
									$first_name=$e_row['name']; 
									$surname=$e_row['surname']; 
									$dob=$e_row['dob']; 
									$gender=$e_row['gender'];
									$phone=$e_row['phone'];
									$email=$e_row['email'];	
									if($e_row['images'] == "")
									{
									$img ="../teacher/images/default.jpg";	
									}
									else
									{
									$img ="../teacher/images/".$e_row['images'];
									}
									}
									?>
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
				    <div class="page-subheading page-subheading-md">Change Profile Image<i>(only jpg images allowed (128 * 128)px) </i></div>
                    <div class="col-sm-5 text-center">
                        <img alt="image" class="img-circle img-profile" src="<?php echo $img; ?>" width="128" height="128">
                    </div>
                    <div class="col-sm-7 profile-details">
					<h4 class="thin"><input type="file" id="inputEmail" name="image" accept="application/jpg" required>	</h4>
                   <h3><button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button></h3>
                  
					</form>   
                     <p><img id="filePreview" style="display:none;"/></p>
                    </div>
                </div>
               <?php
	if (isset($_POST['edit'])){
		
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
