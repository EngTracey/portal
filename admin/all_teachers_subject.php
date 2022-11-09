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
    <h2> All Teacher - Subject</h2>
</div>
					
<div class="container-fluid-md">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"></h4>

            <div class="panel-options">
               
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="table-basic" class="table" class="table table-striped">
                    <thead>
                    <tr>
                      <th >Teacher ID</th>
								<th  >Name </th>
								<th  >Surname </th>
                                <th  >Level</th>
                                <th  >Subject</th>
								
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$s_id = $adminsession_id;
					
						$query2=mysqli_query($conn, "select * from teacher_subject  ")or die(mysqli_error($conn));
						while($row2=mysqli_fetch_array($query2)){
							$subjectid=$row2['subject_id']; 
							$id=$row2['teacher_id']; 
							$query3=mysqli_query($conn, "select * from subjects where subject_id='$subjectid' ")or die(mysqli_error($conn));
						while($row3=mysqli_fetch_array($query3)){
							$levelid=$row3['level_id'];
							$query4=mysqli_query($conn, "select * from level where level_id='$levelid' ")or die(mysqli_error($conn));
						while($row4=mysqli_fetch_array($query4)){
							$query=mysqli_query($conn, "select * from teacher where teacher_id='$id'")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									
							 
									
									?>
							
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['teacher_id']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td ><?php echo $row['surname']; ?></td> 
									<td ><?php echo $row4['level_name']; ?></td> 
									<td ><?php echo $row3['subject_name']; ?></td> 
									

									</tr>
						<?php }} }}?>
                            </tbody>
                 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
