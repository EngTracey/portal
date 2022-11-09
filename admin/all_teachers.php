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
    <h2> All Teachers</h2>
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
                                <th  >Email</th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$s_id = $adminsession_id;
					$query=mysqli_query($conn, "select * from teacher ORDER BY teacher_id ASC")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['teacher_id']; 
									
									?>
									 <?php
					;
						?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['teacher_id']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td ><?php echo $row['surname']; ?></td> 
									<td ><?php echo $row['email']; ?></td> 
									<td ><a rel="tooltip" title="Edit" href='edit_teacher.php?id=<?php echo $id; ?>' ><span class="label label-success"> <i class="fa fa-fw fa-pencil"></i></span></a> 
									</td>

									</tr>
									<?php } ?>
                            </tbody>
                 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
