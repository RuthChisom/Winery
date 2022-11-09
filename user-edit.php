<!-- required files -->
<?php include("server/dh-config.php"); ?>
<?php require_once('server/dbconn.php'); ?>
<?php include('server/functions.php'); ?>
<?php require_once('server/check-session.php'); ?>
<?php 
	//can I edit a user?
	if(!in_array($_SESSION['app_admin'], ['admin'])) { 
		header("location: index.php?err=Sorry, access to that page is denied! Kindly logout and login as an admin"); exit;
	} 
?>
<?php
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "user_add") && empty($_POST["usr_id"])) {
		// check if email is already registered
		mysqli_select_db($dbconn, $database_dbconn);
		$query_emailCheck = sprintf("SELECT * FROM user WHERE usr_email = %s", GetSQLValueString($_POST["usr_email"], "text"));
		$emailCheck = mysqli_query($dbconn,$query_emailCheck) or die(mysqli_error($dbconn));
		$row_emailCheck = mysqli_fetch_assoc($emailCheck);
		$totalRows_emailCheck = mysqli_num_rows($emailCheck);
	
		//Start Email checking
		if($totalRows_emailCheck) {
			header("Location: user-edit.php?err=This email is already registered! Please use another one.");
			exit;
		}
		//End of Email checking
		
		$insertSQL = sprintf("INSERT INTO user (usr_email, usr_phone, usr_firstname, usr_lastname, usr_password, usr_role, usr_registered_date) VALUES (%s, %s, %s, %s, %s, %s, %s)",
						GetSQLValueString($_POST['usr_email'], "text"),
						GetSQLValueString($_POST['usr_phone'], "text"),
						GetSQLValueString($_POST['usr_firstname'], "text"),
						GetSQLValueString($_POST['usr_lastname'], "text"),
						GetSQLValueString($_POST['usr_password'], "text"),
						GetSQLValueString($_POST["usr_role"], "text"),
						GetSQLValueString(date("Y-m-d h:i:s"), "date"),
					);

		mysqli_select_db($dbconn, $database_dbconn);
		$Result1 = mysqli_query($dbconn,$insertSQL) or die(mysqli_error($dbconn));

		$insertGoTo = "user-list.php?msg= User Added successfully!";
		if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		}
		header(sprintf("Location: %s", $insertGoTo));
	}

	if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "user_add")&& !empty($_POST["usr_id"])) {
		// check if email is already registered
		mysqli_select_db($dbconn, $database_dbconn);
		$query_emailCheck = sprintf("SELECT * FROM user WHERE usr_email = %s AND usr_id <> %s", GetSQLValueString($_POST["usr_email"], "text"), GetSQLValueString($_POST["usr_id"], "int"));
		$emailCheck = mysqli_query($dbconn,$query_emailCheck) or die(mysqli_error($dbconn));
		$row_emailCheck = mysqli_fetch_assoc($emailCheck);
		$totalRows_emailCheck = mysqli_num_rows($emailCheck);
	
		//Start Email checking
		if($totalRows_emailCheck) {
			header("Location: user-edit.php?id=".$_POST["usr_id"]."&err=This email is already registered! Please use another one.");
			exit;
		}
		//End of Email checking
		
		$updateSQL = sprintf("UPDATE user SET usr_email=%s, usr_phone=%s, usr_firstname=%s, usr_lastname=%s, usr_role=%s WHERE usr_id=%s",
						GetSQLValueString($_POST['usr_email'], "text"),
						GetSQLValueString($_POST['usr_phone'], "text"),
						GetSQLValueString($_POST['usr_firstname'], "text"),
						GetSQLValueString($_POST['usr_lastname'], "text"),
						GetSQLValueString($_POST['usr_role'], "text"),
						GetSQLValueString($_POST['usr_id'], "int"));

		mysqli_select_db($dbconn, $database_dbconn);
		$Result1 = mysqli_query($dbconn,$updateSQL) or die(mysqli_error($dbconn));

		$updateGoTo = "user-list.php?msg=User Updated Successfully!";

		if (isset($_SERVER['QUERY_STRING'])) {
			$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
			$updateGoTo .= $_SERVER['QUERY_STRING'];
		}
		header(sprintf("Location: %s", $updateGoTo));
	}
?>

<?php
	$colname_user = "-1";
	if (isset($_GET['id'])) {
	$colname_user = $_GET['id'];
	}
	// get user details
	mysqli_select_db($dbconn, $database_dbconn);
	$query_user = sprintf("SELECT * FROM user WHERE usr_id = %s", GetSQLValueString($colname_user, "int"));
	$fuser = mysqli_query($dbconn,$query_user) or die(mysqli_error($dbconn));
	$row_user = mysqli_fetch_assoc($fuser);
	$totalRows_user = mysqli_num_rows($fuser);
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8"/>
		<title>User Edit | <?php echo $config['title'] ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>     
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
			<!-- header-section -->
				<?php include('header.php') ?>
		
		<!-- BEGIN CONTAINER -->
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
											<div>
												<h1> <?php echo (isset($_GET["id"])) ? "Edit" : "New"; ?> User</h1>
											</div>
									
											<!-- BEGIN FORM-->
											<form method="POST" name="user_add" action="<?php echo $editFormAction; ?>" id="user_add" class="form-horizontal">
												<div>
													<div>
														<label>First Name*</label>
														<div>
															<input name="usr_firstname" type="text" id="usr_firstname" value="<?php echo $row_user['usr_firstname']; ?>" required/>
														</div>
													</div>
													<div>
														<label >Lastname*</label>
														<div>
															<input name="usr_lastname" type="text" id="usr_lastname" value="<?php echo $row_user['usr_lastname']; ?>" required/>
														</div>
													</div>
													<div>
														<label >Email*</label>
														<div>
															<input name="usr_email" type="email" id="usr_email" value="<?php echo $row_user['usr_email']; ?>" required/>
														</div>
													</div>
													<div>
														<label >Password*</label>
														<div>
															<input name="usr_password" type="password" id="usr_password" value="<?php echo $row_user['usr_password']; ?>" required/>
														</div>
													</div>
													<div>
														<label >Phone 
														</label>
														<div>
															<input name="usr_phone" type="text" id="usr_phone" value="<?php echo $row_user['usr_phone']; ?>" required/>
														</div>
													</div>
													<div>
														<label >User Role*</label> 
														<div>
															<select name="usr_role" id="usr_role">
																<option value="default" <?php if (!(strcmp("default", $row_user['usr_role']))) {echo "selected=\"selected\"";} ?>>Default</option>
																<option value="admin" <?php if (!(strcmp("admin", $row_user['usr_role']))) {echo "selected=\"selected\"";} ?>>Admin</option>
															</select>
														</div>
													</div>
												</div>
												<div class="form-actions">
														<div>
															<button type="submit" class="btn btn-success"> Save</button>
															<a href="user-list.php"><button type="button" class="btn btn-danger">Cancel</button></a>
														</div>
												</div>
												<input type="hidden" name="MM_insert" value="user_add">
												<input name="usr_id" type="hidden" id="usr_id" value="<?php echo $row_user['usr_id']; ?>" />
												<input type="hidden" name="MM_update" value="user_add">
											</form>
											<!-- END FORM-->
										</div>
									</div>
				</div>
			</div>
		</div>
		<!-- END CONTAINER -->
		
		<!-- footer -->
		<?php include('footer.html') ?>
	</body>
</html>
