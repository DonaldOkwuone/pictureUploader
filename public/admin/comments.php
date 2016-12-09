<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
 if(!empty($_GET['id']) ){
	 $photo = Photograph::FindById($_GET['id']);
	 //$comments = $photo->comments();
 } else{
	 redirect_to("list_photos.php");
 }
  
  //PAGINATION
  $page = empty($_GET['page']) ? 1 : $_GET['page'];
  $per_page = 2;
  $total_count =count(Comment::findCommentsOn($_GET['id']));
  //print_r(Comment::findCommentsOn($_GET['id']));
  
  $pagination = new Pagination($page, $per_page, $total_count);
  $sql = "SELECT * FROM comments ";
  $sql .= "WHERE photograph_id = {$photo->id} ";
  $sql .= " LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()} ";
   
  $comments = $pagination->paginate_relational('Comment', $sql);
  
?>
<?php include('../layouts/admin_header.php'); ?>

<h2>Comments on this Photograph</h2>

<?php 
	//echo $_SESSION['message'];
	//$session->check_message();
	//echo $session->message();
	echo output_message($message);
 ?>

  
<?php if(count($comments) > 0 ){ ?>
		<table class="bordered">
		  <tr>
			<th>Author</th>
			<th>Comment</th> 
			<th>&nbsp;</th> 
		  </tr>	
<?php foreach($comments as $comment): ?>
			  <tr> 
				<td><?php echo $comment->author; ?></td>
				<td><?php echo $comment->body; ?></td> 
				<td><a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a></td>
			  </tr>
		
<?php	endforeach; ?>
		</table>
<?php	   

}else{
	echo "No Comments...yet";
}
 ?>
  
<?php echo $pagination->outputPagination($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'] ); ?>
<br />
 

<?php include('../layouts/admin_footer.php'); ?>
