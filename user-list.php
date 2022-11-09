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
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<title>User List | <?php echo $config['title'] ?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>     
	</head>
	<body>
		<!-- header-section -->
		<?php include('header.php') ?>

		<!-- BEGIN CONTAINER -->
		<div class="container">
			<div class="row">
				<div class="faq-wrapper">
					<!-- Alert messages -->
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

					<div class="faq-inner">
							<h1>List of Users</h1>				
							<div class="row">		
									<?php if(in_array($user['usr_role'], ['admin'])) { ?>
										<a href="user-edit.php"><button type="button" class="btn btn-success">Add New User</button></a>
									<?php } ?>
									<br />
							</div>
							<br />
							<div class="row">
										<?php if($totalRows_users > 0) { ?>
											<table>
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
																	<a href="user-edit.php?id=<?php echo $row_users["usr_id"]; ?>"><button class="btn-warning"> Edit </button></a>
																	<a href="user-list.php?delete=<?php echo $row_users["usr_id"]; ?>" ><button class="btn-danger"> Delete</button></a>
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
				</div>
			</div>
		</div>
		<!-- END CONTAINER -->

		<!-- FOOTER -->
		<?php include('footer.html') ?>

	</body>
</html>
<?php mysqli_free_result($users); ?>
