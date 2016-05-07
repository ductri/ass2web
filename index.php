<?php
session_start();

include 'utils.php';
#echo "2";
include "config/config.php";
#echo "3";
include 'vendor/autoload.php';
#echo "4";
require('bootstrap.php');

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
$collector = new RouteCollector();
#echo "1";
//***********************************
// html render
//***********************************
$collector->get('/', function(){
	#echo "2";
	include('html/tuanBD/theme.php');
});
#echo "3";
$collector->get('/upload', function(){
	//readfile('html/keo/upload.html');
	include('html/keo/upload.php');
});

$collector->get('/signup', function(){
	//readfile('html/keo/signup.html');
	include('html/keo/signup.php');
});

$collector->get('/catalog/{catalogId}', function($catalogId){
	//Asume
	$catalog = "top-download";
	echo "<script>";
	echo "topicId=".$catalogId.";";
	echo "</script>";

	include('html/quang/catalog.php');
});

$collector->get('/catalog/{catalogId}/{slideid}', function($catalogId, $slideid){
	//Asume
	echo "<script>";
	echo "slideid=".$slideid.";";
	echo "topicid=".$catalogId.";";
	echo "</script>";
	include('html/tri/index.php');
});

$collector->get('/search', function(){
	echo "<script>";
	echo 'keyword="'.$_GET['keyword'].'";';
	echo "</script>";
	include('html/quang/catalog_search.php');

});

$collector->get('/admin', function(){
	//readfile('html/keo/signup.html');
	include('html/quang/admin.php');
});
$collector->get('/admin/topics', function(){
	//readfile('html/keo/signup.html');
	include('html/quang/admin.php');
});
$collector->get('/admin/users', function(){
	//readfile('html/keo/signup.html');
	include('html/quang/admin_user.php');
});
$collector->get('/admin/slides', function(){
	//readfile('html/keo/signup.html');
	include('html/quang/admin_slide.php');
});
$collector->get('/userinfo/{userId}', function($userId) {
	//readfile('html/keo/signup.html');
	include('html\tuanBD\userprofile.php');
});
//***********************************
// html render
//***********************************
$DBManager = new DBManager();
//////////////////
//TOPIC
//////////////////
$collector->post('/topic/add', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$response = $topicDB->addTopic($_POST["name"]);
	echo json_encode($response);
});

$collector->get('/topic/get', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$response = $topicDB->getTopics();
	echo json_encode($response);
});

$collector->post('/topic/edit', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$response = $topicDB->editTopic($_POST['topicid'], $_POST['newName']);
	echo json_encode($response);
});

//Khong xoa duoc nhan topic dang duoc ref
$collector->post('/topic/delete', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$response = $topicDB->deleteTopic($_POST['topicid']);
	echo json_encode($response);
});

//////////////////
// USER
//////////////////
$collector->post('/login', function(){
	$response = array();

	if (Utils::checkLogin() === "") {
		global $DBManager;
		$userDB = $DBManager->getTable("user");
		$response["data"] = $userDB->login($_POST['username'], $_POST['password']);
		if ($response["data"] !== null) {
			$response["code"] = 0;
			$response["msg"] = "Login success";
			$_SESSION["username"] = $response["data"]["username"];
			$_SESSION["type"] = $response["data"]["userright"];
			$_SESSION["userid"] = $response["data"]["userid"];
		} else {
			$response["code"] = 3;
			$response["msg"] = "Login fail";
			$response["data"] = [];
		}
		echo json_encode($response);
	} else {
		# Already logged in
		session_start();
		session_unset();
		session_destroy();
		$response["code"] = 2;
		$response["msg"] = "Already login";
		$response["data"] = [];
		echo json_encode($response);
	}
});

$collector->get('/logout', function() {
	$response = array();
	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		header("Location: /");
		$response["code"] = 0;
		$response["msg"] = "Logout success";
		$response["data"] = [];
	}
	session_destroy();
	echo json_encode($response);
});

