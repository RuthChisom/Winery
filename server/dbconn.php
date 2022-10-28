<?php

$hostname_dbconn = "localhost";
$database_dbconn = "drinkhub_app";
$username_dbconn = "drinkhub_admin";
$password_dbconn = "Rjc_sql_22";

$GLOBALS['dbconn'] = mysqli_connect($hostname_dbconn, $username_dbconn, $password_dbconn); 
?>