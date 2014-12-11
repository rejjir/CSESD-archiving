<?php include "includeCheck.php";

// connect to MySql database
mysql_connect($sqlServ, $sqlName, $sqlPass) or die(mysql_error());
mysql_select_db($sqlDb) or die(mysql_error());
?>
