<!-- required files -->
<?php include("server/dh-config.php"); ?>
<?php require_once('server/dbconn.php'); ?>
<?php include('server/functions.php'); ?>
<?php require_once('server/check-session.php'); ?>
<?php 
//can I edit a user?
if(!in_array($_SESSION['app_admin'], ['admin'])) { 
	header("location: index.html?msg=Sorry, access to that page is denied!"); exit;
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
		 header("Location: user-edit.php?err=This email is already registered ! Please use another one.");
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
  $updateSQL = sprintf("UPDATE user SET usr_email=%s, usr_phone=%s, usr_firstname=%s, usr_lastname=%s, usr_role=%s WHERE usr_id=%s",
                       GetSQLValueString($_POST['usr_email'], "text"),
                       GetSQLValueString($_POST['usr_phone'], "text"),
                       GetSQLValueString($_POST['usr_firstname'], "text"),
                       GetSQLValueString($_POST['usr_lastname'], "text"),
                       GetSQLValueString($_POST['usr_role'], "text"),
                       GetSQLValueString($_POST['usr_id'], "int"));
  //die($updateSQL);

  mysqli_select_db($dbconn, $database_dbconn);
  $Result1 = mysqli_query($dbconn,$updateSQL) or die(mysqli_error($dbconn));

  $updateGoTo = "user-list.php?msg=User Updated Successfully!";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if(isset($_GET["delete"]) && ($_GET["delete"] != "")) {

//Run Query

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
$user = mysqli_query($dbconn,$query_user) or die(mysqli_error($dbconn));
$row_user = mysqli_fetch_assoc($user);
$totalRows_user = mysqli_num_rows($user);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>User Edit | <?php echo $config['title'] ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner"><?php 
    // include('-inc-header.php') ?></div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse"><?php 
		// include('-inc-main-nav.php') ?></div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1> <?php echo (isset($_GET["id"])) ? "Edit" : "New"; ?> User<!-- <small>form validation</small> --></h1>
				</div>
				<!-- END PAGE TITLE -->
				<!-- BEGIN PAGE TOOLBAR -->
				<!-- END PAGE TOOLBAR -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>User Details
							</div>
						</div>
						<div class="portlet-body form">
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
							
							<!-- BEGIN FORM-->
							<form method="POST" name="user_add" action="<?php echo $editFormAction; ?>" id="user_add" class="form-horizontal">
								<div class="form-body">
									<!-- <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div> -->
									<div class="form-group">
										<label class="control-label col-md-3">First Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="usr_firstname" type="text" class="form-control" id="usr_firstname" value="<?php echo $row_user['usr_firstname']; ?>" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Lastname <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="usr_lastname" type="text" class="form-control" id="usr_lastname" value="<?php echo $row_user['usr_lastname']; ?>" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Email <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="usr_email" type="email" class="form-control" id="usr_email" value="<?php echo $row_user['usr_email']; ?>" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Password <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="usr_password" type="password" class="form-control" id="usr_password" value="<?php echo $row_user['usr_password']; ?>" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Phone 
										</label>
										<div class="col-md-4">
											<input name="usr_phone" type="text" class="form-control" id="usr_phone" value="<?php echo $row_user['usr_phone']; ?>" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">User Role
										<span class="required">
										* </span></label> 
										<div class="col-md-4">
											<select class="form-control select2me" data-placeholder="Select..." name="usr_role" id="usr_role">
											  <option value="default" <?php if (!(strcmp("default", $row_user['usr_role']))) {echo "selected=\"selected\"";} ?>>Default</option>
											  <option value="admin" <?php if (!(strcmp("admin", $row_user['usr_role']))) {echo "selected=\"selected\"";} ?>>Admin</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"> Save</button>
											<a href="user-list.php"><button type="button" class="btn default">Cancel</button></a>
										</div>
									</div>
								</div>
								<input type="hidden" name="MM_insert" value="user_add">
                                <input name="usr_id" type="hidden" id="usr_id" value="<?php echo $row_user['usr_id']; ?>" />
                                <input type="hidden" name="MM_update" value="user_add">
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer"><?php 
// include('-inc-footer.php') ?></div>
<!-- END FOOTER -->

</body>
<!-- END BODY -->
</html>
