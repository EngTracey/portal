 <?php
include('session.php'); 
 include 'template-parts/header.php' ;
 include 'template-parts/nav.php' ?>
        <div class="page-wrapper">
            
 <?php include 'template-parts/sidebar.php' ?>
            <div class="page-content">
                <div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Dashboard</a></li>
    </ol>
</div>

<div class="container-fluid-md">
      <div class="row">
        <div class="col-xs-12 col-md-12">
            <ul class="nav nav-tabs">
                <!--<li class=""><a data-toggle="tab" href="dashboard.php#tab-top-selling">RESULTS</a></li>-->
                <li class="active"><a data-toggle="tab" href="dashboard.php#tab-most-viewed">Instructions</a></li>
            </ul>

            <div class="tab-content">
               <div id="tab-top-selling" class="tab-pane tab-pane-table ">
                    <div class="table-responsive">
                        <!-- <table class="table" class="table table-striped">
                            <thead>
                            <tr>
                                <th >Position</th>
								<th >Date </th>
								<th >All Votes</th>
                                <th  >Winner</th>
                                <th  >Vote Count</th>
                                <th >&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                           <?php
					$s_id = $adminsession_id;
					$query=mysqli_query($conn, "select * from election_table where date_start < NOW() ORDER BY date_start DESC LIMIT 10 ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($query)){
									$id=$row['e_id'];
								$squery=mysqli_query($conn, "select * from candidates where e_id = '$id' ORDER BY v_counts DESC LIMIT 1")or die(mysqli_error($conn));
									while($ros=mysqli_fetch_array($squery)){
									$tid=$ros['employee_id'];
									$ssquery=mysqli_query($conn, "select * from employees where employee_id = '$tid' ")or die(mysqli_error($conn));
									$ross=mysqli_fetch_array($ssquery)
									?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['position']; ?></td>
									<td ><?php echo $row['date_start']; ?></td> 
									<td ><?php echo $row['all_votes']; ?></td> 
										<td ><?php echo $ross['first_name']." ".$ross['surname']; ?></td> 
										<td ><?php echo $ros['v_counts']; ?></td> 
									</tr>
									<?php }} ?>
                           
                            </tbody>
                        </table> -->
                    </div>
                </div> 
                <div id="tab-most-viewed" class="tab-pane tab-pane-table active">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th >Position</th>
								<th  >Date </th>
                                <th  >Number Of Candidates</th>
                                <th >&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                           <?php
					$query=mysqli_query($conn, "select * from election_table where date_start > NOW() ORDER BY date_start DESC LIMIT 10 ")or die(mysqli_error());
									while($row=mysqli_fetch_array($query)){
									$id=$row['e_id']; 
									$result = mysqli_query($conn,"SELECT count(*) FROM  candidates where e_id = '$id' ")or die(mysqli_error($conn));
					$ro = mysqli_fetch_row($result);
					$numrow = $ro[0]
									?>
									 <tr class="del<?php echo $id ?>">
									<td><?php echo $row['position']; ?></td>
									<td ><?php echo $row['date_start']; ?></td> 
										<td ><?php echo $numrow; ?></td> 

									</tr>
									<?php } ?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      
    </body>
</html>
