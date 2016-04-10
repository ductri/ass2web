<?php
include 'utils.php';
include "config/config.php";
include __DIR__ . './vendor/autoload.php';

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$collector = new RouteCollector();

$collector->get(ROOT . '/', function(){
	readfile('html/tuanBD/theme.html');
});

$collector->get(ROOT . '/catalog/{catalog}', function($catalog){
	//Asume
	$catalog = "top-download";
	readfile('html/quang/catalog.html');
	
	
});

$dispatcher =  new Dispatcher($collector->getData());
echo $dispatcher->dispatch('GET', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));   // Home Page

?>