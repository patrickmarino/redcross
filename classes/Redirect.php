<?php

class Redirect {

	public function to($link) {
		header('Location: ' . $link);
	} 


}