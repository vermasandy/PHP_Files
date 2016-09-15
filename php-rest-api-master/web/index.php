<?php

class App {

	protected $class = "Application";

	protected $method = "index";

	protected $params = array();

	protected function parseUrl() {
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	public function __construct() {

		$url = $this->parseUrl();

		if (file_exists('../app/' . ucfirst($url[0]) . '.php')) {
			$this->class = $url[0];
			unset($url[0]);
		}

		require_once '../app/' . ucfirst($this->class) . '.php';

		$this->class = new $this->class;

		if (isset($url[1])) {
			if (method_exists($this->class, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = $url ? array_values($url) : array();

		call_user_func_array(array(
			$this->class,
			$this->method,
		), $this->params);
	}
}

new App;