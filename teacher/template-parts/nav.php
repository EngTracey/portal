       <header>
            <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
                <div class="navbar-brand-group">
                    <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                        <i class="fa fa-lg fa-fw fa-bars"></i>
                    </a>
                    <a class="navbar-brand hidden-xxs" href="#">
                        <span class="sc-visible">
                            
                        </span>
                        <span class="sc-hidden">
                            <span class="semi-bold"> PORTAL</span>
                          (TEACHER)
                        </span>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
               <?php 
				$s_id = $session_id;
				$client=mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$s_id'")or die(mysqli_error());
									while($s_row=mysqli_fetch_array($client)){
									$name=$s_row['name']." ".$s_row['surname'];
									}
									?> 
    
                   
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                            <span class="hidden-xs">Settings</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
				<!--  <img class="img-circle" src="logo2.png"> -->
				
                <a id="navbar-buy-theme" class="btn btn-success btn-sm navbar-btn btn-round pull-right margin-right-md" href="#"> Hello <?php echo $name;?> ! </a>
            </nav>
        </header>