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
    <h2> All LEVELS</h2>
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
                      <th >Level name</th>
								<th  >Action</th>
                                
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$query=mysqli_query($conn, "select * from level order by level_name ASC")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['level_id'];
									?>
									 <tr class="del<?php echo $id ?>">
										<td ><?php echo $row['level_name']; ?></td> 
									<td ><a rel="tooltip" title="Edit" href='edit_level.php?id=<?php echo $id; ?>' ><span class="label label-success"> <i class="fa fa-fw fa-pencil"></i></span></a> 
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
