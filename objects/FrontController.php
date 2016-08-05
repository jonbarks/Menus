<?php
require_once 'interfaces/IFrontController.php';
require_once 'objects/IndexController.php';
require_once 'objects/AuthController.php';
require_once 'objects/FoodController.php';

class FrontController implements IFrontController
{
	const DEFAULT_CONTROLLER = "IndexController";
	const DEFAULT_ACTION     = "index";

	protected $controller    = self::DEFAULT_CONTROLLER;
	protected $action        = self::DEFAULT_ACTION;
	protected $params        = array();
	protected $basePath      = "base/";

	public function __construct(array $options = array()) {
		if (empty($options)) {
			$this->parseUri();
		}
		else {
			if (isset($options["controller"])) {
				$this->setController($options["controller"]);
			}
			if (isset($options["action"])) {
				$this->setAction($options["action"]);
			}
			if (isset($options["params"])) {
				$this->setParams($options["params"]);
			}
		}
	}

	protected function parseUri() {
		$path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
		if (strpos($path, $this->basePath) === 0) {
			$path = substr($path, strlen($this->basePath));
		}
		@list($controller, $action, $params) = explode("/", $path, 3);
		if (!empty($controller)) {
			$this->setController($controller);
		}
		if (!empty($action)) {
			$this->setAction($action);
		}
		if (!empty($params)) {
			$this->setParams(explode("/", $params));
		}
	}

	public function setController($controller) {
		$controller = ucfirst(strtolower($controller)) . "Controller";
		if (!class_exists($controller)) {
// 			$controller = self::DEFAULT_CONTROLLER;
// Setup the Error Controller?
			throw new InvalidArgumentException(
					"The action controller '$controller' has not been defined.");
		}
		$this->controller = $controller;
		return $this;
	}

	public function setAction($action) {
		$reflector = new ReflectionClass($this->controller);
		if (!$reflector->hasMethod($action)) {
// 			$action = self::DEFAULT_ACTION;
			throw new InvalidArgumentException(
					"The controller action '$action' has been not defined.");
		}
		$this->action = $action;
		return $this;
	}

	public function setParams(array $params) {
		$this->params = $params;
		return $this;
	}

	public function run() {
		call_user_func_array(array(new $this->controller, $this->action), $this->params);
	}
}