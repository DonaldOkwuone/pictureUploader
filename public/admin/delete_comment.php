<?php	include("../../includes/initialize.php");  ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
if(!empty($_GET['id']) ){
	 $id = $_GET['id'];
	 $comment = Comment::findById($id);
	 if(Comment::delete($id)){
		 echo "executed";
		//Comment deleted
		$session->message("Comment was deleted");
		//echo $comment->photograph_id;
		//var_dump($session);
		//var_dump($_SESSION['message'] );
		
		//$session->message();
	    redirect_to("comments.php?id=".$comment->photograph_id);
	   } else{
			echo "Not executed";
			//Comment not deleted
			$session->message("Comment not deleted");
			//redirect_to("comments.php?id=".$id);
		}
 } else{
	 redirect_to("comments.php?id=". $id);
 }
 

		
?>