<style>.box-body {
    height: 100%;
}
</style>
<?php
$siteSection = "Workbench";


include_once 'inc/required/head.php';

$_SESSION['lastPageVisited'] = $siteSection;
unset($_SESSION['begStamp']);
?>

<title><?php echo $siteTitle?> | <?php echo $siteSection?> </title>

</head>

<body class="fixed sidebar-collapse">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $siteTitle?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $siteTitle?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>



      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">




          <!-- Messages: style can be found in dropdown.less-->
<?php
// include_once 'inc/navbar_messages.php';
?>
          

          
          <!-- Notifications: style can be found in dropdown.less -->
          
<?php
// include_once 'inc/navbar_notifications.php';
?>          
          

          
          <!-- Tasks: style can be found in dropdown.less -->
          
<?php
// include_once 'inc/navbar_tasks.php';
?>            

          
          
          <!-- User Account: style can be found in dropdown.less -->
          
<?php
if($_SESSION['showProfile'] == 1) {
    include_once 'inc/navbar_user.php';
}
?>

          
          <!-- Control Sidebar Toggle Button -->
          
<?php
if(isset($_SESSION['displayRightSidebar']) && ($_SESSION['displayRightSidebar'] == 1)) {
 include_once 'inc/navbar_rightSidebar.php';
}
?>          
 
          
        </ul>
      </div>
    </nav>
  </header>
  
  
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar ">
        
        
      <!-- Sidebar user panel -->
      
<?php
// include_once 'inc/leftbar_user.php';
?>

      
      <!-- Search panel -->
      
<?php
// include_once 'inc/leftbar_search.php';
?>      
      

      
      
      
       <!-- Menu panel -->
      
<?php

$pageID = $_GET['id'];



if($pageID == 1) {$sitePage = "addAgent";}
if($pageID == 2) {$sitePage = "existingAgents";}
if($pageID == 3) {$sitePage = "";}
if($pageID == 4) {$sitePage = "archivedAgents";}

 include_once 'inc/leftbar_menu.php';
?>       
      
 
    </section>
    <!-- /.sidebar -->
  </aside>
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
      
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      
      
    <ol class="breadcrumb">
        <li><a href="http://demoprojects.relocation.co.za"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
-->

    <!-- Main content -->
    <section class="content">
      
      
     
<?php


if($sitePage == "addAgent") {
include_once 'inc/page/workBench/addAgent.php';
}

if($sitePage == "existingAgents") {
include_once 'inc/page/workBench/existingAgents.php';
}

if($sitePage == "") {
include_once 'inc/page/workBench/reviewJobs.php';
}

if($sitePage == "archivedAgents") {
include_once 'inc/page/workBench/archivedAgents.php';
}

?>
      


    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  
  
  
<?php
include_once 'inc/footer.php';
?>  




<?php
if(isset($_SESSION['displayRightSidebar'])) {
include_once 'inc/righSidebar.php';
}
?>                                                                               





<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
 
<!-- ArchivedJobs Table View --> 
<script src="../dist/js/tableData.js"></script>  


        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>



<script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#agentlist').DataTable({
        responsive: true
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

    <!--The div element for the map -->
<script>
    $(document).ready( function () {
    $('#table_id').DataTable({
       rowReorder: {
           selector: 'td:nth-child(2)'
       },
       responsive: true
   });
} );
</script>


</body>
</html>
