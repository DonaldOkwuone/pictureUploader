<?php
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

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

include("../includes/initialize.php");


//1. the current page number ($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

//2. records per page ($per_page)
$per_page = 3;

//3. Total record count ($total_count) a single number
$total_count = Photograph::countAll();


//Find all photos 
//Use pagination instead
//$photos = Photograph::findAll();

$pagination = new Pagination($page, $per_page, $total_count);

//Instead of finding all records, just find the records
//for this page 
$photos = $pagination->paginate('photographs');


$blade = new Blade($views, $cache); 
echo $blade->view('')->make('index', [
		'page'=> $page, 
		'per_page' => $per_page,
		'total_count' => $total_count,
		'photos' => $photos,
		'pagination' => $pagination,
		'connection' => $connection
		] )->render();

 
/*
$smarty = new SmartyBC();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'tmp'; 

$smarty->assign("page",$page);
$smarty->assign("per_page",$per_page);
$smarty->assign("total_count",$total_count);
$smarty->assign_by_ref('photos',$photos);
$smarty->assign_by_ref('pagination',$pagination);
$smarty->assign("connection",$connection);

$config['date'] = '%I:%M %p';
$config['time'] = '%H:%M:%S';
$smarty->assign('config', $config);
$smarty->assign('yesterday', strtotime('-1 day'));

$smarty->display('index.tpl');
*/

 
//echo "offset: ".$pagination->offset();
?>