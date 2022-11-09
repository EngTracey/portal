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
    <h2> ALL Your Submitted ASSIGNMENTS</h2>
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
                      <th >Assignment name</th>
                      <th >Student ID</th>
                                <th  >Date In</th>
                                <th  >Type</th>
                                <th  >Size</th>
                                <th  >Mark %</th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$s_id = $session_id;
					$query=mysqli_query($conn, "select * from sudent_assignment   ORDER BY date_in DESC ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['id'];
									$sid=$row['assign_id'];
							$query2=mysqli_query($conn, "select * from assignments where assign_id = '$sid'  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									
									?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $rows2['assign_name']; ?></td>
									<td ><?php echo $row['Student_assign_id']; ?></td> 
									<td ><?php echo $row['date_in']; ?></td> 
										<td ><?php echo $row['type']; ?></td>
										<td ><?php echo $row['size']; ?></td>
										<td ><?php echo $row['grade']; ?></td>
										<td ><a rel="tooltip" href='assignments/<?php echo $row['files']; ?>' class="btn btn-info"> Download</a>   
											<a rel="tooltip" href='add_mark.php?id=<?php echo $id; ?>' class="btn btn-info"> Add Mark</a>     										
										</td>
									</tr>
									<?php }} ?>
                            </tbody>
                 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

    </body>
</html>
