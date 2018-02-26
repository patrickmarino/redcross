<?php
require_once 'core/init.php';

$input = new Input();
$admin = new Admin();
$session = new Session();




if($input->get("login")) {
	$admin->login();
}
/*if(!$session->exists("username")) {
	Redirect::to("login.php");
}*/

?>