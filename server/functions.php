<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = stripslashes($theValue);
  }

  // $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($dbconn,$theValue) : mysqli_escape_string($dbconn,$theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

function CheckSession() 
{
  if (!isset($_SESSION)) {
    session_start();
  }

  $thispage = basename($_SERVER['PHP_SELF']);

if(isset($_SESSION['app_user'])) {
	//die('logged in');
	//get logged in user's info
	mysqli_select_db($dbconn, $database_dbconn);
	$user_query = sprintf("SELECT * FROM employee WHERE emp_id = %s", GetSQLValueString($_SESSION['app_user'], "int"));
	$userRS = mysqli_query($dbconn,$user_query) or die(mysqli_error($dbconn));
	$user = mysqli_fetch_assoc($userRS);

	if($user['emp_password_change_required'] && $thispage != 'change-password.php') {
		// direct to password-change
		header("location: change-password.php?err=You are required to change your password before proceeding!");
		exit;
	}
} else {
	//die('not logged in');
	//not logged in, redirect to login page with error
	$_SESSION['PrevUrl'] = $_SERVER['REQUEST_URI']; //source page for login redirect
	
	header("location: login.php?err=Please login to continue!");
	exit;
}
}