<?php include "includeCheck.php"; 

// This page returns a CSV file with the data selected
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=weatherdata.csv");
header("Pragma: no-cache");
header("Expires: 0");

include $sqlConnect;

if ($type == "qh")
{
	if ($rangeSel == "yes") // Sql query is different between single-day vs date-range
	{
		$fixDayCount = plusOneDay($queryDate2);
		// Fetch qh-data entries from database
		$query = "SELECT * FROM $qhTbl 
		WHERE $qhKey BETWEEN '$queryDate' AND '$fixDayCount'
		ORDER BY $qhKey";
		$result = mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);
	}
	
	else
	{
		$nextDay = plusOneDay($queryDate);
		// Fetch  qh-data entries from database
		$query = "SELECT * FROM $qhTbl 
		WHERE $qhKey BETWEEN '$queryDate' AND '$nextDay'
		ORDER BY $qhKey";
		$result = mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);
	}
	
	// These are the variables from the select interface
	$tempSel=$_POST['tempSel'];
	$windSel=$_POST['windSel'];
	$precSel=$_POST['precSel'];
	$humSel=$_POST['humSel'];
	$radSel=$_POST['radSel'];
	$presSel=$_POST['presSel'];
	$flTempSel=$_POST['flTempSel'];
	$grTempSel=$_POST['grTempSel'];
	$unTempSel=$_POST['unTempSel'];
	
	// Headings are stored in this array
	$titles = array("#", "Time-Sort","Timestamp");
	
	if ($mainSel == 1 || $tempSel == 1)
	array_push($titles, "Air Temperature");
	if ($mainSel == 1 || $windSel == 1)
	{
	array_push($titles, "Wind Speed");
	array_push($titles, "Wind Direction");
	}
	if ($mainSel == 1 || $precSel == 1)
	array_push($titles, "Precipitation");
	if ($mainSel == 1 || $humSel == 1)
	array_push($titles, "Relative Humidity");
	if ($mainSel == 1 || $radSel == 1)
	array_push($titles, "Incoming Radiation");
	if ($mainSel == 1 || $presSel == 1)
	array_push($titles, "Barometric Pressure");
	if ($mainSel == 1 || $flTempSel == 1)
	array_push($titles, "Floor Temperature");
	if ($mainSel == 1 || $grTempSel == 1)
	array_push($titles, "Ground Temperature");
	if ($mainSel == 1 || $unTempSel == 1)
	array_push($titles, "Underground Temperature");
	
	// All the data is stored in arrays
	// based on which variables were selected
	// Data-arrays are placed in this array of arrays         #INCEPTION
	// which will be passed to the CSV generator
	$data = array($titles);
	
	for ($i = 0; $i < $num; $i += 1)
	{
		$qhRead = mysql_fetch_row($result) or die(mysql_error());
		$entry = array($i, timeSort($qhRead[0]),$qhRead[0]);
	
		if ($mainSel == 1 || $tempSel == 1)
		array_push($entry, $qhRead[9]);
		if ($mainSel == 1 || $windSel == 1)
		{
		array_push($entry, $qhRead[3]);
		array_push($entry, $qhRead[4]);
		}
		if ($mainSel == 1 || $precSel == 1)
		array_push($entry, $qhRead[7]);
		if ($mainSel == 1 || $humSel == 1)
		array_push($entry, $qhRead[8]);
		if ($mainSel == 1 || $radSel == 1)
		array_push($entry, $qhRead[5]);
		if ($mainSel == 1 || $presSel == 1)
		array_push($entry, $qhRead[14]);
		if ($mainSel == 1 || $flTempSel == 1)
		array_push($entry, $qhRead[15]);
		if ($mainSel == 1 || $grTempSel == 1)
		array_push($entry, $qhRead[16]);
		if ($mainSel == 1 || $unTempSel == 1)
		array_push($entry, $qhRead[17]);

		array_push($data, $entry);
	}
}

