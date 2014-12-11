<?php
$configLoc = "Wthr_Config.php"; // This is where the .ini file is located

// Import variables from .ini file
$includeCheck = 1;
include $configLoc;


// These are the input variables, if they were submitted
$type = $_POST['type'];
$rangeSel=$_POST['rangeSel'];
$var=$_POST['var'];

$month = $_POST['month'];
$dt = $_POST['day'];
$year = $_POST['year'];
$queryDate = "$year-$month-$dt";


// If no input was submitted or input is invalid, then show default page

if(!checkdate($month,$dt,$year))
include $graphFail;

else if($queryDate < $firstValid)
include $graphFail;

else if($type == "day" && $queryDate >= date("Y-m-d"))
include $graphFail;

else if($queryDate > date("Y-m-d"))
include $graphFail;

else if ($rangeSel == "yes")
{
	$month2 = $_POST['month2'];
	$dt2 = $_POST['day2'];
	$year2 = $_POST['year2'];
	$queryDate2 = "$year2-$month2-$dt2";
	if(!checkdate($month2,$dt2,$year2))
	include $graphFail;

	else if($queryDate2 < $firstValid)
	include $graphFail;

	else if($type == "day" && $queryDate2 >= date("Y-m-d"))
	include $graphFail;

	else if($queryDate2 > date("Y-m-d"))
	include $graphFail;

	else if($queryDate >= $queryDate2)
	include $graphFail;

	// generate data to pass to graph
	else 
	{
		$parameters = parameterGen($rangeSel, $type, $queryDate, $queryDate2, $var);
		include $graphRangeOK;
	}
}

// Generate date to pass to graph
else 
{
	$parameters = parameterGen($rangeSel, $type, $queryDate, 0, $var);
	include $graphOK;
}

function parameterGen($range, $type, $d1, $d2, $var)
{
// Generate date to pass to graph
$par = "?range=$range&type=$type&date1=$d1&date2=$d2&var=$var";
return $par;
}
?>
