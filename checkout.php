<?php include("server/dh-config.php"); ?>
<?php require_once('server/dbconn.php'); ?>
<?php include('server/functions.php'); ?>
<?php
    // get drink details
	mysqli_select_db($dbconn, $database_dbconn);
	$query_drink = sprintf("SELECT * FROM drink WHERE drk_id = %s", GetSQLValueString($_GET['id'], "int"));
	$drink = mysqli_query($dbconn,$query_drink) or die(mysqli_error($dbconn));
	$row_drink = mysqli_fetch_assoc($drink);
	$totalRows_drink = mysqli_num_rows($drink);

	$checkoutGoTo = "index.php?msg=Your order was successful. You will be contacted shortly!";
	$editFormAction = $_SERVER['PHP_SELF'];

	if ((isset($_POST["MM_update"]))) {
        $editFormAction = header(sprintf("Location: %s", $checkoutGoTo));
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Checkout | <?php echo $config['title'] ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>     
  </head>

  <body>
    <!-- header-section -->
        <?php include('header.php') ?>

      <!-- Checkout starts -->
      <div class="container">
        <div class="row">
          <div class="faq-wrapper">
            <div>
              <h2>Please fill in your Delivery Details</h2>
            </div>
            <div class="faq-inner">
                    <h3>
                        <?php echo $row_drink['drk_name']; ?>
						<img src="images/<?php echo $row_drink["drk_image"]; ?>" class="img-responsive" alt="" />
                    </h3>
                    <hr>
					<form method="POST" name="user_add" action="<?php echo $editFormAction; ?>" id="user_add" class="form-horizontal">
                        <div>
                            <label>First Name*</label>
                            <div>
                                <input name="usr_firstname" type="text" id="usr_firstname" required/>
                            </div>
                        </div>
                        <div>
                            <label >Lastname*</label>
                            <div>
                                <input name="usr_lastname" type="text" id="usr_lastname" required/>
                            </div>
                        </div>
                        <div>
                            <label >Email</label>
                            <div>
                                <input name="usr_email" type="email" id="usr_email"/>
                            </div>
                        </div>
                        <div>
                            <label >Phone*</label>
                            <div>
                                <input name="usr_phone" type="text" id="usr_phone" required/>
                            </div>
                        </div>
                        <div>
                            <label >Address*</label>
                            <div>
                                <input name="usr_address" type="text" id="usr_address" required/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Pay <span>$</span><?php echo $row_drink['drk_price']; ?></button>
                        </div>
						<input type="hidden" name="MM_update">

                    </form>
                <hr>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <br/>

      <!-- checkout section ends -->

      <!-- footer -->
      <?php include('footer.html') ?>
      
  </body>
</html>