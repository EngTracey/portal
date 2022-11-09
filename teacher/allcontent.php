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
    <h2> All CONTENT</h2>
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
                      <th >Content name</th>
								<th  >Level </th>
								<th  >Subject </th>
								<th  >Topic </th>
                                <th  >Type</th>
                                <th  >Size</th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$s_id = $session_id;
					$query=mysqli_query($conn, "select * from teacher_subject where teacher_id = '$s_id' ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
										$subjectid=$row['subject_id'];
					$query=mysqli_query($conn, "select * from topics where subject_id = '$subjectid'  ")or die(mysqli_error($conn));
						while($row=mysqli_fetch_array($query)){
							$topicid=$row['topic_id'];
									$l_id=$row['level_id'];
									$s_id=$row['subject_id'];
					$query4=mysqli_query($conn, "select * from content where topic_id = '$topicid'  ")or die(mysqli_error($conn));
									while($rows4=mysqli_fetch_array($query4)){
									$id=$rows4['topic_id'];
									
							$query2=mysqli_query($conn, "select * from level where level_id = '$l_id'  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$temp = $rows2['level_name']; 
									
									$query3=mysqli_query($conn, "select * from subjects where subject_id = '$s_id'  ")or die(mysqli_error($conn));
								while($rows3=mysqli_fetch_array($query3)){
									$subject = $rows3['subject_name']; 
									}
								
									?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $rows4['content_name']; ?></td> 
										<td ><?php echo $temp; ?></td> 
										<td ><?php echo $subject; ?></td> 
										<td ><?php echo $row['topic_name']; ?></td> 
										<td ><?php echo $rows4['type']; ?></td>
										<td ><?php echo $rows4['size']; ?></td>
										<td ><a rel="tooltip" href='#' class="btn btn-info"> EDIT</a>                         
</td>
									</tr>
									<?php }}}} ?>
                            </tbody>
                 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

    </body>
</html>
