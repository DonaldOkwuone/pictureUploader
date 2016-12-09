<?php
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : false ;

include("../layouts/admin_header.php");
?>

<h2>Menu</h2>
<ul>
	
	<li><a href="logout.php">Logout</a></li> 
	<li><a href="view_log.php">View Log</a></li> 
	<li><a href="list_photos.php">List Photos</a></li> 
	<li><a href="photo_upload.php">Photos Upload</a></li> 
</ul>
</div>

<?php	
include("../layouts/admin_footer.php");
?> 
