 <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM types";
$results = $db_handle->runQuery($query);
?>
<!DOCTYPE html>
<html>
<head>
  <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
<script>
function getspot(val) {
  $.ajax({
  type: "POST",
  url: "getspot.php",
  data:'type_id='+val,
  success: function(data){
    $("#spot-list").html(data);
  }
  });
}

function selecttype(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

 <?php 
  include('../log_in/functions.php');

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

</style>
  <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="style.css"> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href=".//bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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
              <img src="../images/user.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs" style="margin-right: 15px"><strong><?php echo $_SESSION['user']['username']; ?></strong></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../images/user.jpeg" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION['user']['username']; ?>
                  <small> <?php echo $_SESSION['user']['email']; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div >
                  <a href="../signout.php" class="btn btn-default btn-flat" style="width:100%">Sign out</a>
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
          <img src="../images/user.jpeg" class="img-circle" alt="User Image">
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
          <a href="../admin.php">
            <i class="fa fa-th"></i> <span>Home</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
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
        <li>

                <a href="../multiple.php">
            <i class="fa fa-th"></i> <span> + Image for spots</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <li>
          <a href="event.php">
            <i class="fa fa-th"></i> <span>Events</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
           <li>
          <a href="event_multiple.php">
            <i class="fa fa-th"></i> <span>+ Image for events</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="type.php">
            <i class="fa fa-th"></i> <span>+ Type</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         
          <li>
          <a href="log_in/create_user.php">
            <i class="fa fa-th"></i> <span>+ User</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         
        
        <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Help</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       
       
        
         <li>
          <a href="../signout.php">
            <i class="fa fa-th"></i> <span>Log out</span>
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
    <section class="content-header">
      <h1>
        Cagayan Tourist Spot
      
      </h1>
  
    </section>
<center>
<body>
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
                          <div class="header1">Add More Story</div>

                             <form method="POST" action="../insert/add_story.php" enctype="multipart/form-data">

              <div class="row">
                    <div class="col-lg-6">
                       <label class="control-label" style="position:relative; top:7px;">Product:</label>
                   </div>
                <div class="col-lg-5">
                   <input type="text" name="product">
                </div>
              </div>
              
                 <div class="row">
                  <div style="height:10px;"></div>
               <div class="col-lg-6">
                            <label class="control-label" style="position:relative; top:7px;">Select Type:</label>
                   </div>
                        <div class="col-lg-6">
                           <select name="types" id="type-list" onChange="getspot(this.value);">
                            <option value="" style="height: 25pt; width: 100pt;">Select Type</option>
                            <?php
                           foreach($results as $type) {
                            ?>
                            <option value="<?php echo $type["type_id"]; ?>"><?php echo $type["type"]; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                      </div>
             </div>
              <div style="height:10px;"></div>
                  <div class="row">
                      <div class="col-lg-6">
                            <label class="control-label" style="position:relative; top:7px;">Spots:</label>
                        </div>
                  <div class="col-lg-6">
                          <select name="spots" id="spot-list">
                             <option value="" style="height:25pt; width: 100pt;">Select Spots</option>
                          </select>
                      </div>
              </div>
               <div style="height:10px;"></div>
                  

                       
                <div class="row">
                    <div class="col-lg-6">
                       <label class="control-label" style="position:relative; top:7px;">First Story:</label>
                   </div>
                <div class="col-lg-5">
                    <textarea class="form-control" name="first"></textarea>
                </div>
              </div>

              <div style="height:10px;"></div>
               <div class="row">
                <div class="col-lg-6">
                  <label class="control-label" style="position:relative; top:7px;">Second Story:</label>
                </div>
                <div class="col-lg-5">
                  <textarea class="form-control" name="second"></textarea>
                 
                </div>
              </div>

              <div style="height:10px;"></div>
            
               <div class="row">
                <div class="col-lg-6">
                  <label class="control-label" style="position:relative; top:7px;">Third Story:</label>
                </div>
                <div class="col-lg-5">
                  <textarea class="form-control" name="third"></textarea>
                 
                </div>
              </div>

              <div style="height:10px;"></div>
               <div class="row">
                <div class="col-lg-6">
                  <label class="control-label" style="position:relative; top:7px;">Last Story:</label>
                </div>
                <div class="col-lg-5">
                  <textarea class="form-control" name="last"></textarea>
                 
                </div>
              </div>
               
        <!-- <input name="submit" type="submit" /> -->
        <div style="height:10px;"></div>

               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                   
             
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
        </form>
       


          
<!-- para sa pagination sa baba -->
           


                        </div> <!-- /.tables -->
                       </div>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
               </div>
               <!-- ./box-body -->
             </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- script para sa map -->
</body>
</html>

