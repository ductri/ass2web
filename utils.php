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
		//return $password;
	}

	public static function checkLogin() {
		if (isset($_SESSION["username"])) {
			return $_SESSION["username"];
		} else {
			return "";
		}
	}

	public static function checkAdminLogin() {
		if (isset($_SESSION["username"])) {
			if ($_SESSION["type"] === "admin") {
				return "success";
			} else {
				return "not_admin";
			}
		} else {
			return "not_login";
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

	public static function parseSlide($userId, $fileName) {

	    $ppApp = new COM("PowerPoint.Application");
	    $ppApp->Visible = True;

	    //$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp

	    $ppName = $fileName;

	    $temporary = explode(".", $fileName);
		$fileNameWithoutEx = $temporary[0];

	    //*** Open Document ***/
	    $pres = $ppApp->Presentations->Open("C:\\xampp\htdocs\\resources\\slideupload\\".$userId."\\".$fileName);

	    //*** Save Document ***//
	    $ppApp->ActivePresentation->SaveAs("C:\\xampp\htdocs\\resources\\slideupload\\".$userId."\\".$fileNameWithoutEx, 18);  //'*** 18=PNG, 19=BMP **'
	    //$ppApp->ActivePresentation->SaveAs(realpath($FileName),17);
	    $count = (int)$pres->Slides->Count;
	    $ppApp->Quit;
	    $ppApp = null;
	    return $count;
	}

	public static function checkUsername($userName) {
		$nameErr = "";
		if (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
			$nameErr = "Only letters and white space allowed"; 
			return $nameErr;
		} else if (empty($userName)) {
			$nameErr = "Username must be not empty";
			return $nameErr;
		} else return "";
	}

	public static function checkEmail($email) {
		if (empty($email)) {
			return "Must be not empty";
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return "Invalid email format"; 
		} else return "";
	}

	public static function checkPassword($password) {
		if (strlen($password) < 6) {
			return "Password must have length atleast 6";
		} else  return "";
	}

	public static function checkFirstname($firstName) {
		if (empty($firstName)) {
			$nameErr = "First name must be not empty";
			return $nameErr;
		} else return "";
	}

	public static function checkLastname($lastName) {
		if (empty($lastName)) {
			$nameErr = "Last name must be not empty";
			return $nameErr;
		} else return "";
	}

	public static function checkStringNotEmpty($str) {
		if (empty($str)) {
			$nameErr = "This field must be not empty";
			return $nameErr;
		} else return "";
	}

	function is_image($path)
	{
	    $a = getimagesize($path);
	    $image_type = $a[2];
	     
	    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
	    {
	        return true;
	    }
	    return false;
	}
}
 ?>