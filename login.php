<!-- required files -->
<?php include("server/dh-config.php"); ?>
<?php require_once('server/dbconn.php'); ?>
<?php include("server/functions.php"); ?>

<!-- action for submit button - Validate request to login to this site-->
<?php

if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];

if (isset($_POST['login_email'])) {
  $loginEmail=$_POST['login_email'];
  $password=$_POST['login_password'];
//   $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.html";
  $MM_redirectLoginFailed = "login.php?err=Oops! Login failed. Email or Password incorrect.";
  $MM_redirecttoReferrer = false;
  mysqli_select_db($dbconn, $database_dbconn);
  
  $LoginRS__query=sprintf("SELECT * FROM user WHERE usr_email=%s AND usr_password=%s",
    GetSQLValueString($loginEmail, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($dbconn,$LoginRS__query) or die(mysqli_error($dbconn));
  $row_login = mysqli_fetch_assoc($LoginRS);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['app_user'] = $row_login["usr_id"];
    $_SESSION['app_admin'] = $row_login["usr_role"];
    header("Location: " . $MM_redirectLoginSuccess );
    exit;
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
    exit;
  }
}
?>

<!-- login page -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register | <?php echo $config['title'] ?></title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
        <img src="images/drinklogo.png" alt="<?php echo $config['title'] ?>"/>
        </a>
    </div>
    <!-- END LOGO -->
	<div class="content">
	
	<!-- Alert messages -->
	<?php if(isset($_GET["err"]) && !empty($_GET["err"])){ ?>
		<div class="alert alert-danger">
			<span>
			<?php echo $_GET["err"]; ?>. </span>
		</div>     
    <?php } ?>   

    <?php if(isset($_GET["msg"]) && !empty($_GET["msg"])){ ?>
		<div class="alert alert-success">
			<span>
			<?php echo $_GET["msg"]; ?>. </span>
		</div>     
    <?php } ?>

	<!-- BEGIN LOGIN FORM -->
	<form action="<?php echo $loginFormAction; ?>" method="POST" class="login-form" id="login" name="login">
		<div class="form-title">
			<span class="form-title">Welcome.</span>
			<span class="form-subtitle">Please login.</span>
		</div> 

		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Staff ID" name="login_email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="login_password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	</div>
</body>
</html>