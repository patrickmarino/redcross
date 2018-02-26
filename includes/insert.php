<?php
	include_once 'connect.php';
 	if (isset($_POST['submit'])) 
 	{
 		$volunteer_type=$_POST['voltype'];
	    $last_name=$_POST['ln'];
	    $first_name=$_POST['fn'];
	    $middle_name=$_POST['mn'];
	    $blood_type=$_POST['bloodtype'];
	    $profession=$_POST['profession'];
	    $age=$_POST['age'];
	    $contact=$_POST['contact'];
	    $birthdate=$_POST['bday'];
	    $street=$_POST['street'];
	    $barangay=$_POST['barangay'];
	    $district_id=$_POST['district'];
	    $city=$_POST['ct'];	

	    if($_POST['volunteer_id'] !='')
	    {

	
	    }
	    else
	    {
	    	 if(mysqli_query($conn,"INSERT INTO volunteers(volunteer_type,last_name,first_name,middle_name,blood_type,profession,age,contact_number,birthdate,street,barangay,district_id,city) 
     	 VALUES('$volunteer_type','$first_name','$last_name','$middle_name','$blood_type','$profession','$age','$contact','$birthdate','$street','$barangay','$district_id','$city');"))
    	{
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			exit;
		}
	}

	    } 

	   

?>


