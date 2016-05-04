<?php
/**
 * Get url to route
 * @return array
 */
use Aspose\Slides\SlidesApi;
use Aspose\Slides\APIClient;
use Aspose\Storage\StorageApi;
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
		//return sha1($password);
		return $password;
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

	public static function getSlideNo($fileUrl) {
		

		$storageApi = new StorageApi();
		$slidesApi = new SlidesApi();
		$apiClient = new APIClient();

		$fileName = $fileUrl;
		$storage = "";
		$folder = "";
		
		try {
		    //upload file to aspose cloud storage
		    $result = $storageApi->PutCreate($fileName, "", $storage, getcwd() . '/src/Data/Input/' . $fileName);

		    //invoke Aspose.Slides Cloud SDK API
		    $response = $slidesApi->GetSlidesSlidesList($fileName,$storage, $folder);
		    print_r($response);
		    echo "<br>";

		    if ($response != null && $response->Status = "OK") {
		     echo "PowerPoint Slide Count ::" . count($response->Slides->SlideList) ;
		    }
		} catch (\Aspose\Words\ApiException $exp) {
		    echo "Exception:" . $exp->getMessage();
		}

	}

	public static function saveSlide($fileUrl, $destination) {
		
	}
}
 ?>