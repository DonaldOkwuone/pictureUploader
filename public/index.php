<?php
error_reporting(E_ALL);
/*
*Index page controller
*
*/
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

use Philo\Blade\Blade;

include("../includes/initialize.php");


//1. the current page number ($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

//2. records per page ($per_page)
$per_page = 3;

//3. Total record count ($total_count) a single number
$total_count = Post::countAll();


//Find all photos 
//Use pagination instead 

$pagination = new Pagination($page, $per_page, $total_count);

//Instead of finding all records, just find the records
//for this page 
$posts = $pagination->paginate('posts');
$post = Post::findById(2);
$number_of_comments = count($post->comments()) ;

 
$most_read = Post::getMostRead();

$blade = new Blade(VIEWS, CACHE);

//echo Url::asset('css');
//echo Url::makeLink('e','e');
 
 echo $blade->view('')->make('index', [
		'page'=> $page, 
		'per_page' => $per_page,
		'total_count' => $total_count,
		'posts' => $posts,
		'post' => $post,
		'pagination' => $pagination,
		'connection' => $connection,
		'most_read' => $most_read,
		'number_of_comments' => $number_of_comments,
		] )->render();

 
 ?>