<?php

namespace vendor\core;

class Router
{
	// Route table
	// @var array
	protected static $routes = [];

	// Current route
	// @var array
	protected static $route = [];

	// Adding a route to the route table
	// @param string $regexp регулярное выражение маршрута
	// @param array $route маршрут ([controller, action, params])
	public static function add($regexp, $route = [])
	{
		self::$routes[$regexp] = $route;
	}
	
	/**
	 * eturns the route table
	 *
	 * @return array
	 */
	public static function getRoutes()
	{
		return self::$routes;
	}
		
	/**
	 * Returns the current route (controller, action, [params])
	 *
	 * @return array
	 */
	public static function getRoute()
	{
		return self::$route;
	}

	// Search for a URL in the route table
	// @param string $url входящий URL
	// @return boolean
	public static function matchRoute($url)
	{
		foreach (self::$routes as $pattern => $route) {
			if (preg_match("#$pattern#i", $url, $matches)) {
				foreach ($matches as $key => $value) {
					if (is_string($key)) {
						$route[$key] = $value;
					}
				}
				if (!isset($route['action'])) {
					$route['action'] = 'index';
				}
				$route['controller'] = self::upperCamelCase($route['controller']);
				self::$route = $route;
				return true;
			}
		}
		return false;
	}

	/**
	 * dispatch Redirect URL to the correct route
	 *
	 * @param  string $url input URL
	 * @return void
	 */
	public static function dispatch($url)
	{
		$url = self::removeQueryString($url);
		// var_dump($url);
		if (self::matchRoute($url)) {
			// $controller = self::$route['controller'];
			// self::upperCamelCase($controller);
			$controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
			// debug(self::$route);
			if (class_exists($controller)) {
				$cObj = new $controller(self::$route);
				$action = self::lowerCamelCase(self::$route['action']) . 'Action';
				// debug($action);
				if (method_exists($cObj, $action)) {
					$cObj->$action();
					$cObj->getView();
				} else {
					echo "Method <b>$controller::$action</b> not found";
				}
			} else {
				echo "Controller <b>$controller</b> not found";
			}
		} else {
			http_response_code(404);
			include '404.html';
		}
	}

	protected static function upperCamelCase($name)
	{
		// $name = str_replace('-',' ', $name);
		// $name = ucwords($name);
		// $name = str_replace(' ','', $name);
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
	}

	protected static function lowerCamelCase($name)
	{
		return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $name))));
	}

	protected static function removeQueryString($url)
	{
		if ($url) {
			$params = explode('&', $url, 2);
			if (false === strpos($params[0], '=')) {
				return rtrim($params[0], '/');
			} else {
				return '';
			}
		}
		debug($url);
		return $url;
	}
}
