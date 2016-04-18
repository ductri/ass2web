<?php
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
	readfile('html/tuanBD/theme.html');
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
	readfile('html/quang/catalog.html');
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
	$topic = $DBManager->getTable("topic");
	$topic->addTopic($_POST["name"]);
});

$collector->get('/topic/get', function(){
	global $DBManager;
	$topic = $DBManager->getTable("topic");
	$topic->getTopics();
});

$collector->post('/topic/edit', function(){
	global $DBManager;
	$topic = $DBManager->getTable("topic");
	$topic->editTopic($_POST['topicid'], $_POST['newName']);
});

//Khong xoa duoc nhan topic dang duoc ref
$collector->post('/topic/delete', function(){
	global $DBManager;
	$topic = $DBManager->getTable("topic");
	$topic->deleteTopic($_POST['topicid']);
});



$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));   // Home Page
?>