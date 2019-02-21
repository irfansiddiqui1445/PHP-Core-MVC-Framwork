<?php
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE); 
ini_set('display_errors', TRUE);
ini_set('log_errors', TRUE);
ini_set('error_log', 'app/errors.log');
ini_set('log_errors_max_len', 1024);
error_reporting(0);


date_default_timezone_set("Asia/Karachi");

$GLOBALS['host'] = "localhost";
$GLOBALS['appname'] = "Online Education System";
$GLOBALS['defaultpath'] = "http://localhost/app";


session_save_path('app/session/active_sessions');
session_set_cookie_params(0,'/',$GLOBALS['host'],false,true);
session_start();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = explode('/',$url);
$url = array_slice($url,2);


require_once('app/Route.php');
new Route($url);






?>