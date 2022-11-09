<!-- required files -->
<?php include("server/dh-config.php"); ?>
<?php require_once('server/dbconn.php'); ?>
<?php require_once("server/functions.php"); ?>
<?php require_once('server/check-session.php'); ?>

<!-- action for submit button - Validate request to login to this site-->
<?php

if (!isset($_SESSION)) {
  session_start();
}
//is someone already logged in?
// if(isset($_SESSION['app_user']) ) {
// 	header("location: index.php"); exit;
// }

$loginFormAction = $_SERVER['PHP_SELF'];

if (isset($_POST['login_email'])) {
  $loginEmail=$_POST['login_email'];
  $password=$_POST['login_password'];
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php?err=Oops! Login failed. Email or Password incorrect.";
  mysqli_select_db($dbconn, $database_dbconn);
  
  $LoginRS__query=sprintf("SELECT * FROM user WHERE usr_email=%s AND usr_password=%s",
    GetSQLValueString($loginEmail, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($dbconn,$LoginRS__query) or die(mysqli_error($dbconn));
  $row_login = mysqli_fetch_assoc($LoginRS);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
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
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Register | <?php echo $config['title'] ?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    	<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>     
	</head>
	<body >
		<!-- header-section -->
			<?php include('header.php') ?>

		<div class="container">
			<div class="row">
				<div class="faq-wrapper">

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

					<div class="faq-inner">
						<div class="contact-form">
							<!-- BEGIN LOGIN FORM -->
							<form action="<?php echo $loginFormAction; ?>" method="POST" id="login" name="login">
								<div>
									<h2>Welcome! Please login.</h2>
								</div> 
								<div>
									<label for="email">Email</label>
									<input type="text" name="login_email" id="email"/>
								</div>
								<div>
									<label for="password">Password</label>
									<input type="password" name="login_password" id="password"/>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-default">Login</button>
								</div>
							</form>
							<!-- END LOGIN FORM -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- footer -->
		<?php include('footer.html') ?>
	</body>
</html>