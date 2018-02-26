<?php

require_once 'core/init.php';

$volunteers = new Volunteers();
$input = new Input();


if($input->get("requestId") == "postToVolunteer") {
	$volunteers->addUpdateVolunteers();
	// print_r($volunteers->addUpdateVolunteers());
}





?>