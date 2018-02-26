<?php
   include_once 'includes/connect.php';
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="icon" href="img/red.png" type="image/gif" >
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Philippine Redcross QC Chapter</title>
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link type="text/css" rel="stylesheet" href="css/leaflet.css" />
      <!-- Page level plugin CSS-->
      <!-- <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
   </head>
   <body>
      <!-- Navigation-->
      <?php include_once 'common/nav.php'; ?>

      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Button trigger modal -->
            
            <br>
            <br>
            <form action="#" method="get" id="searchForm">
               <input type="text" class="txt-search" placeholder="Search . . .">
               <select class="search-type">
                  <option data-type="location">Location</option>
                  <option data-type="volunteer">Volunteer</option>
               </select>
            </form>
            <!-- Map -->

            <div id="map" ></div>
         </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <?php include_once 'common/footer.php'; ?>
      
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
      </a>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/chart.js/Chart.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
       <script src="js/pouchdb-1.1.0.js"></script>
       <script src="js/leaflet-src.js"></script>
       <script src="js/map.js"></script>
 

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      
      
      <?php include_once 'common/je-scripts.php'; ?>

   </body>
   </html>