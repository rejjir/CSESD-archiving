<?php include "includeCheck.php"; 

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

// All the data will be output into a table
// based on which variables were selected
?>

<table id="qhTable">
    <caption>Quarter-Hourly Readings for <?= $captionDate?></caption>
	<tr id="qhHead">
	<td>Time</td>
	<?php
	if ($mainSel == 1 || $tempSel == 1)
	echo "<td>Air Temperature</td>";
	if ($mainSel == 1 || $windSel == 1)
	echo "<td>Wind Speed/ Direction</td>";
	if ($mainSel == 1 || $precSel == 1)
	echo "<td>Precipitation</td>";
	if ($mainSel == 1 || $humSel == 1)
	echo "<td>Relative Humidity/ Dew Point</td>";
	if ($mainSel == 1 || $radSel == 1)
	echo "<td>Incoming Radiation</td>";
	if ($mainSel == 1 || $presSel == 1)
	echo "<td>Barometric Pressure</td>";
	if ($mainSel == 1 || $flTempSel == 1)
	echo "<td>Floor Temperature</td>";
	if ($mainSel == 1 || $grTempSel == 1)
	echo "<td>Ground Temperature</td>";
	if ($mainSel == 1 || $unTempSel == 1)
	echo "<td>Underground Temperature</td>";
	?>
	</tr>
	<?php
		for ($i = 0; $i < $num; $i += 1)
		{
			$qhRead = mysql_fetch_row($result) or die(mysql_error());
			if ($rangeSel == "yes")
			echo "<tr><td>" . dayOnly($qhRead[0]) . timeFormat($qhRead[0]) . "</td>";
			else
			echo "<tr><td>" . timeFormat($qhRead[0]) . "</td>";
			if ($mainSel == 1 || $tempSel == 1)
			echo "<td>$qhRead[$air_temp]°C</td>";
			if ($mainSel == 1 || $windSel == 1)
			echo "<td>$qhRead[$wind_spd] km/h : " . windDir($qhRead[$wind_dir]) . "</td>";
			if ($mainSel == 1 || $precSel == 1)
			echo "<td>$qhRead[$rain_mm] mm</td>";
			if ($mainSel == 1 || $humSel == 1)
			echo "<td>$qhRead[$rel_hum]% : $qhRead[$dew_pt]°C</td>";
			if ($mainSel == 1 || $radSel == 1)
			echo "<td>$qhRead[$solar_w_avg] W/m<sup>2</sup></td>";
			if ($mainSel == 1 || $presSel == 1)
			echo "<td>$qhRead[$baro_pres] kPa</td>";
			if ($mainSel == 1 || $flTempSel == 1)
			echo "<td>$qhRead[$floor_temp]°C</td>";
			if ($mainSel == 1 || $grTempSel == 1)
			echo "<td>$qhRead[$ground_temp]°C</td>";
			if ($mainSel == 1 || $unTempSel == 1)
			echo "<td>$qhRead[$underground_temp]°C</td>";
			echo "</tr>";
		}
	?>
</table>
