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
/*form{
  width: 60%;
  margin: 0px auto;
  padding: 20px;
  border: 2px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
  height: auto;
}*/
    /* Remove the navbar's default margin-bottom and rounded borders */ 
 .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
   
        #map {
  width:570px;
  height:480px;
}
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
     #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
        z-index: 1050 !important;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
        #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 120px;
    height: 80px;
   }

</style>
  <!-- Tell the browser to be responsive to screen width -->
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
          <li>
          <a href="../event.php">
            <i class="glyphicon glyphicon-calendar"></i> <span>Events</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href="../type.php">
            <i class="fa fa-list"></i> <span>Type</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="../multiple.php">
            <i class="fa fa-image"></i> <span>Image for spots</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         
           <li>
          <a href="../event_multiple.php">
            <i class="fa fa-image"></i> <span>Image for events</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

         <li>
          <a href="#">
            <i class="fa fa-envelope-o"></i> <span>Messages</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         
          <li>
          <a href="../log_in/create_user.php">
           <i class="fa fa-user-plus"></i> <span>User</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
         <li>
          <a href="../signout.php">
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
<?php
  include('config.php');
  $id = $_GET['y'];
  $sql = "select * from spots where spot_id=".$id;
  $result = mysqli_query($dbconnect,$sql);

  echo "<form method='POST' action='../update/update_spot.php' enctype='multipart/form-data'>";
  while ($row = mysqli_fetch_array($result))
  {
            echo "<div class='row'>";
            echo "<div class='col-lg-7'>";
            echo "<input class='form-control' type='hidden' name='sid' value='".$row['spot_id']."'><br>";
            echo "</div>";
            echo "</div>";


            echo "<div class='row'>";
            echo " <div class='col-lg-3'>";
            echo "<label class='control-label' style='position:relative; top:7px;'>Tourist Spot:</label>";
            echo "</div>";
            echo "<div class='col-lg-7'>";
            echo "<input class='form-control' type='text' name='spot' value='".$row['spot']."'><br>";
            echo "</div>";
            echo "</div>";


            echo "<div class='row'>";
            echo " <div class='col-lg-3'>";
            echo "<label class='control-label' style='position:relative; top:7px;'>Description:</label>";
            echo "</div>";
            echo "<div class='col-lg-7'>";
            echo "<textarea class='form-control' type='text' name='des' >".$row['des']."</textarea><br>";
            echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo " <div class='col-lg-3'>";
            echo "<label class='control-label' style='position:relative; top:7px;'>Type:</label>";
            echo "</div>";
            echo "<div class='col-lg-7'>";
              echo "<select   class='form-control'   name='types'  placeholder='Type'>";
              echo "option  value='".$row['type_id']."'>".$row['type']."</option>";
                          include ('config.php');
                        $sql="SELECT * from types";
                        $q=mysqli_query($dbconnect,$sql);
                        while ($row=mysqli_fetch_assoc($q)) {
                            echo"<option value='".$row['type_id']."'>".$row['type']."</option>";
                              }
              echo "</select> <br>";
              echo "</div>";
                 echo "</div>";
                  echo "<div class='row'>";
                   echo " <div class='col-lg-3'>";
                      echo "<label class='control-label' style='position:relative; top:7px;'>Image:</label>";
                      echo "</div>";
                      echo "<div class='col-lg-7'>";
                     echo "<input type='file' class='form-control' name='image' id='image' value='".$row['image']." ''<br>";
                     echo "</div>";
                 echo "</div>";
    
    echo" <input type='hidden' name='lat' id='lat' value='".$row['lat']."'>";
    echo "<input type='hidden' name='lng' id='lng' value='".$row['lng']."'>";
    echo "<input type='hidden' name='location' id='location' value='".$row['location']."'>";
    echo "<input id='pac-input' class='controls' type='text' value='".$row['location']."'>";
    echo "<div id='type-selector' class='controls'>";
    echo "<input type='radio' name='type' id='changetype-all' checked='checked'>";
      echo "<label for='changetype-all'>All</label>";
               echo "</div>" ;
          echo  "<div id='map' style='height: 400px;width: 600px'></div>";
          echo "<div>"; 
          echo "<a href='../admin.php' class='btn btn-default'>Cancel</a>&nbsp &nbsp"; 
      echo "<input type='submit' class='btn btn-success' value='save'<br>"; 
       echo "</div>";       
  }
  echo "</form>";
?>
<script src="../bootstrap-3.3.5-dist/jquery/jquery.min.js"></script>
<script src="../bootstrap-3.3.5-dist/datatables/js/jquery.dataTables.min.js"></script>
<script src="../bootstrap-3.3.5-dist/datatables-responsive/dataTables.responsive.js"></script>
          
<!-- para sa pagination sa baba -->
              <link href="../bootstrap-3.3.5-dist/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
              <!-- <link href="bootstrap-3.3.5-dist/dist/css/sb-admin-2.css" rel="stylesheet"> -->
              <link href="../bootstrap-3.3.5-dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
              <script src="../bootstrap-3.3.5-dist/datatables-plugins/dataTables.bootstrap.min.js"></script>
              <!-- // end pagination -->
            
 <script type="text/javascript">
  $('#spot_data').dataTable({
          "aProcessing": true,
          "aServerSide": true
        });
  
</script>



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
 <script>
          // This example requires the Places library. Include the libraries=places
          // parameter when you first load the API. For example:
          // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 17.6132, lng: 121.7270},
              zoom: 8
            });
            var input = /** @type {!HTMLInputElement} */(
                document.getElementById('pac-input'));

            var types = document.getElementById('type-selector');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
              map: map,
              anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
              infowindow.close();
              marker.setVisible(false);
              var place = autocomplete.getPlace();
              if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
              }

              // If the place has a geometry, then present it on a map.
              if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
              } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
              }));
              marker.setPosition(place.geometry.location);
              marker.setVisible(true);
    var item_Lat =place.geometry.location.lat();
    var item_Lng= place.geometry.location.lng();
    var item_Location = place.formatted_address;
    //alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
    $("#lat").val(item_Lat);
    $("#lng").val(item_Lng);
    $("#location").val(item_Location);



              var address = '';
              if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
              }

              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
              infowindow.open(map1, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
              var radioButton = document.getElementById(id);
              radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
              });
            }

            setupClickListener('changetype-all', []);
            setupClickListener('changetype-address', ['address']);
            setupClickListener('changetype-establishment', ['establishment']);
            setupClickListener('changetype-geocode', ['geocode']);
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOS5lkVzX7NUr7peU05g6DLlzixjulJq4&libraries=places&callback=initMap"
            async defer></script>


</body>
</html>

