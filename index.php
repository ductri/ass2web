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
	readfile('html/keo/signup.html');
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

//TOPIC
$collector->post('/topic/add', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$respone = $topicDB->addTopic($_POST["name"]);
	echo $response;
});

$collector->get('/topic/get', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$respone = $topicDB->getTopics();
	echo $response;
});

$collector->post('/topic/edit', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$respone = $topicDB->editTopic($_POST['topicid'], $_POST['newName']);
	echo $response;
});

//Khong xoa duoc nhan topic dang duoc ref
$collector->post('/topic/delete', function(){
	global $DBManager;
	$topicDB = $DBManager->getTable("topic");
	$respone = $topicDB->deleteTopic($_POST['topicid']);
	echo $response;
});

// LOGIN
$collector->post('/login', function(){
	global $DBManager;
	$userDB = $DBManager->getTable("user");
	$respone = $userDB->login($_POST['username'], $_POST['password']);
	if ($respone["result"] !== "fail") 
		$_SESSION["username"] = $respone["result"]["username"];
	echo json_encode($respone);
});	

$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));   // Home Page
?>