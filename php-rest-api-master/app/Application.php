<?php

require 'classes/DB.php';

require 'classes/Rest.php';

class Application extends Rest {

	public function index() {

		return $this->error('Invalid URL');

	}

	public function register($id) {

		$httpRequestData = $this->request();

		//Set Validation Rules
		$rules = array('name' => 'required');

		//Validate Data
		$this->validate($httpRequestData, $rules);

		//Insert data into db
		$addUser = DB::table('users')->insert($httpRequestData);

		//return  response

		return ($addUser) ? $this->success( /* User added successfully */) : $this->error( /* Something went wrong */);

	}
}