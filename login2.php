<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Login </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="Yemi Tula" name="author"/>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link href="assets/admin/pages/css/login2.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout4/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout4/css/custom .css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="images/drinklogo.png" />
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">

	<!-- Alert messages -->
		<?php if(isset($_GET["err"]) && !empty($_GET["err"])){ ?>
		<div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span>
			<?php echo $_GET["err"]; ?>. </span>
		</div>     
        <?php } ?>   

        <?php if(isset($_GET["msg"]) && !empty($_GET["msg"])){ ?>
		<div class="alert alert-success">
			<button class="close" data-close="alert"></button>
			<span>
			<?php echo $_GET["msg"]; ?>. </span>
		</div>     
        <?php } ?>

	<!-- BEGIN LOGIN FORM -->
	<form action="" method="POST" class="login-form" id="login" name="login">
		<div class="form-title">
			<span class="form-title">Welcome.</span>
			<span class="form-subtitle">Please login.</span>
		</div> 

		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Staff ID</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Staff ID" name="login_username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="login_password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
		</div>
		<div class="form-actions">
			<!-- <div class="pull-left">
				<label class="rememberme check">
				<input type="checkbox" name="remember" value="1"/>Remember me </label>
			</div> -->
			<div class="pull-right forget-password-block">
				<a href="?target=password" id="forget-password" class="forget-password">Forgot Password?</a>
			</div>
		</div>
		<!-- <div class="create-account">
			<p>
				<a href="?target=register" id="register-btn">Create an account</a>
			</p>
		</div> -->
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form hidden action="password-reset.php" method="post" name="forgot" class="forget-form">
		<div class="form-title">
			<span class="form-title">Forgot Password ?</span>
			<span class="form-subtitle">Enter your e-mail to reset it.</span>
		</div>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form hidden action="<?php echo $editFormAction; ?>" method="POST" class="register-form" id="register" name="register">
		<div class="form-title">
			<span class="form-title">Sign Up</span>
		</div>
		<p class="hint">
			 Enter your account details below:
		</p>

        <?php if(isset($_GET["error"]) && !empty($_GET["error"])){ ?>
		<div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span>
			<?php echo $_GET["error"]; ?>. </span>
		</div>     
        <?php } ?> 

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Staff ID</label>
		  <span id="sprytextfield5">
		  <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Staff ID" name="emp_staff_id" required/>
            <span class="textfieldRequiredMsg">A value is required.</span></span>
		</div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<span id="sprypassword1">
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="emp_password" placeholder="Password" name="emp_password"/>
			<span class="passwordRequiredMsg">A value is required.</span></span></div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
		  <span id="spryconfirm1">
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="emp_password2" id="emp_password2" />
			<span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></div>

		<p class="hint">
			 Enter personal and staff details below:
		</p>

		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
		  <span id="sprytextfield1">
          <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="emp_email"/>
          <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>

        <div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Phone Number</label>
		  
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Phone Number" name="emp_phone" required/>
            
		</div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Surname</label>
		  <span id="sprytextfield2">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Surname" name="emp_surname"/>
			<span class="textfieldRequiredMsg">A value is required.</span></span></div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">First name</label>
		  <span id="sprytextfield3">
			<input class="form-control placeholder-no-fix" type="emp_firstname" autocomplete="off" placeholder="First name" name="emp_firstname"/>
            <span class="textfieldRequiredMsg">A value is required.</span></span>
		</div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Middle name (optional)</label>
		  
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Middle name (optional)" name="emp_middlename"/>
            
		</div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Date of Birth</label>
		  <input class="form-control placeholder-no-fix date-picker" data-date-format="yyyy-mm-dd" data-date-end-date="-15y"  type="text" autocomplete="off" placeholder="Date of Birth" name="emp_dob"/>
		</div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Date of Employment</label>
		  <input class="form-control placeholder-no-fix date-picker" data-date-format="yyyy-mm-dd" data-date-end-date="+0d"  type="text" autocomplete="off" placeholder="Employment Date" name="emp_employment_date"/>
		</div>
   

        <div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Level</label>
		  	<select name="emp_level" class="form-control">
		  		<option value="Manager">I am a Manager Level Employee </option>
		  		<option value="HOD">I am a HOD </option>
		  		<option value="Executive">I am an Executive Level Employee </option>
		  	</select>
		</div>      

		<!-- <div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="tnc"/>
			<span class="loginblue-font">I agree to the </span>
			<a href="javascript:;" class="loginblue-link">Terms of Service</a>
			<span class="loginblue-font">and</span>
			<a href="javascript:;" class="loginblue-link">Privacy Policy </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div> -->
		<div class="form-actions">
			<button type="button" id="register-back-btn" class="btn btn-default">Back</button>
			<button type="submit" id="register-submit-btn" class="btn btn-primary uppercase pull-right">Submit</button>
		</div>
		<input type="hidden" name="MM_insert" value="register">
	</form>
	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/components-pickers.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
ComponentsPickers.init();

<?php if(isset($_GET['target'])) {
	switch($_GET['target']) {
		case 'login': echo "jQuery('.login-form').show(); jQuery('.register-form').hide(); jQuery('.forget-form').hide();";
		break;

		case 'register': echo "jQuery('.register-form').show(); jQuery('.login-form').hide(); jQuery('.forget-form').hide();";
		break;

		case 'password': echo "jQuery('.forget-form').show(); jQuery('.login-form').hide(); jQuery('.register-form').hide();";
		break;
	}
} ?>

});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["change"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "emp_password", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>