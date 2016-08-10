<?php

/* Database config */

$db_host		= 'localhost';
$db_user		= 'yasir_kamboh';
$db_pass		= 'k@mb0h@LC2014';
$db_database	= 'yasir_b4thewedding'; 

/* End config */


$link = @mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_set_charset('utf8');
mysql_select_db($db_database,$link);

?>