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
    <h2> All CONTENT UPLOADED</h2>
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
                                <th  >Topic</th>
                                <th  >Type</th>
                                <th  >Size</th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$query=mysqli_query($conn, "select * from content ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['content_id'];
									$t_id=$row['topic_id'];
									
									$query3=mysqli_query($conn, "select * from topics where topic_id = '$t_id' ")or die(mysqli_error($conn));
								while($rows3=mysqli_fetch_array($query3)){
									$topic = $rows3['topic_name']; 
									$s_id=$rows3['subject_id'];
									
									
									$query4=mysqli_query($conn, "select * from subjects where subject_id = '$s_id' ")or die(mysqli_error($conn));
								while($rows4=mysqli_fetch_array($query4)){
									$subject = $rows4['subject_name']; 
									$l_id=$rows4['level_id'];
									
							$query2=mysqli_query($conn, "select * from level where level_id = '$l_id'  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$level = $rows2['level_name']; 
									
									?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['content_name']; ?></td> 
										<td ><?php echo $level; ?></td> 
									<td ><?php echo $subject; ?></td> 
										<td ><?php echo $topic; ?></td>
										<td ><?php echo $row['type']; ?></td>
										<td ><?php echo $row['size']; ?></td>
										<td ><a rel="tooltip" href='#' class="btn btn-info"> Download</a>                         
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