$collector->get('/user/{userId}/avatar', function($userId) {
	global $DBManager;
	$userDB = $DBManager->getTable("user");
	$user = $userDB->getInfo($userId);
	if ($user !== null) {
		readfile("./resources/useravatar/".$user["avatar"]);
	}
});

$collector->get('/user/getinfo/{userId}', function($userId) {
	$response = array();
	
	global $DBManager;
	$userDB = $DBManager->getTable("user");
	$response["code"] = 0;

	$response["msg"] = "get success";

	$response["data"] = $userDB->getInfo($userId);;
	echo json_encode($response);
});

$collector->post('/user/register', function() {
	$response = array();
	if (Utils::checkLogin() === "") {
		$userName = $_POST["username"];
		$firstName = $_POST["firstname"];
		$lastName = $_POST["lastname"];
		$email = $_POST["email"];
		$password = utils::encrypt($_POST["password"]);
		
			// $temporary = explode(".", $_FILES["avatar"]["name"]);
			// $file_extension = end($temporary);
			// //echo utils::console_log($_FILES["avatar"]);
			// $avatarFileName = move_uploaded_file($_FILES["avatar"]["tmp_name"], UPLOAD_DIR_AVATAR.$userName.".".$file_extension);
		global $DBManager;
		$userDB = $DBManager->getTable("user");
		$result = $userDB->register($userName, $firstName, $lastName, 
			$email, $password, "default.png");
		if ($result === "success") {
			$response["code"] = 0;
			$response["msg"] = "Register success";
			$response["data"] = [];
		} else if ($result === "username_exist") {
			$response["code"] = 3;
			$response["msg"] = "Register fail: Username has existed!";
			$response["data"] = [];
		} else if ($result === "email_exist") {
			$response["code"] = 3;
			$response["msg"] = "Register fail: Email has existed!";
			$response["data"] = [];
		} else {
			$response["code"] = 3;
			$response["msg"] = "Register fail: Database has error, please report to admin: admin@cse.hcmut.edu";
			$response["data"] = [];
		}
		
	} else {
		$response["code"] = 2;
		$response["msg"] = "Already logged in";
		$response["data"] = [];
	}
	echo json_encode($response);
});

$collector->get('/user/resetpassword/{email}', function($email) {
	$response = array();

	if (Utils::checkLogin() === "") {
		global $DBManager;
		$userDB = $DBManager->getTable("user");
		$result = $userDB->resetPassword($email);
		if ($result === "success") {
			$response["code"] = 0;
			$response["msg"] = "Reset successfully. New password has sent to your email.";
			$response["data"] = [];
		} else if ($result === "fail") {
			$response["code"] = 5;
			$response["msg"] = "Database has error, please report to admin@cse.hcmut.edu.vn";
			$response["data"] = [];
		} else if ($result === "email_not_exist") {
			$response["code"] = 3;
			$response["msg"] = "Email has not registered!";
			$response["data"] = [];
		} else if ($result === "cannot_send_email") {
			$response["code"] = 4;
			$response["msg"] = "Can not send to your email!";
			$response["data"] = [];
		}
	} else {
		$response["code"] = 2;
		$response["msg"] = "Already logged in";
		$response["data"] = [];
	}
	echo json_encode($response);
});

$collector->post('/user/editinfo/{userId}', function($userId) {
	$response = array();

	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		if ($_SESSION["userid"] !== $userId) {
			$response["code"] = 3;
			$response["msg"] = "Can not edit info of another user";
			$response["data"] = [];
		} else {
			$firstName = $_POST["firstname"];
			$lastName = $_POST["lastname"];
			
			// if (isset($_FILES["avatar"])) {
			// 	$temporary = explode(".", $_FILES["avatar"]["name"]);
			// 	$file_extension = end($temporary);
			// 	$avatarFileName = $userId.".".$file_extension;
			// 	move_uploaded_file($_FILES["avatar"]["tmp_name"], UPLOAD_DIR_AVATAR.$avatarFileName);	
			// }
			global $DBManager;
			$userDB = $DBManager->getTable("user");
			$result = $userDB->updateInfo($userId, $firstName, $lastName);

			if ($result==="success") {
				$response["code"] = 0;
				$response["msg"] = "Update info successfully";
				$response["data"] = [];
			} else {
				$response["code"] = 4;
				$response["msg"] = "Update failure";
				$response["data"] = [];
			}
		}
	}
	echo json_encode($response);
});

