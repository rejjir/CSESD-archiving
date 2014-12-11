<?php
$configLoc = "Wthr_Config.php"; // This is where the .ini file is located

// Import variables from .ini file
$includeCheck = 1;
include $configLoc;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head> 
<?php include $headerInfo; ?>
<title> Recent Weather </title>
</head> 

<?php
// connect to MySql database
include $sqlConnect;

// Fetch last 3 hours qh-data entry from database
$query = "SELECT * FROM $qhTbl ORDER BY $qhKey DESC LIMIT 13"; 
$result = mysql_query($query) or die(mysql_error());
$num=mysql_numrows($result);

$getRes = mysql_query($query) or die(mysql_error());
$getRow = mysql_fetch_row($getRes) or die(mysql_error());

// Display time of reading
$time1 = timeFormat($getRow[0]);

for ($i=0; $i < 11; $i++) // Skip to last entry
mysql_fetch_row($getRes);

$getRow = mysql_fetch_row($getRes) or die(mysql_error());

// Display time of reading
$time2 = dateFormat($getRow[0]) 
. " from " . timeFormat($getRow[0]);
?>
<body><div>
<?php include $banner; ?>
<?php 
$captionDate = "$time2 to $time1";
$mainSel = 1;
include $qhPrint; 
?>
<?php include $checkW3; ?>
</div></body> 
</html> 
