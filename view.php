<?php
  include_once 'includes/connect.php';
  if (isset($_GET['view'])) 
  {
    $volunteer_id=$_GET['volunteer_id'];
     

      $query = mysqli_query($conn,"SELECT * FROM volunteers WHERE volunteer_id = ['$volunteer_id'];");
      
      echo "DASDASDA";
      
  }