<?php

require 'Validator.php';

class Rest {

	protected function validate(array $request, array $rules) {

		$is_valid = Validator::is_valid($request, $rules);

		if ($is_valid === true) {

			return true;

		}

		$this->errors = $is_valid;

		return $this->error('Validation Failed', $is_valid);

		die;

	}

	public function request() {

		if ($_SERVER['REQUEST_METHOD'] === "GET") {

			$request = (isset($_GET) && count($_GET)) ? $_GET : array();
			unset($request['url']);
			return $request;

		} elseif ($_SERVER['REQUEST_METHOD'] === "POST") {

			return (isset($_POST) && count($_POST)) ? $_POST : array();

		}

		return array();
	}
	/**
	 * Return Json response
	 * @param  array  $response Response array
	 * @return json
	 */
	public function response(array $response) {
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}

	/**
	 * if operation successfully performed
	 * @param  int $msg  Message t obe displayed
	 * @param  array  $data data to return with success message
	 * @return callback
	 */
	public function success($msg = "Success", array $data = array()) {
		return $this->response(array('code' => 200, 'success' => true, 'msg' => $msg, 'data' => $data));
	}

	/**
	 * If operation was'nt performed successfully
	 * @param  string $error Error Message
	 * @return callback
	 */
	public function error($error = "Something went Wrong", $messages = array()) {
		return $this->response(array('code' => 400, 'success' => false, 'error' => $error, 'messages' => $messages));
	}

	/**
	 * If operation was'nt performed successfully or required parameters was missing
	 * @param  string $request Error message
	 * @return callback
	 */
	public function badRequest($request = "") {
		return $this->response(array('code' => 400, 'success' => false, 'error' => ($request != "") ? $request : 'BAD_REQUEST'));
	}
}