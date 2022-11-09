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
    <h2> All SUBJECTS</h2>
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
                      <th >Subject name</th>
								<th  >Level </th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$query=mysqli_query($conn, "select * from subjects ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['subject_id'];
									$l_id=$row['level_id'];
									
							$query2=mysqli_query($conn, "select * from level where level_id = '$l_id'  ")or die(mysqli_error($conn));
								while($rows2=mysqli_fetch_array($query2)){
									$level = $rows2['level_name']; 
									
									?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['subject_name']; ?></td> 
										<td ><?php echo $level; ?></td> 
										<td ><a rel="tooltip" title="Edit" href='edit_subject.php?id=<?php echo $id; ?>' ><span class="label label-success"> <i class="fa fa-fw fa-pencil"></i></span></a> 
										</td>                  
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
