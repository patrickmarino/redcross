<?php  
 if(isset($_POST["volunteer_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "redcrossqc");  
      $query = "SELECT * FROM volunteers WHERE volunteer_id = '".$_POST["volunteer_id"]."'";  
      $result = mysqli_query($connect, $query);  
      if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}
      $output .= '  
      <div class="table-responsive table-sm">  
           <table class="table table-bordered">';  
       while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr class="table-danger"> 
                     <td width="30%"><label>Volunteer ID</label></td>  
                     <td width="70%">'.$row["volunteer_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Volunteer Type</label></td>  
                     <td width="70%">'.$row["volunteer_type"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Full Name</label></td>  
                     <td width="70%">'.$row["first_name"].' '.$row["middle_name"].' '.$row["last_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Blood Type</label></td>  
                     <td width="70%">'.$row["blood_type"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Profession</label></td>  
                     <td width="70%">'.$row["profession"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Age</label></td>  
                     <td width="70%">'.$row["age"].' years old</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Contact #</label></td>  
                     <td width="70%">'.$row["contact_number"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Birthdate</label></td>  
                     <td width="70%">'.$row["birthdate"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>MAAB</label></td>  
                     <td width="70%">'.$row["maab"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Location</label></td>  
                     <td width="70%">'.$row["street"].' st. '.$row["barangay"].' District '.$row["district_name"].', '.$row["city"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Status</label></td>  
                     <td width="70%">'.$row["status"].'</td>  
                </tr>  

                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
