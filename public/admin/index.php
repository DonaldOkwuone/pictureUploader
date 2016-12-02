<?php
require_once('../../includes/functions.php');
require_once('../../includes/Session.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }

include("../layouts/admin_header.php");

?>

		<h2>Menu</h2>
		
		</div>
<?php
	
include("../layouts/admin_footer.php");
?> 
