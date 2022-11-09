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
    <h2> GRADE ASSIGNMENTS</h2>
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
                      <th >Assignment _name</th>
								<th  >Level </th>
								<th  >Subject </th>
                                <th  >Date Given</th>
                                <th  >Due Date</th>
                                <th  >Type</th>
                                <th  >Size</th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$new = date('y-m-d');
					$todays_date = strtotime($new);
					$s_id = $session_id;
					$query=mysqli_query($conn, "select * from teacher_subject where teacher_id = '$s_id'   ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
										$subjectid=$row['subject_id'];
					$query=mysqli_query($conn, "select * from assignments where subject_id = '$subjectid' and due_date < $todays_date ORDER BY date_given DESC ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['assign_id'];
									$l_id=$row['level_id'];
									$s_id=$row['subject_id'];
									
							$query2=mysqli_query($conn, "select * from level where level_id = '$l_id'  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$temp = $rows2['level_name']; 
									
									$query3=mysqli_query($conn, "select * from subjects where subject_id = '$s_id'  ")or die(mysqli_error($conn));
								while($rows3=mysqli_fetch_array($query3)){
									$subject = $rows3['subject_name']; 
									}
								
									?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['assign_name']; ?></td> 
										<td ><?php echo $temp; ?></td> 
										<td ><?php echo $subject; ?></td> 
									<td ><?php echo $row['date_given']; ?></td> 
										<td ><?php echo $row['due_date']; ?></td>
										<td ><?php echo $row['type']; ?></td>
										<td ><?php echo $row['size']; ?></td>
										<td ><a rel="tooltip" title="Edit" href='edit_level.php?id=<?php echo $id; ?>' ><span class="label label-success"> <i class="fa fa-fw fa-pencil"></i></span></a> 
									</td>
									</tr>
									<?php }}} ?>
                            </tbody>
                 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

    </body>
</html>
