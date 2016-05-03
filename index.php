<?php
session_start();

include 'utils.php';
include "config/config.php";
include 'vendor/autoload.php';
require('bootstrap.php');

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
$collector = new RouteCollector();

//***********************************
// html render
//***********************************
$collector->get('/', function(){
	include('html/tuanBD/theme.php');
});

$collector->get('/upload', function(){
	readfile('html/keo/upload.html');
});

$collector->get('/signup', function(){
	//readfile('html/keo/signup.html');
	include('html/keo/signup.php');
});

$collector->get('/catalog/{catalog}', function($catalog){
	//Asume
	$catalog = "top-download";
	//readfile('html/quang/catalog.html');
	include('html/quang/catalog.php');
});

$collector->get('/catalog/{catalog}/{slideid}', function($catalog, $slideid){
	//Asume
	$catalog = "top-download";
	$slideid = 1;
	include('html/tri/index.php');
});

$collector->get('/admin', function(){
	//readfile('html/keo/signup.html');
	include('html/quang/admin.php');
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
	readfile("./resources/slideupload/slide".$slideId."/slide".$id.".png");
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
		$slide = $slideDB->getSlide($slideId);
		$file = "./resources/slideupload/slide".$slide['slideid']."/".$slide['filename'];
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
		global $DBManager;
		$slideDB = $DBManager->getTable("slide");
		$result = $slideDB->uploadSlide($userId, $topicId, $title, $description, $fileName);
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

$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));   // Home Page
?>