else
{
	if ($rangeSel == "yes") // Sql query is different between single-day vs date-range
	{
		// Fetch daily-data from database
		$query = "SELECT * FROM $dayTbl WHERE $dayKey BETWEEN '$queryDate' AND '$queryDate2'
		ORDER BY $dayKey"; 
		$result2 = mysql_query($query) or die(mysql_error());
		$num2 = mysql_numrows($result2);
	}

	else
	{
		// Fetch  daily-data entry from database
		$query = "SELECT * FROM $dayTbl WHERE $dayKey = '$queryDate'"; 
		$result2 = mysql_query($query) or die(mysql_error());
		$num2 = 1;
	}

	// These are the variables from the select interface
	$air_temp_max =$_POST['air_temp_max'];
	$air_temp_min =$_POST['air_temp_min'];
	$air_temp_avg =$_POST['air_temp_avg'];
	$ground_temp_max =$_POST['ground_temp_max'];
	$ground_temp_min =$_POST['ground_temp_min'];
	$ground_temp_avg =$_POST['ground_temp_avg'];
	$floor_temp_max =$_POST['floor_temp_max'];
	$floor_temp_min =$_POST['floor_temp_min'];
	$floor_temp_avg =$_POST['floor_temp_avg'];
	$underground_temp_max =$_POST['underground_temp_max'];
	$underground_temp_min =$_POST['underground_temp_min'];
	$underground_temp_avg =$_POST['underground_temp_avg'];
	$baro_pres_max =$_POST['baro_pres_max'];
	$baro_pres_min =$_POST['baro_pres_min'];
	$baro_pres_avg =$_POST['baro_pres_avg'];
	$rel_hum_max =$_POST['rel_hum_max'];
	$rel_hum_min =$_POST['rel_hum_min'];
	$wind_spd_max =$_POST['wind_spd_max'];
	$rain_mm_tot=$_POST['rain_mm_tot'];
	$solar_w_max =$_POST['solar_w_max'];

	// Headings are stored in this array
	$titles = array("#", "Date-Sort", "Date");
	
	if ($air_temp_max == 1)
	array_push($titles, "Air Temperature High");
	if ($air_temp_min == 1)
	array_push($titles, "Air Temperature Low");
	if ($air_temp_avg == 1)
	array_push($titles, "Average Air Temperature");
	if ($floor_temp_max == 1)
	array_push($titles, "Floor Temperature High");
	if ($floor_temp_min == 1)
	array_push($titles, "Floor Temperature Low");
	if ($floor_temp_avg == 1)
	array_push($titles, "Average Floor Temperature");
	if ($ground_temp_max == 1)
	array_push($titles, "Ground Temperature High");
	if ($ground_temp_min == 1)
	array_push($titles, "Ground Temperature Low");
	if ($ground_temp_avg == 1)
	array_push($titles, "Average Ground Temperature");
	if ($underground_temp_max == 1)
	array_push($titles, "Underground Temperature High");
	if ($underground_temp_min == 1)
	array_push($titles, "Underground Temperature Low");
	if ($underground_temp_avg == 1)
	array_push($titles, "Average Underground Temperature");
	if ($baro_pres_max == 1)
	array_push($titles, "Barometric Pressure High");
	if ($baro_pres_min == 1)
	array_push($titles, "Barometric Pressure Low");
	if ($baro_pres_avg == 1)
	array_push($titles, "Average Barometric Pressure");
	if ($rel_hum_max == 1)
	array_push($titles, "Relative Humidity High");
	if ($rel_hum_min == 1)
	array_push($titles, "Relative Humidity Low");
	if ($wind_spd_max == 1)
	array_push($titles, "Max Wind Speed");
	if ($rain_mm_tot == 1)
	array_push($titles, "Total Precipitation");
	if ($solar_w_max == 1)
	array_push($titles, "Max Incoming Radiation");


	// All the data is stored in arrays
	// based on which variables were selected
	// Data-arrays are placed in this array of arrays         #INCEPTION
	// which will be passed to the CSV generator
	$data = array($titles);

	for ($i = 0; $i < $num2; $i += 1)
	{
		$dayRead = mysql_fetch_row($result2) or die(mysql_error());
		$entry = array($i, dateSort($dayRead[0]),$dayRead[0]);
	
		if ($air_temp_max == 1)
		array_push($entry, $dayRead[20]);
		if ($air_temp_min == 1)
		array_push($entry, $dayRead[22]);
			if ($air_temp_avg == 1)
		array_push($entry, $dayRead[52]);
			if ($floor_temp_max == 1)
		array_push($entry, $dayRead[4]);
			if ($floor_temp_min == 1)
		array_push($entry, $dayRead[6]);
			if ($floor_temp_avg == 1)
		array_push($entry, $dayRead[34]);
			if ($ground_temp_max == 1)
		array_push($entry, $dayRead[8]);
			if ($ground_temp_min == 1)
		array_push($entry, $dayRead[10]);
			if ($ground_temp_avg == 1)
		array_push($entry, $dayRead[35]);
			if ($underground_temp_max == 1)
		array_push($entry, $dayRead[12]);
			if ($underground_temp_min == 1)
		array_push($entry, $dayRead[14]);
			if ($underground_temp_avg == 1)
		array_push($entry, $dayRead[36]);
			if ($baro_pres_max == 1)
		array_push($entry, $dayRead[48]);
			if ($baro_pres_min == 1)
		array_push($entry, $dayRead[50]);
			if ($baro_pres_avg == 1)
		array_push($entry, $dayRead[54]);
			if ($rel_hum_max == 1)
		array_push($entry, $dayRead[24]);
			if ($rel_hum_min == 1)
		array_push($entry, $dayRead[26]);
			if ($wind_spd_max == 1)
		array_push($entry, $dayRead[18]);
			if ($rain_mm_tot == 1)
		array_push($entry, $dayRead[3]);
			if ($solar_w_max == 1)
		array_push($entry, $dayRead[16]);

		array_push($data, $entry);
	}
}

// Create the CSV
outputCSV($data);

// This function creates the CSV
function outputCSV($data) 
{
    $outstream = fopen("php://output", "w");
    function __outputCSV(&$vals, $key, $filehandler) 
	{
        fputcsv($filehandler, $vals);
    }
    array_walk($data, "__outputCSV", $outstream);
    fclose($outstream);
}
?>
