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
    <h2> TOPIC - CONTENT</h2>
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
								<th  >CONTENT NAME </th>
								<th  >TYPE </th>
								<th  >SIZE</th>
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
					$query=mysqli_query($conn, "select * from content where topic_id = '$posted'   ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$t_id=$row['topic_id'];
									$id=$row['topic_id'];
									
							$query2=mysqli_query($conn, "select * from topics where topic_id = '$t_id'  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$temp = $rows2['topic_name']; 
									$sub_id=$rows2['subject_id'];
									
									$query3=mysqli_query($conn, "select * from subjects where subject_id = '$sub_id'  ")or die(mysqli_error($conn));
								while($rows3=mysqli_fetch_array($query3)){
									$subject= $rows3['subject_name']; 
									
								
									?>
									 <tr class="del<?php echo $id ?>">
										<td ><?php echo $subject; ?></td> 
									 <td ><?php echo  $rows2['topic_name']; ?></td> 
									 <td ><?php echo  $row['content_name']; ?></td> 
										<td ><?php echo $row['type']; ?></td> 
										<td ><?php echo $row['size']; ?></td> 
										<td ><a rel="tooltip" href='#' class="btn btn-info"> DOWNLOAD</a>                         
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