$collector->post('/user/changepass/{userId}', function($userId) {
	$oldPass = $_POST["oldpass"];
	$newPass1 = $_POST["newpass1"];
	$newPass2 = $_POST["newpass2"];

	$response = array();
	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		if ($_SESSION["userid"] !== $userId) {
			$response["code"] = 3;
			$response["msg"] = "Can not change password of another user";
			$response["data"] = [];
		} else {
			
			global $DBManager;
			$userDB = $DBManager->getTable("user");
			$result = $userDB->changePass($userId, $oldPass, $newPass1, $newPass2);

			if ($result==="success") {
				$response["code"] = 0;
				$response["msg"] = "Change password successfully";
				$response["data"] = [];
			} else if ($result === "two_pass_not_same") {
				$response["code"] = 4;
				$response["msg"] = "New passwords are not the same";
				$response["data"] = [];
			} else if ($result === "wrong_pass") {
				$response["code"] = 5;
				$response["msg"] = "Password is wrong";
				$response["data"] = [];
			} else {
				$response["code"] = 6;
				$response["msg"] = "Change password failure";
				$response["data"] = [];
			}
		}
	}
	echo json_encode($response);
});

$collector->post('/user/changeavatar/{userId}', function($userId) {
	$response = array();

	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		if ($_SESSION["userid"] !== $userId) {
			$response["code"] = 3;
			$response["msg"] = "Can not edit info of another user";
			$response["data"] = [];
		} else {
			if (isset($_FILES["avatar"])) {
				$temporary = explode(".", $_FILES["avatar"]["name"]);
				$file_extension = end($temporary);
				$avatarFileName = $userId.".".$file_extension;
				move_uploaded_file($_FILES["avatar"]["tmp_name"], UPLOAD_DIR_AVATAR.$avatarFileName);	
			
				global $DBManager;
				$userDB = $DBManager->getTable("user");
				$result = $userDB->changeAvatar($userId, $avatarFileName);

				if ($result==="success") {
					$response["code"] = 0;
					$response["msg"] = "Update info successfully";
					$response["data"] = [];
				} else {
					$response["code"] = 4;
					$response["msg"] = "Update failure";
					$response["data"] = [];
				}
			}
		}
	}
	echo json_encode($response);
});

$collector->get('/user/{userId}/getslides', function($userId) {
	$response = array();

	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		global $DBManager;
		$userDB = $DBManager->getTable("user");
		$result = $userDB->getListSlide($userId);
		$response["code"] = 0;
		$response["msg"] = "Successfully";
		$response["data"] = $result;
	}
	
	echo json_encode($response);
});

//Admin
$collector->get('/user/getlist/{startIndex}/{length}', function($startIndex, $length) {
	$response = array();
	$checkLogin = Utils::checkAdminLogin();
	if ($checkLogin === "not_login") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else if ($checkLogin === "not_admin") {
		$response["code"] = 2;
		$response["msg"] = "You are not admin";
		$response["data"] = [];
	} else {
		global $DBManager;
		$userDB = $DBManager->getTable("user");
		$result = $userDB->getList($startIndex, $length);
		if ($result !== null) {
			$response["code"] = 0;
			$response["msg"] = "Get list successfully";
			$response["data"] = $result;
		} else {
			$response["code"] = 3;
			$response["msg"] = "Get list failure";
			$response["data"] = $result;
		}
	}
	echo json_encode($response);
});

