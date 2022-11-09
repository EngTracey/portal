<!--teacher sidebar-->
<aside class="sidebar sidebar-default">
<div class="sidebar-profile">
				 <?php 
				$s_id = $session_id;
				$client=mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$s_id'")or die(mysqli_error());
									while($s_row=mysqli_fetch_array($client)){
									$name=$s_row['name']." ".$s_row['surname'];
									if($s_row['images'] == "")
									{
									$img ="../teacher/images/default.jpg";	
									}
									else
									{
									$img ="../teacher/images/".$s_row['images'];
									}
									}
									?>
                    <img class="img-circle profile-image" src="<?php echo $img; ?>">

                    <div class="profile-body">
	
                        <h4><span><?php echo $name;?></span></h4>

                        <div class="sidebar-user-links">
                            <a class="btn btn-link btn-xs" href="profile.php" data-placement="bottom" data-toggle="tooltip" data-original-title="Profile"><i class="fa fa-user"></i></a>
                            <a class="btn btn-link btn-xs" href="logout.php" data-placement="bottom" data-toggle="tooltip" data-original-title="Logout"><i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                </div>
                <nav>
                    <h5 class="sidebar-header">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
					
					  <li class="nav-dropdown">
                            <a href="dashboard.php" title="Dashboards">
                                <i class="fa fa-lg fa-fw fa-home"></i>DASHBOARD
                            </a>
                            
                        </li>
						
                        <li class="nav-dropdown active open">
						
                            <a href="#" title="">  <i class="fa fa-lg fa-fw fa-question"></i>  ASSIGNMENTS
                            </a>
                            <ul class="nav-sub">
                                   <li class="active open">
                                    <a href="add_assignment.php" title="">
                                        <i class="fa fa-fw fa-caret-right"></i> ASSIGNMENT
									 <span class="label label-danger pull-right">NEW</span>
                                    </a>
                                </li>
								    <li>
                                    <a href="dueassignments.php" title="">
                                        <i class="fa fa-fw fa-caret-right"></i>DUE ASSIGNMENTS
                                    </a>
                                </li>
								<li>
                                    <a href="submittedassignments.php" title="">
                                        <i class="fa fa-fw fa-caret-right"></i> ALL SUBMITTED ASSIGNMENTS
                                    </a>
                                </li>
								<li>
                                    <a href="allassignments.php" title="">
                                        <i class="fa fa-fw fa-caret-right"></i> ALL ASSIGNMENTS
                                    </a>
                                </li>
                            </ul>
                        </li>
                     
                        
                        <li class="nav-dropdown">
                            <a href="#" title="">
                                <i class="fa fa-lg fa-fw fa-user"></i> PROFILE
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="profile.php" title="">
                                        <i class="fa fa-fw fa-caret-right"></i> My Profile
                                    </a>
                                </li><li>
                                    <a href="change_profile.php" title="">
                                        <i class="fa fa-fw fa-caret-right"></i> Profile Picture
                                    </a>
                                </li>
                                <li>
                                    <a href="changepwd.php" title="Password">
                                        <i class="fa fa-fw fa-caret-right"></i>Change Password
                                    </a>
                                </li>
                            </ul>
                        </li>
                          <li class="disabled">
                            <a href="javascript:;" title="Disabled">
                                <i class="fa fa-lg fa-fw fa-th"></i> Developed by Tracey Ndoro
                            </a>
                        </li>
                      
                       
                    </ul>
                   
                </nav>
            </aside>