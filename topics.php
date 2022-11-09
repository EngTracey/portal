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
    <h2> SUBJECT - TOPICS</h2>
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
								<th  >SUBJECT NAME </th>
								<th  >TOPIC NAME </th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$posted= $_GET['id'];
					$s_id = $session_id;
					$query=mysqli_query($conn, "select * from students where student_id = '$s_id'   ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
										$levelid=$row['level_id'];
					$query=mysqli_query($conn, "select * from subjects where subject_id = '$posted'   ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$l_id=$row['level_id'];
									$s_id=$row['subject_id'];
									$subject = $row['subject_name'];
									
							$query2=mysqli_query($conn, "select * from level where level_id = '$l_id'  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$temp = $rows2['level_name']; 
									
									$query3=mysqli_query($conn, "select * from topics where subject_id = '$posted'  ")or die(mysqli_error($conn));
								while($rows3=mysqli_fetch_array($query3)){
									$topic= $rows3['topic_name']; 
									$id=$rows3['topic_id'];
									
								
									?>
									 <tr class="del<?php echo $id ?>">
										<td ><?php echo $subject; ?></td> 
										<td ><?php echo $topic; ?></td> 
										<td ><a rel="tooltip" href='content.php?id=<?php echo $id; ?>' class="btn btn-info"> VIEW CONTENT</a>                         
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