$collector->get('/user/delete/{userId}', function($userId) {
	$response = array();
	$checkLogin = Utils::checkAdminLogin();
	if ($checkLogin === "not_login") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else if ($checkLogin === "not_admin") {
		$response["code"] = 2;
		$response["msg"] = "You are not admin";
		$response["data"] = [];
	} else {
		global $DBManager;
		$userDB = $DBManager->getTable("user");
		$result = $userDB->deleteUser($userId);
		if ($result === "success") {
			$response["code"] = 0;
			$response["msg"] = "Delete successfully";
			$response["data"] = [];
		} else if ($result === "not_exist") {
			$response["code"] = 3;
			$response["msg"] = "Userid not exist";
			$response["data"] = [];
		} else {
			$response["code"] = 4;
			$response["msg"] = "Delete failure";
			$response["data"] = [];
		}
	}
	echo json_encode($response);
});

//////////////////
//SLIDE
//////////////////
$collector->get('/slide/getlist/{topicId}', function($topicId){
	$response = array();

	$response["code"] = 0;
	$response["msg"] = "Success";
	global $DBManager;
	$slideDB = $DBManager->getTable("slide");
	$response["data"] = $slideDB->getSlidesInTopic($topicId);
	echo json_encode($response);
});

$collector->get('/slide/getinfo/{slideId}', function($slideId){
	$response = array();
	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		$response["code"] = 0;
		$response["msg"] = "Success";
		global $DBManager;
		$slideDB = $DBManager->getTable("slide");
		$response["data"] = $slideDB->getSlide($slideId);
	}
	echo json_encode($response);
});

$collector->get('/slide/getslide/{slideId}/{id}', function($slideId, $id){
	global $DBManager;
	$slideDB = $DBManager->getTable("slide");
	$slideInfo = $slideDB->getSlide($slideId);
	$temporary = explode(".", $slideInfo["filename"]);
	$fileName = $temporary[0];

	readfile(UPLOAD_DIR_SLIDE.$slideInfo["userid"]."/".$fileName."/Slide".$id.".png");
});

$collector->get('/slide/download/{slideId}', function($slideId) {
	$response = array();
	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		global $DBManager;
		$slideDB = $DBManager->getTable("slide");

		$slideDB->increaseNoDownload($slideId);

		$slide = $slideDB->getSlide($slideId);
		$file = UPLOAD_DIR_SLIDE.$slide['userid']."/".$slide['filename'];
		header("Content-disposition: attachment;filename=".$slide['filename']);
		header("Content-Length: " . filesize($file));
		header("Content-Type: application/octet-stream;");
		readfile($file);
	}
	echo json_encode($response);
});

$collector->post('/slide/upload/', function() {
	$response = array();
	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		$userId = $_POST["userid"];
		$topicId = $_POST["topicid"];
		$title = $_POST["title"];
		$description = $_POST["description"];

		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		$dir = UPLOAD_DIR_SLIDE.$userId;
		if (!is_dir($dir)) {
			mkdir($dir, 0777);
		}
		
		$fileName = Utils::getUniqueName().".".$file_extension;
		$slideURL = UPLOAD_DIR_SLIDE."/".$userId."/".$fileName;

		move_uploaded_file($_FILES["file"]["tmp_name"], $slideURL);
		$noSlide = Utils::parseSlide($userId, $fileName);

		global $DBManager;
		$slideDB = $DBManager->getTable("slide");
		$result = $slideDB->uploadSlide($userId, $topicId, $title, $description, $fileName, $noSlide);
		if ($result === true) {
			$response["code"] = 0;
			$response["msg"] = "Upload successfully";
			$response["data"] = [];
		} else {
			$response["code"] = 3;
			$response["msg"] = "Upload failure";
			$response["data"] = [];
		}
		
	}
	echo json_encode($response);
});

