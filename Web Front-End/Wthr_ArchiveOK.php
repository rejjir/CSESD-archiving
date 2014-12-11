<?php include "includeCheck.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head> 
<?php include $headerInfo; ?>
<title>Weather Archive: <?= shortDateFormat($queryDate) ?> </title>
</head> 

<?php
// connect to MySql database
include $sqlConnect;

// Full report of a single day uses both database tables
// Otherwise, only one is used

if ($type == "day" || $type == "full")
{
// Fetch  daily-data entry from database
$query = "SELECT * FROM $dayTbl WHERE $dayKey = '$queryDate'"; 
$result2 = mysql_query($query) or die(mysql_error());
$num2 = 1;
}

if ($type == "qh" || $type == "full")
{
$nextDay = plusOneDay($queryDate);
// Fetch  qh-data entries from database
$query = "SELECT * FROM $qhTbl 
WHERE $qhKey BETWEEN '$queryDate' AND '$nextDay'
ORDER BY $qhKey";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_numrows($result);
}

?>
<body><div>
<?php include $banner; ?>
<?php 
$captionDate = dateFormat($queryDate);
if ($type == "day")
include $dayPrint; 
else if ($type == "qh")
include $qhPrint;
else if ($type == "full")
{
include $daySummary;
$mainSel = 1;
include $qhPrint;
}
 ?>
<br />
<?php include $dateSelect; ?>
<?php include $checkW3; ?>
</div></body> 
</html> 
