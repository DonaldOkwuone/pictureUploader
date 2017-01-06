<?php
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : redirect_to("admin.php") ;

include("../layouts/admin_header.php");
?>


