<?php


class Volunteers {

	private $_db = null;
	private $_input;
	private $_session = null;

	public function __construct() {

		$this->_db = DB::getInstance();
		$this->_input = new Input();
		$this->_session = new Session();

	}

	public function addUpdateVolunteers() {
		$volunteer_id = $this->_input->get('volunteer_id');
		$last_name = $this->_input->get('ln');
	    $first_name = $this->_input->get('fn');
	    $middle_name = $this->_input->get('mn');
	    $full_name  = $first_name . " " . $middle_name . " " . $last_name;
	    $volunteer_type = $this->_input->get("volunteer_type") != "" ? implode($this->_input->get("volunteer_type"), ",") : "";
	    $blood_type = $this->_input->get('bloodtype');
	    $profession = $this->_input->get('profession');
        $age = $this->_input->get('age');
		$contact = $this->_input->get('contact');
	    $birthdate = $this->_input->get('bday');
	    $maab = $this->_input->get('maab');
	    $street = $this->_input->get('street');
	    $barangay = $this->_input->get('barangay');
	    $district_name = $this->_input->get('district_name');
	    $city = $this->_input->get('ct'); 
	    $volunteer_id  = $this->_input->get('volunteer_id');
	    $latitude  =  $this->_input->get('latitude');
	    $longitude  =  $this->_input->get('longitude');
	    $status = $this->_input->get('status_option');


		if($volunteer_id != '') {
			$this->_db->query("UPDATE volunteers 
				SET volunteer_type = '$volunteer_type',
				last_name = '$last_name',
				first_name = '$first_name',
				middle_name = '$middle_name',
				full_name = '$full_name',
				blood_type = '$blood_type',
				profession = '$profession',
				age = '$age',
				contact_number = '$contact',
				birthdate = '$birthdate',
				maab = '$maab',
				street = '$street',
				barangay = '$barangay',
				district_name = '$district_name',
				city = '$city',
				latitude = '$latitude',
				longitude = '$longitude',
				status = '$status'
				WHERE volunteer_id = '$volunteer_id' ");

		} else {
			$this->_db->insert("volunteers", array(
		    	"last_name" => $last_name,
		    	"first_name" => $first_name,
		    	"middle_name" => $middle_name,
		    	"full_name" => $full_name,
		    	"volunteer_type" => $volunteer_type,
		    	"blood_type" => $blood_type,
		    	"profession" => $profession,
		    	"age" => $age,
		    	"contact_number" => $contact,
		    	"birthdate" => $birthdate,
		    	"maab" => $maab,
		    	"street" => $street,
		    	"barangay" => $barangay,
		    	"district_name" => $district_name,
		    	"city" => $city,
		    	"latitude" => $latitude,
		    	"longitude" => $longitude,
		    	"status" => $status
		    ));

		}
	    
	}

	public function getAllVolunteers() {

		$dataArray = array();
		$results = $this->_db->query("SELECT * FROM volunteers WHERE status = 'active' ")->results();
		$address;
		foreach($results as $result) {
		$address = $result->street . " " . $result->barangay . 
		" " . $result->district_name . " " . $result->city;		
		
		$dataArray[] = array(
			"id" => $result->volunteer_id,
			"full_name" => $result->full_name,
			"profession" => $result->profession,
			"age" => $result->age,
			"latitude" => $result->latitude,
			"longitude" => $result->longitude,
			"contact_number" => $result->contact_number,
			"blood_type" => $result->blood_type,
			"volunteer_type" => $result->volunteer_type,
			"address" => $address
		);

		}

		return $dataArray;

	}

	public function getVolunteer() {

		$name = $this->_input->get("name");
		$query = $this->_db->query("SELECT * FROM volunteers WHERE full_name LIKE '%$name%' ")->results();

		return $query;

	}


}
