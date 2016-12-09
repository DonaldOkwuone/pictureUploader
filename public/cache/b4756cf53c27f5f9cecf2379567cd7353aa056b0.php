<html>
  <head>
    <title><?php echo $__env->yieldContent('title'); ?> </title>
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
    <div id="main"><?php echo $__env->yieldContent('content'); ?></div>
    <div id="footer">Copyright <?php echo e(strftime('%Y', time())); ?> , Donald Okwuone</div>
  </body>
</html>

<?php echo e(isset($connection) ? $connection->close() : 'false'); ?> 
