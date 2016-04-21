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
	readfile('html/tri/index.html');
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
// LOGIN
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
		} else {
			$response["code"] = 3;
			$response["msg"] = "Login fail";
			$response["data"] = [];
		}
		echo json_encode($response);
	} else {
		# Already logged in
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
	
});
//////////////////
//SLIDE
//////////////////
$collector->get('/slide/getlist/{topicId}', function($topicId){
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
		$response["data"] = $slideDB->getSlidesInTopic($topicId);
	}
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

$collector->get('/slide/{slideId}/{id}', function($slideId, $id){
	readfile("./slideupload/slide".$slideId."/slide".$id.".png");
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
		$file = "./slideupload/slide".$slide['slideid']."/".$slide['filename'];
		header("Content-disposition: attachment;filename=".$slide['filename']);
		header("Content-Length: " . filesize($file));
		header("Content-Type: application/octet-stream;");
		readfile($file);
	}
});


$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));   // Home Page
?>