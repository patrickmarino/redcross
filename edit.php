<?php
  if (isset($_POST['view'])) 
  {
    $volunteer_id=$_GET['volunteer_id'];
     

      if(mysqli_query($conn,"INSERT INTO volunteers(volunteer_type,last_name,first_name,middle_name,blood_type,profession,age,contact_number,birthdate,street,barangay,district_id,city) 
       VALUES('$volunteer_type','$first_name','$last_name','$middle_name','$blood_type','$profession','$age','$contact','$birthdate','$street','$barangay','$district_id','$city');"))
      {
      echo "inserted";
      echo "<meta http-equiv='refresh' content='0'>";
    }
    else
    {
      echo "failed to insert";
    }
  }