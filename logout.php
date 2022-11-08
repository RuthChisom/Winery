<?php
if(!isset($_SESSION)) session_start();
unset($_SESSION['app_user']);
unset($_SESSION['app_admin']);
header("location: index.php");