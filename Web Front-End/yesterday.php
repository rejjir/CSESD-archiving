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
<title> Yesterday's Weather </title>
</head> 

<?php
// connect to MySql database
include $sqlConnect;

$today = date("Y-m-d");
$yesterday = minusOneDay(date());

// Fetch all of yesterday's qh-data entries from database
$query = "SELECT * FROM $qhTbl 
WHERE $qhKey BETWEEN '$yesterday' AND '$today'
ORDER BY $qhKey";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_numrows($result);

// Fetch last daily-data entry from database
$query = "SELECT * FROM $dayTbl ORDER BY $dayKey DESC LIMIT 1"; 
// Last daily-data entry is contained in an array
$result2 = mysql_query($query) or die(mysql_error());

?>
<body><div>
<?php 
include $banner; 
include $daySummary;
$captionDate = dateFormat($yesterday);
$mainSel = 1;
include $qhPrint; 
?>
<?php include $checkW3; ?>
</div></body> 
</html> 
