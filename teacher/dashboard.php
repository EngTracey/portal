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
               <!-- <li class=""><a data-toggle="tab" href="dashboard.php#tab-top-selling">RESULTS</a></li>-->
                <li class="active"><a data-toggle="tab" href="dashboard.php#tab-most-viewed">INSTRUCTIONS</a></li>
            </ul>

            <div class="tab-content">
                <div id="tab-top-selling" class="tab-pane tab-pane-table ">
                  
                </div>
                <div id="tab-most-viewed" class="tab-pane tab-pane-table active">
                   
            </div>
        </div>
      
    </body>
</html>
