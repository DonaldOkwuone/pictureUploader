<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
  // Find all the photos
  //$photos = Photograph::findAll();
  
  //check if page variable is set 
  $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
  $per_page = 4;
  $total_count = Photograph::countAll();
  $pagination = new Pagination($page, $per_page, $total_count);
  $photos = $pagination->paginate('photographs');
 
  
  
?>
<?php include('../layouts/admin_header.php'); ?>

<h2>Photographs</h2>

<?php echo output_message($message); ?>
<table class="bordered">
  <tr>
    <th>Image</th>
    <th>Filename</th>
    <th>Caption</th>
    <th>Size</th>
    <th>Type</th>
    <th>&nbsp;</th>
		<th>&nbsp;</th>
  </tr>
<?php foreach($photos as $photo): ?>
  <tr>
    <td><img src="../<?php echo $photo->imagePath(); ?>" width="100" /></td>
    <td><?php echo $photo->filename; ?></td>
    <td><?php echo $photo->caption; ?></td>
    <td><?php echo $photo->size_as_text(); ?></td>
    <td><?php echo $photo->type; ?></td>
	<td><a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a></td>
	<td><a href="comments.php?id=<?php echo $photo->id; ?>">Comments <?php echo count( $photo->comments() ) ?></a></td>
  </tr>
<?php endforeach; ?>
</table>
<br />
<?php 
	//Dont need to pass second parameter of query string cos there are none
	echo $pagination->outputPagination($_SERVER['PHP_SELF']); 

?>
<br />
<a href="photo_upload.php">Upload a new photograph</a>

<?php include('../layouts/admin_footer.php'); ?>
