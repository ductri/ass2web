<?php
/**
 * Get url to route
 * @return array
 */

class Utils {

	private $EOL = "<br>";

	public static function parseUrl() {
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')) {
			$uri = substr($uri, 0, strpos($uri, '?'));
		}
		$base_url = '/' . trim($uri, '/');

		$re = array();
		$routes = explode('/', $base_url);

		foreach($routes as $route)
		{
			if(trim($route) != '')
				array_push($re, $route);
		}
		return $re;
	}

	/**
	 * Just for debugging
	 * @param type $data 
	 * @return type
	 */
	public static function console_log( $data ){
	  echo '<script>';
	  echo 'console.log('. json_encode( $data ) .')';
	  echo '</script>';
	}

	/**
	 * Description Encrypt password before save into db
	 * @param type $password 
	 * @return type
	 */
	public static function encrypt($password) {
		return sha1($password);
	}

	public static function checkLogin() {
		if (isset($_SESSION["username"])) {
			return $_SESSION["username"];
		} else {
			return "";
		}
	}

	public static function getUniqueName() {
		return rand();
	}
}
 ?>