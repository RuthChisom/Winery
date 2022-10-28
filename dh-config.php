<?php 
ini_set('memory_limit','1024M');
/* This file specifies the configuration constants for the recruitment application */
/* please modify values accordingly */

$config = array();

//Organization's Full name e.g. Tulabyte Solutions
$config['fullname'] = 'Drinkhub Application';

//Website's Name/Title
$config['title'] = 'Drinkhub App';

//Organization's Short name e.g. Tulabyte
$config['shortname'] = 'Drinkhub';

//Sender Email - email that will appear as sender email in outgoing notifications
//This email must exist on the server
// $config['sender'] = 'sender@tejuoshoshoppingcomplex.com';

//Notification Email - email that will receive admin notifications
// $config['notify'] = 'admin@tejuoshoshoppingcomplex.com';

//Site Root URL - e.g. http://tejuoshoshoppingcomplex.com/appraisal.
//This is the URL for the website.
//***MUST END WITH A '/'
// $config['url'] = 'http://appraisals.tejuoshoshoppingcomplex.com/';

/*// Default Appraisal Year to use:
//appraisal year computed based on month we are in, jan - march will take previous year while others take current year.
$current_month = date("n"); //echo("$current_month<br>");
$current_year = date("Y"); //echo("$current_year<br>");
$config['year'] = $current_month <= 3 ? $current_year - 1 : $current_year;*/