 <?php 
  include('log_in/functions.php');

  if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location:index.php');
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cagayan Tourist Website</title>

<style>
    #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin:1px;
    width: 120px;
    height: 45px;
   }

</style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->



  <!-- Google Font -->
 </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
   
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Cagayan Tourist</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>

      <div class="navbar-custom-menu ">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/user.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs" style="margin-right: 15px"><strong><?php echo $_SESSION['user']['username']; ?></strong></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user.jpeg" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION['user']['username']; ?>
                  <small> <?php echo $_SESSION['user']['email']; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div >
                  <a href="signout.php" class="btn btn-default btn-flat" style="width:100%">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/user.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user']['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
           <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Set up</li>
          <li>
          <a href="admin.php">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Spot category</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php
                                    include ('config.php');
                                    $sql="SELECT * from types";
                                    $q=mysqli_query($dbconnect,$sql);
                                    while ($row=mysqli_fetch_assoc($q)) {
                                    echo"<a href=adminSpot.php?y=".$row['type_id']."><option value='".$row['type_id']."'>".$row['type']."</option></a>";
                                      }
                                      ?>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Adventures</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php
                                    include ('config.php');
                                    $sql="SELECT * from category";
                                    $q=mysqli_query($dbconnect,$sql);
                                    while ($row=mysqli_fetch_assoc($q)) {
                                    echo"<a href=adminCategory.php?y=".$row['cat_id']."><option value='".$row['cat_id']."'>".$row['category']."</option></a>";
                                      }
                                      ?>
          </ul>
        </li>
        <li>
          <a href="category.php">
            <i class="glyphicon glyphicon-calendar"></i> <span>category</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
          <li>
          <a href="event.php">
            <i class="glyphicon glyphicon-calendar"></i> <span>Events</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="howTo.php">
            <i class="glyphicon glyphicon-calendar"></i> <span>Instruction</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href="type.php">
            <i class="fa fa-list"></i> <span>Type</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="multiple.php">
            <i class="fa fa-image"></i> <span>Image for spots</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         
           <li>
          <a href="event_multiple.php">
            <i class="fa fa-image"></i> <span>Image for events</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

         <li>
          <a href="message.php">
            <i class="fa fa-envelope-o"></i> <span>Messages</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         
          <li>
          <a href="log_in/create_user.php">
           <i class="fa fa-user-plus"></i> <span>User</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        

         <li>
          <a href="signout.php">
            <i class="glyphicon glyphicon-log-out"> </i> <span>Log out</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
          <!-- Main row -->
       <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
       <!--        <h3 class="box-title">Cagayan Tourist Spot Records:</h3> -->

            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                   <div style=" height:auto;" > 
                     <div class="tab-pane fade in active" id="">
                       <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" style="width: 100%;">
                                        <li class="pull-right">
                                          <span><a href="#add_type" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Record</a></span>
                                        </li>
                                    </ul>
                                  </div>
                                 <div class="col-md-12">
                                        <h4>Tourist Spots Records:</h4>
                                        <div class="table-responsive">
                                        <div class="records_project" >

                                           <table id="spot_data"   class="table table-striped table-bordered "  style="overflow:hidden; width: 100%;" >

                                            <thead>
                                            <tr>
                                            <th>Type ID</th>
                                            <th>Type</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            </tr>
                                            </thead>
                                           <tbody>

                                            <?php
                                              include('config.php');
                                              $sql="select * from types";
                                              $query=mysqli_query($dbconnect,$sql);
                                              while($row=mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                  <td><?php echo $row['type_id']; ?></td>
                                                  <td><?php echo $row['type']; ?></td>
                                                 
                                                   <td>       
                                                      
                                                   <a href="#edit_Type<?php echo $row['type_id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                                   <?php include('edit/edit_type_button.php'); ?>
                                                  
                                                  
                  
                                                  </td>
                                                   <td>
                                                    <a href="#del<?php echo $row['type_id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                    <?php include('edit/edit_type_button.php')  ?>
                                                  </td>
                                                </tr>
                                                <?php
                                              }
                                       
                                            ?>
                                           </tbody>
                                         </table>
                                        </div>
                                          <?php include('add/add_type.php'); ?>
                                      </div>
                                </div>
                     </div>

                   </div> <!-- /.tables -->
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      

<!--scrip ng pagination at seacrh  -->

<script src="bootstrap-3.3.5-dist/jquery/jquery.min.js"></script>
<script src="bootstrap-3.3.5-dist/datatables/js/jquery.dataTables.min.js"></script>
<script src="bootstrap-3.3.5-dist/datatables-responsive/dataTables.responsive.js"></script>
          
<!-- para sa pagination sa baba -->
              <link href="bootstrap-3.3.5-dist/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
              <!-- <link href="bootstrap-3.3.5-dist/dist/css/sb-admin-2.css" rel="stylesheet"> -->
              <link href="bootstrap-3.3.5-dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
              <script src="bootstrap-3.3.5-dist/datatables-plugins/dataTables.bootstrap.min.js"></script>
              <!-- // end pagination -->
            
 <script type="text/javascript">
  $('#spot_data').dataTable({
          "aProcessing": true,
          "aServerSide": true
        });
  
</script>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <center><strong>Copyright &copy; 2017-2018</strong><br>  Bachelor of Science in Computer Science All rights
    reserved.</center>
  </footer>

      </div>
     
<!-- jQuery 3 for sign profile -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

</body>
</html>
