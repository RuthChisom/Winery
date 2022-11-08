<!-- required files -->
<?php include("server/dh-config.php"); ?>
<?php require_once('server/dbconn.php'); ?>
<?php include("server/functions.php"); ?>

<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
?>

<!-- action for submit button -->
<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "register")) {
	
	$_SESSION['regform'] = $_POST;
	
	$check = $_POST["usr_email"];

    // check if email is already registered
	mysqli_select_db($dbconn, $database_dbconn);
	$query_emailCheck = sprintf("SELECT * FROM user WHERE usr_email = %s", GetSQLValueString($check, "text"));
	$emailCheck = mysqli_query($dbconn,$query_emailCheck) or die(mysqli_error($dbconn));
	$row_emailCheck = mysqli_fetch_assoc($emailCheck);
	$totalRows_emailCheck = mysqli_num_rows($emailCheck);

	//Start Email checking
	if($totalRows_emailCheck) {
		header("Location: register.php?target=register&err=This email is already registered ! Please use another one.");
		exit;
	}
	//End of Email checking
	
  	//register new user
 	$insertSQL = sprintf("INSERT INTO user ( usr_firstname, usr_lastname, usr_email, usr_phone, usr_password, usr_registered_date) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['usr_firstname'], "text"),
                       GetSQLValueString($_POST["usr_lastname"], "text"),
                       GetSQLValueString($_POST["usr_email"], "text"),
                       GetSQLValueString($_POST['usr_phone'], "text"),
                       GetSQLValueString($_POST["usr_password"], "text"),
                       GetSQLValueString(date("Y-m-d h:i:s"), "date"),
					);
  mysqli_select_db($dbconn, $database_dbconn);
  $Result1 = mysqli_query($dbconn,$insertSQL) or die(mysqli_error($dbconn));

  $insertGoTo = "login.php?msg=Congratulations! Your Registration was Successful. Please Login to continue.";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));

}
?>

<!-- registration page -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register | <?php echo $config['title'] ?></title>
    <link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>     
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	
	<!-- header-section-starts -->
	<div class="c-header" id="home">
		<?php include('header.php') ?>
	</div>

	<div class="container">
		<div class="row">
			<div class="faq-wrapper">
	
				<!-- Alert messages -->
				<?php if(isset($_GET["err"]) && !empty($_GET["err"])){ ?>
					<div class="alert alert-danger">
						<!-- <button class="close" data-close="alert"></button> -->
						<span>
						<?php echo $_GET["err"]; ?>. </span>
					</div>     
				<?php } ?>   

				<?php if(isset($_GET["msg"]) && !empty($_GET["msg"])){ ?>
					<div class="alert alert-success">
						<!-- <button class="close" data-close="alert"></button> -->
						<span>
						<?php echo $_GET["msg"]; ?>. </span>
					</div>     
				<?php } ?>
				<div class="faq-inner">
					<div class="contact-form">

						<!-- BEGIN REGISTRATION FORM -->
						<form action="<?php echo $editFormAction; ?>" method="POST" class="register-form" id="register" name="register">
							<div class="form-title">
								<span class="form-title">Create a New Account</span>
							</div>

							<?php if(isset($_GET["error"]) && !empty($_GET["error"])){ ?>
							<div class="alert alert-danger">
								<button class="close" data-close="alert"></button>
								<span>
								<?php echo $_GET["error"]; ?>. </span>
							</div>     
							<?php } ?> 


							<div class="form-group">
								<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
								<label class="control-label ">Email*</label>
							<input class="form-control" type="email" name="usr_email" required/>
							</div>
							<div class="form-group">
								<label class="control-label ">Password*</label>
								<input class="form-control" type="password" id=" usr_password" name="usr_password" required/>
							</div>
							<div class="form-group">
								<label class="control-label ">Phone Number*</label>
								<input class="form-control" type="text" name="usr_phone" required/>
							</div>

							<div class="form-group">
								<label class="control-label ">Last Name*</label>
								<input class="form-control" type="text" name="usr_lastname" required/>
							</div>

							<div class="form-group">
								<label class="control-label ">First Name*</label>
								<input class="form-control" type="text" name=" usr_firstname" required/>
							</div>
					
							<div class="form-actions">
								<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
							</div>
							<input type="hidden" name="MM_insert" value="register">
						</form>
						<!-- END REGISTRATION FORM -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>