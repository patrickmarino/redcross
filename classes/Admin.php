<?php

class Admin {
	
	private $_db = null;
	private $_input;
	private $_session = null;

	public function __construct() {

		$this->_db = DB::getInstance();
		$this->_input = new Input();
		$this->_session = new Session();

	}

	public function login() {

		$username = $this->_input->get("username");
		$password = $this->_input->get("password");

		$query = $this->_db->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password' ")->results();

		if(!empty($query)) {
			$this->_session->put("username", $username);
			Redirect::to("index.php");
		} else {
			echo "<script>alert('Please try again!');</script>";
		}


	}

	public function logout() {
		$this->_session->delete("username");
		Redirect::to("login.php");
	}


}