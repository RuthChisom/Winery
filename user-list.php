<!-- required files -->
<?php include("server/dh-config.php"); ?>
<?php require_once('server/dbconn.php'); ?>
<?php include('server/functions.php'); ?>
<?php require_once('server/check-session.php'); ?>

<?php
//can I see the user list?
if(!in_array($_SESSION['app_admin'], ['admin']) ) {
	header("location: index.php?err=Sorry, access to that page is denied! Kindly logout and login as an admin"); exit;
}

// get user list from db
mysqli_select_db($dbconn, $database_dbconn);
$query_users = sprintf("SELECT * FROM user");
$users = mysqli_query($dbconn,$query_users) or die(mysqli_error($dbconn));
$row_users = mysqli_fetch_assoc($users);
$totalRows_users = mysqli_num_rows($users);

if(isset($_GET["delete"]) && ($_GET["delete"] != "")) {
	//Run Query
		$deleteSQL = sprintf("DELETE FROM user WHERE usr_id=%s", GetSQLValueString($_GET['delete'],"int"));
		$deleteRS = mysqli_query($dbconn,$deleteSQL) or die(mysqli_error($dbconn));
		header("Location: user-list.php?msg=User Deleted Sucessfully!");
		exit;
	}
?>


<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<title>User List | <?php echo $config['title'] ?></title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>     
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<!-- <div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner"><?php 
	// include('-inc-header.php') ?></div>
</div> -->
<!-- header-section-starts -->
<div class="c-header" id="home">
			<?php include('header.php') ?>
		</div>
<!-- END HEADER -->
<!-- <div class="clearfix">
</div> -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->

	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>List of users</h1>
				</div>
				<!-- END PAGE TITLE -->
				<!-- BEGIN PAGE TOOLBAR -->

				<!-- END PAGE TOOLBAR -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="index.php">Back to Homepage</a>
					<i class="fa fa-circle"></i>
				</li>
				<!-- <li>
					<a href="#">User</a>
				</li> -->
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->

			<?php if(isset($_GET["msg"])){ ?>
			<div class="alert alert-success">
				<strong>Success!</strong> <?php echo $_GET["msg"] ?>
			</div>
			<?php } ?>

			<?php if(isset($_GET["err"])){ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> <?php echo $_GET["err"]; ?>
			</div>
			<?php } ?>
			
			<div class="row">		
				<div class="col-md-12">	
					<?php if(in_array($user['usr_role'], ['admin'])) { ?>
					<a href="user-edit.php"><button type="button" class="btn btn-success btn btn-circle"><i class="fa fa-plus-circle"></i> Add New User</button></a>
					<?php } ?>
					<br />
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<!-- <i class="fa fa-globe"></i>Users -->
							</div>
							<div class="tools">								
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<?php if($totalRows_users > 0) { ?>
							<table class="table table-striped table-bordered table-hover" id="sample_6">
							<thead>
							<tr>
								<th width="20%">
									 Name
								</th>
								<th width="30%">
									 Email
								</th>
								<th width="20%">
									 Phone
								</th>
								<th width="10%">
									 Role
								</th>
								<th width="20%">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php do { ?>
							<tr>
								<td>
									 <?php echo $row_users["usr_firstname"]; ?> <?php echo $row_users["usr_lastname"]; ?> 
								</td>
								<td>
									 <?php echo $row_users["usr_email"]; ?>
								</td>
								<td>
									 <?php echo $row_users["usr_phone"]; ?>
								</td>
								<td>
									<?php echo $row_users["usr_role"]; ?>
								</td>
								<td>
								<?php  ?>
									<a href="user-edit.php?id=<?php echo $row_users["usr_id"]; ?>" class="tooltips" title="Edit User" ><button> Edit </button></a>&nbsp;&nbsp;&nbsp;
									<a href="user-list.php?delete=<?php echo $row_users["usr_id"]; ?>" data-confirm-msg="Are You Sure You Want To Delete This User ?"><button> Delete</button></a>
								<?php ?>
								</td>
							</tr>
							<?php }while ($row_users = mysqli_fetch_assoc($users)); ?>
							</tbody>
							</table>
							<?php } else { ?>
							<div class="alert alert-danger">
								<strong>Sorry!</strong> No User Found.
							</div>
							<?php } ?>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>

	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- <div class="page-footer">
	<?php 
	// include('-inc-footer.php') 
	?>
</div> -->
<!-- END FOOTER -->
</body>
<!-- END BODY -->
</html>
<?php
mysqli_free_result($users);
?>
