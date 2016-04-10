<?php
include 'utils.php';
// include "config/config.php";
// include __DIR__ . './vendor/autoload.php';
echo 'abc';
console_log('abc');
// use Phroute\Phroute\RouteCollector;
// use Phroute\Phroute\Dispatcher;

// $collector = new RouteCollector();
// console_log($collector);
// $collector->get('/', function(){
// 	readfile('html/tuanBD/theme.html');
// });

// $collector->get('/catalog/{catalog}', function($catalog){
// 	//Asume
// 	$catalog = "top-download";
// 	readfile('html/quang/catalog.html');
// });

// $collector->get('/catalog/{catalog}/{slideid}', function($catalog, $slideid){
// 	//Asume
// 	$catalog = "top-download";
// 	$slideid = 1;
// 	readfile('html/tri/index.html');
// });
// $dispatcher =  new Dispatcher($collector->getData());

// echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));   // Home Page

?>