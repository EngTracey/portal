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
    <h2>Add new assignment</h2>
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
                                <input type="text" class="form-control" name="assignment"  required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">LEVEL<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                   <select name="level" class="form-control">
						<option class="form-control"  value="">Select Level...</option>
						<?php
				$query=mysqli_query($conn, "select * from level ")or die(mysqli_error($conn));
								while($rows=mysqli_fetch_array($query)){
									$tem = $rows['level_name']; ?>

		<option class="form-control"  value="<?= $rows['level_id']; ?>"><?= $rows['level_name']; ?></option>
				<?php } ?>						
			</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-sm-4">SUBJECT<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                  <select name="subject" class="form-control">
						<option class="form-control"  value="">Select subject...</option>
						<?php
				$query2=mysqli_query($conn, "select * from subjects ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$temp = $rows2['subject_name']; ?>

		<option class="form-control"  value="<?= $rows2['subject_id']; ?>"><?= $rows2['subject_name']; ?></option>
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
                            <label class="control-label col-sm-4">DUE DATE<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="date" name="due"  required >
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
		
$assignment=$_POST['assignment'];
	$subject=$_POST['subject'];
	$level=$_POST['level'];
	$due_date=$_POST['due'];
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
		mysqli_query($conn, "INSERT INTO assignments (assign_name, subject_id, level_id, type,size,date_given,due_date,files) values('$assignment', '$subject', '$level','$file_type','$file_size',now(),'$due_date','$fileName')")or die(mysqli_error($conn)); 
							// suppress error message
    error_reporting(0);

    // BulkSMS Webservice username for sending SMS.
    //Get it from User Configuration. Its case sensitive.

    $username = 'nyusher';

    // Webservices token for above Webservice username
    $token = 'd3ad9df74ab6b51e57ed43ad17cede41';

    // BulkSMS Webservices URL
    $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';

    // destination numbers, comma seperated or use #groupcode for sending to group
    // $destinations = '#devteam,263071077072,26370229338';
    // $destinations = '26300123123123,26300456456456';  for multiple recipients
	
	$query=mysqli_query($conn, "select phone from students where level_id ='$level' ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$phone=$row['phone']; 
									
    $destinations = $phone;
    // SMS Message to send
    $message = "You have a new assignment uploaded due date $due_date. Camelot Junior School ";

    // send via BulkSMS HTTP API

    $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
    $ws_str .= '&to=' . urlencode($destinations) . '&msg='.urlencode($message);
    $ws_response = @file_get_contents($ws_str);
	}
							

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
						
					