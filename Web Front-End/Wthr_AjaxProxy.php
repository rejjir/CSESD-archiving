<?php
header('Content-Type: text/xml');
$configLoc = "Wthr_Config.php"; // This is where the .ini file is located

// Import variables from .ini file
$includeCheck = 1;
include $configLoc;

// connect to MySql database
include $sqlConnect;

// Fetch last qh-data entry from database
$query = "SELECT * FROM $qhTbl ORDER BY $qhKey DESC LIMIT 1"; 
$result = mysql_query($query) or die(mysql_error());
// Last qh-data entry is contained in an array
$qhRead = mysql_fetch_row($result) or die(mysql_error());

// Display time of reading
$qhDate = dateFormat($qhRead[0]) 
. " at " . timeFormat($qhRead[0]);

$time1 = time();
$time2 = strtotime($qhRead[0] . " +16 minutes +5 seconds"); 
$refresh = 1000 * ($time2 - $time1);
// refresh at 0, 15, 30, and 45 minutes past the hour
// plus an arbitrary offset to make sure the next reading is in

?>
<readingUpdate>
	<time><?= $qhDate ?></time>
	<temp><?= $qhRead[$air_temp] ?></temp>
	<wind><?= $qhRead[$wind_spd] ?> km/h : <?= windDir($qhRead[$wind_dir]) ?></wind>
	<humid><?= $qhRead[$rel_hum] ?> % : <?= $qhRead[$dew_pt] ?></humid>
	<pres><?= $qhRead[$baro_pres] ?></pres>
	<rad><?= $qhRead[$solar_w_avg] ?></rad>
	<refresh><?= $refresh ?></refresh>
</readingUpdate>