$collector->get('/slide/test', function() {
	Utils::parseSlide(UPLOAD_DIR_SLIDE."/14/", "3238.pptx");
});

$collector->get('/slide/search/{keyword}', function($keyword) {
	$response = array();

	$response["code"] = 0;
	$response["msg"] = "Success";
	global $DBManager;
	$slideDB = $DBManager->getTable("slide");
	$response["data"] = $slideDB->searchSlide($keyword);
	echo json_encode($response);
});

$collector->get('/slide/delete/{slideId}', function($slideId){
	$response = array();

	$response["code"] = 0;
	$response["msg"] = "Success";
	global $DBManager;
	$response = array();
	$checkLogin = Utils::checkAdminLogin();
	if ($checkLogin === "not_login") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else if ($checkLogin === "not_admin") {
		$userDB = $DBManager->getTable("user");
		$result = $userDB->deleteSlide($_SESSION["userid"], $slideId);
		if ($result === "success") {
			$response["code"] = 0;
			$response["msg"] = "Success";
			$response["data"] = [];	
		} else {
			$response["code"] = 2;
			$response["msg"] = "Failure";
			$response["data"] = [];	
		}
		
	} else {
		$slideDB = $DBManager->getTable("slide");
		$result = $slideDB->deleteSlide($slideId);
		if ($result === "success") {
			$response["code"] = 0;
			$response["msg"] = "Success";
			$response["data"] = [];	
		} else {
			$response["code"] = 2;
			$response["msg"] = "Failure";
			$response["data"] = [];	
		}
	}
	echo json_encode($response);
});

$collector->get('/slide/topdownload/{count}', function($count){
	$response = array();

	$response["code"] = 0;
	$response["msg"] = "Success";
	global $DBManager;
	$slideDB = $DBManager->getTable("slide");
	$response["data"] = $slideDB->getTopDownload($count);
	echo json_encode($response);
});
//////////////////
//COMMENT
//////////////////
$collector->get('/comment/getlist/{slideId}/{startIndex}/{length}', function($slideId, $startIndex, $lenght){
	$response = array();

	
	$response["code"] = 0;
	$response["msg"] = "Success";
	global $DBManager;
	$commentDB = $DBManager->getTable("comment");
	$response["data"] = $commentDB->getListComment($slideId, $startIndex, $lenght);
	//$encodedArray = array_map(utf8_encode, $response["data"]);
	echo json_encode($response);
	
});

$collector->post('/comment/add', function(){
	$response = array();

	if (Utils::checkLogin() === "") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else {
		global $DBManager;
		$commentDB = $DBManager->getTable("comment");

		$slideId = $_POST["slideid"];
		$userId = $_POST["userid"];
		$content = $_POST["content"];
		$result = $commentDB->add($slideId, $userId, $content);
		$response["data"] = [];
		if ($result === true) {
			$response["code"] = 0;
			$response["msg"] = "Add comment success";

		} else {
			$response["code"] = 2;
			$response["msg"] = "Add comment fail";
		}
	}
	echo json_encode($response);
});

$collector->get('/comment/getall/{startIndex}/{length}', function($startIndex, $length){
	$response = array();

	$response["code"] = 0;
	$response["msg"] = "Success";
	global $DBManager;
	$response = array();
	$checkLogin = Utils::checkAdminLogin();
	if ($checkLogin === "not_login") {
		$response["code"] = 1;
		$response["msg"] = "Have not logged in";
		$response["data"] = [];
	} else if ($checkLogin === "not_admin") {
		$response["code"] = 3;
		$response["msg"] = "You are not admin";
		$response["data"] = [];
		
	} else {
		$slideDB = $DBManager->getTable("slide");
		$result = $slideDB->getAllSlide($startIndex, $length);
		$response["msg"] = "Success";
		$response["data"] = $result;	
	}
	echo json_encode($response);
});

$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));   // Home Page
?>
