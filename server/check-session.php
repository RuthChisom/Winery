<?php 
if (!isset($_SESSION)) {
  session_start();
}

$thispage = basename($_SERVER['PHP_SELF']);

if(isset($_SESSION['app_user'])) {
	//get logged in user's info
	mysqli_select_db($dbconn, $database_dbconn);
	$user_query = sprintf("SELECT * FROM user WHERE usr_id = %s", GetSQLValueString($_SESSION['app_user'], "int"));
	$userRS = mysqli_query($dbconn,$user_query) or die(mysqli_error($dbconn));
	$user = mysqli_fetch_assoc($userRS);
}