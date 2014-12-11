<?php include "includeCheck.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head> 
<?php include $headerInfo; ?>
<title>Weather Archive: 
<?= shortDateFormat($queryDate) ?> to <?= shortDateFormat($queryDate2) ?> </title>
</head> 

<?php
// connect to MySql database
include $sqlConnect;

if ($type == "day")
{
// Fetch daily-data from database
$query = "SELECT * FROM $dayTbl WHERE $dayKey BETWEEN '$queryDate' AND '$queryDate2'
ORDER BY $dayKey"; 
$result2 = mysql_query($query) or die(mysql_error());
$num2 = mysql_numrows($result2);
}

else
{
$fixDayCount = plusOneDay($queryDate2);
// Fetch qh-data entries from database
$query = "SELECT * FROM $qhTbl 
WHERE $qhKey BETWEEN '$queryDate' AND '$fixDayCount'
ORDER BY $qhKey";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_numrows($result);
}

?>
<body><div>
<?php include $banner; ?>
<?php 
$captionDate = shortDateFormat($queryDate) . " to " . shortDateFormat($queryDate2);

if ($type == "day")
include $dayPrint; 
else if ($type == "qh")
include $qhPrint;
?>
<br />
<?php include $dateSelect; ?>
<?php include $checkW3; ?>
</div></body> 
</html> 
