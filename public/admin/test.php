<?php
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : false ;

include("../layouts/admin_header.php");
?>
 
<?php 
	$user = new User();
	$user->username = 'admin';
	$user->password = 'admin';
	$user->first_name = 'admin';
	$user->last_name = 'admin';
	$user->save();
?> 
 
 
</div>

<?php	

include("../layouts/admin_footer.php");
?> 
