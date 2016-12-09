<?php
require_once('../../includes/initialize.php');
use Philo\Blade\Blade;

$blade = new Blade(VIEWS, CACHE); 

if($session->is_logged_in()) {
  redirect_to("index.php");
}


// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	
  if ($found_user) {
    $session->login($found_user);
	$message = $found_user->fullName() . " logged in..."; 
	
	$logger = new Logger("Login", $message);
	$logger->logAction();
	
    redirect_to("index.php");
  } else {
    // username/password combo was not found in the database
    $message = "Username/password combination incorrect.";
  }
  
   //Handle Post Request

  echo $blade->view()->make('login', [
	'username' => $username,
	'password' => $password,
	'message' => $message,
	''
	
  ] )->render();
 
  
} else { // Form has not been submitted.
  $username = "";
  $password = "";
  $message = "";
  
   //Handle Post Request 
  echo $blade->view()->make('login', [
	'username' => $username,
	'password' => $password,
	'message' => $message,
	''
	
  ] )->render();
}


?>
