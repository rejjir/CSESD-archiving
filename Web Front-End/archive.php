<?php
$configLoc = "Wthr_Config.php"; // This is where the .ini file is located

// Import variables from .ini file
$includeCheck = 1;
include $configLoc;


// These are the input variables, if they were submitted
$rangeSel=$_POST['rangeSel'];
$type = $_POST['type'];
$csv = $_POST['csv'];

$month = $_POST['month'];
$dt = $_POST['day'];
$year = $_POST['year'];
$queryDate = "$year-$month-$dt";


// If no input was submitted or input is invalid, then show default page

if(!checkdate($month,$dt,$year))
include $archiveFail;

else if($queryDate < $firstValid)
include $archiveFail;

else if($type == "day" && $queryDate >= date("Y-m-d"))
include $archiveFail;

else if($queryDate > date("Y-m-d"))
include $archiveFail;

else if ($rangeSel == "yes")
{
	$month2 = $_POST['month2'];
	$dt2 = $_POST['day2'];
	$year2 = $_POST['year2'];
	$queryDate2 = "$year2-$month2-$dt2";

	if(!checkdate($month2,$dt2,$year2))
	include $archiveFail;

	else if($queryDate2 < $firstValid)
	include $archiveFail;
	
	else if($type == "day" && $queryDate2 >= date("Y-m-d"))
	include $archiveFail;

	else if($queryDate2 > date("Y-m-d"))
	include $archiveFail;

	else if($queryDate >= $queryDate2)
	include $archiveFail;
	

	// If input is valid, create CSV or Table to display

	else if ($csv == 1)
	include $archiveCSV; 

	else include $archiveRangeOK;
}

// If input is valid, create CSV or Table to display

else if ($csv == 1)
include $archiveCSV;

else include $archiveOK;
?>
