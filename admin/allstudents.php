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
    <h2> All Students</h2>
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
                      <th >Student ID</th>
								<th  >Name </th>
								<th  >Surname </th>
                                <th  >Email</th>
                                <th  >Level</th>
                                <th  >Status</th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$s_id = $adminsession_id;
					$query=mysqli_query($conn, "select * from students  ORDER BY student_id ASC")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['student_id']; 
									$l_id=$row['level_id']; 
									$query2=mysqli_query($conn, "select * from level where level_id='$l_id' ")or die(mysqli_error($conn));
									while($rows=mysqli_fetch_array($query2)){
									
									
									?>
								
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['student_id']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td ><?php echo $row['surname']; ?></td> 
										<td ><?php echo $row['email']; ?></td> 
										<td ><?php echo $rows['level_name']; ?></td> 
										<td ><?php echo $row['status']; ?></td> 
										<td ><a rel="tooltip" title="Edit" href='edit_student.php?id=<?php echo $id; ?>' ><span class="label label-success"> <i class="fa fa-fw fa-pencil"></i></span></a> 
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
