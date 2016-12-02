<?php 

require_once("../includes/MYSQLDatabase.php");
require_once("../includes/User.php");
include("layouts/header.php"); 
 

$user = User::findById(1);
echo $user->fullName();

echo "<hr/>";

$users = User::findAll();
foreach($users as $user) {
  echo "User: ". $user->username ."<br />";
  echo "Name: ". $user->fullName() ."<br /><br />";
}

include("layouts/header.php");  

 ?>

