<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_dbconn = "localhost";
$database_dbconn = "drinkhub_app";
$username_dbconn = "drinkhub_admin";
$password_dbconn = "Rjc_sql_22";
// $con = mysqli_connect($hostname_dbconn,$username_dbconn,$password_dbconn);

// $GLOBALS['dbconn'] = mysqli_pconnect($hostname_dbconn, $username_dbconn, $password_dbconn) or trigger_error(mysqli_error(),E_USER_ERROR); 
$GLOBALS['dbconn'] = mysqli_connect($hostname_dbconn, $username_dbconn, $password_dbconn); 
?>