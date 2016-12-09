<html>
  <head>
    <title>@yield('title') </title>
	<?php
	$http = 'http://';
	$host = $_SERVER['HTTP_HOST'].'/OOP_skoogland/';
	$directory = 'public/stylesheets/';
	//$local_link = $http.$host.$directory;
	$local_link = $http.$host.$directory;

	$comp_link = !empty($_SERVER['HTTP_HOST']) ? $local_link : $http.'$directory';
	?>
	
    <link href=<?php echo $local_link.'main.css'; ?> media="all" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="header">
      <h1>Photo Gallery</h1>
	   
    </div>
    <div id="main">@yield('content')</div>
    <div id="footer">Copyright {{ strftime('%Y', time())  }} , Donald Okwuone</div>
  </body>
</html>

{{ isset($connection) ? $connection->close() : 'false' }} 
