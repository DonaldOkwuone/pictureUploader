<?php
require_once('../../includes/initialize.php'); 

/* 
1.fetch $_GET variable id
2.delete post by id
3.redirect to all post page

*/


if(isset ($_POST['id'] ) && !empty($_POST['id']) )
{
	$id = $_POST['id'];
	
	if(Post::delete($id))
	{
		$session->message('Post has been deleted');
		redirect_to('admin.php');
	}else
	{
		$session->message('Post not deleted');
		redirect_to('admin.php');
	}
}
?>