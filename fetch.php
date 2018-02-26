<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "redcrossqc");  
 if(isset($_POST["volunteer_id"]))  
 {  
      $query = "SELECT * FROM volunteers WHERE volunteer_id = '".$_POST["volunteer_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>