<?php	
	require_once 'core/init.php';

	$db = DB::getInstance();
	$input = new Input();
	$volunteers = new Volunteers();


	if($input->get("requestId") == "getAllVolunteers") {
		print_r(json_encode($volunteers->getAllVolunteers()));

	} else if($input->get("requestId") == "getVolunteer") {
		print_r(json_encode($volunteers->getVolunteer()));
	}

?>