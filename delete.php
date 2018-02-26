<?php  
 $connect = mysqli_connect("localhost", "root", "", "redcrossqc");  
 $sql = "DELETE FROM volunteers WHERE volunteer_id = '".$_POST["volunteer_id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
      echo "<meta http-equiv='refresh' content='0'>";
 }  
 
 ?>