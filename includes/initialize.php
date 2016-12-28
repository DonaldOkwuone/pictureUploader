<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('HOST') ? null : define('HOST', $_SERVER['HTTP_HOST']);
 

defined('SITE_ROOT') ? null : define('SITE_ROOT', "" );

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.'');

defined('VIEWS') ? null : define('VIEWS', __DIR__ .DS.'..'.DS. 'public'. '/views');

defined('CACHE') ? null : define('CACHE', __DIR__ .DS.'..'.DS. 'public'. '/cache');

defined('A_CACHE') ? null : define('A_CACHE', __DIR__ .DS.'..'.DS. 'public'.DS.'admin'.'/cache');
defined('A_VIEWS') ? null : define('A_VIEWS', __DIR__ .DS.'..'.DS. 'public'.DS.'admin'. '/views');
 
// load config file first
require_once(LIB_PATH.DS.'config.php');


// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'MYSQLDatabase.php');
//require_once(LIB_PATH.DS.'PDOClass.php');
require_once(LIB_PATH.DS.'DatabaseObject.php');
require_once(LIB_PATH.DS.'Session.php');
require_once(LIB_PATH.DS.'Logger.php');  

//load database-related classes
require_once(LIB_PATH.DS.'User.php');
require_once(LIB_PATH.DS.'Photograph.php');
require_once(LIB_PATH.DS.'Comment.php'); 
//When I named this class file Post.php it didnt work 
//till i changed it to Posts.php
require_once(LIB_PATH.DS.'Posts.php'); 
require_once(LIB_PATH.DS.'Category.php');  

require_once(LIB_PATH.DS.'Pagination.php');
require_once(LIB_PATH.DS.'Url.php');
require_once(LIB_PATH.DS.'Message.php');

require_once(__DIR__ .DS.'../vendor/autoload.php'); 
//
?>