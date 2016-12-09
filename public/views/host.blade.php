
$http = 'http://';
$host = $_SERVER['HTTP_HOST'].'/OOP_skoogland/';
$directory = 'public/stylesheets/';
//$local_link = $http.$host.$directory;
$local_link = $http.$host.$directory;

$comp_link = !empty($_SERVER['HTTP_HOST']) ? $local_link : $http.'$directory';
	 