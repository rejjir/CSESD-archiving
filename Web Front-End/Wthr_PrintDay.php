<?php include "includeCheck.php"; 

// These are the variables from the select interface
$air_temp_max_sel =$_POST['air_temp_max_sel'];
$air_temp_min_sel =$_POST['air_temp_min_sel'];
$air_temp_avg_sel =$_POST['air_temp_avg_sel'];
$ground_temp_max_sel =$_POST['ground_temp_max_sel'];
$ground_temp_min_sel =$_POST['ground_temp_min_sel'];
$ground_temp_avg_sel =$_POST['ground_temp_avg_sel'];
$floor_temp_max_sel =$_POST['floor_temp_max_sel'];
$floor_temp_min_sel =$_POST['floor_temp_min_sel'];
$floor_temp_avg_sel =$_POST['floor_temp_avg_sel'];
$underground_temp_max_sel =$_POST['underground_temp_max_sel'];
$underground_temp_min_sel =$_POST['underground_temp_min_sel'];
$underground_temp_avg_sel =$_POST['underground_temp_avg_sel'];
$baro_pres_max_sel =$_POST['baro_pres_max_sel'];
$baro_pres_min_sel =$_POST['baro_pres_min_sel'];
$baro_pres_avg_sel =$_POST['baro_pres_avg_sel'];
$rel_hum_max_sel =$_POST['rel_hum_max_sel'];
$rel_hum_min_sel =$_POST['rel_hum_min_sel'];
$wind_spd_max_sel =$_POST['wind_spd_max_sel'];
$rain_mm_tot_sel=$_POST['rain_mm_tot_sel'];
$solar_w_max_sel =$_POST['solar_w_max_sel'];

// All the data will be output into a table
// based on which variables were selected
?>

<table id="dayTable">
    <caption>Weather Report for <?= $captionDate?></caption>
	<tr id="dayHead">
	<td>Date</td>
	<?php
	if ($air_temp_max_sel == 1)
	echo "<td>Air Temperature High</td>";
	if ($air_temp_min_sel == 1)
	echo "<td>Air Temperature Low</td>";
	if ($air_temp_avg_sel == 1)
	echo "<td>Average Air Temperature: </td>";
	if ($floor_temp_max_sel == 1)
	echo "<td>Floor Temperature High</td>";
	if ($floor_temp_min_sel == 1)
	echo "<td>Floor Temperature Low</td>";
	if ($floor_temp_avg_sel == 1)
	echo "<td>Average Floor Temperature</td>";
	if ($ground_temp_max_sel == 1)
	echo "<td>Ground Temperature High</td>";
	if ($ground_temp_min_sel == 1)
	echo "<td>Ground Temperature Low</td>";
	if ($ground_temp_avg_sel == 1)
	echo "<td>Average Ground Temperature</td>";
	if ($underground_temp_max_sel == 1)
	echo "<td>Underground Temperature High</td>";
	if ($underground_temp_min_sel == 1)
	echo "<td>Underground Temperature Low</td>";
	if ($underground_temp_avg_sel == 1)
	echo "<td>Average Underground Temperature</td>";
	if ($baro_pres_max_sel == 1)
	echo "<td>Barometric Pressure High</td>";
	if ($baro_pres_min_sel == 1)
	echo "<td>Barometric Pressure Low</td>";
	if ($baro_pres_avg_sel == 1)
	echo "<td>Average Barometric Pressure</td>";
	if ($rel_hum_max_sel == 1)
	echo "<td>Relative Humidity High</td>";
	if ($rel_hum_min_sel == 1)
	echo "<td>Relative Humidity Low</td>";
	if ($wind_spd_max_sel == 1)
	echo "<td>Max Wind Speed</td>";
	if ($rain_mm_tot_sel == 1)
	echo "<td>Total Precipitation</td>";
	if ($solar_w_max_sel == 1)
	echo "<td>Max Incoming Radiation</td>";
	?>
	</tr>
	<?php
		for ($i = 0; $i < $num2; $i += 1)
		{
			$dayRead = mysql_fetch_row($result2) or die(mysql_error());
			echo "<tr><td>" . dayOnly($dayRead[0]) . "</td>";
			if ($air_temp_max_sel == 1)
			echo "<td>$dayRead[$air_temp_max]°C at " . timeFormat($dayRead[$air_temp_tmx]) . "</td>";
			if ($air_temp_min_sel == 1)
			echo "<td>$dayRead[$air_temp_min]°C at " . timeFormat($dayRead[$air_temp_tmn]) . "</td>";
			if ($air_temp_avg_sel == 1)
			echo "<td>$dayRead[$air_temp_avg]°C</td>";
			if ($floor_temp_max_sel == 1)
			echo "<td>$dayRead[$floor_temp_max]°C at " . timeFormat($dayRead[$floor_temp_tmx]) . "</td>";
			if ($floor_temp_min_sel == 1)
			echo "<td>$dayRead[$floor_temp_min]°C at " . timeFormat($dayRead[$floor_temp_tmn]) . "</td>";
			if ($floor_temp_avg_sel == 1)
			echo "<td>$dayRead[$floor_temp_avg]°C</td>";
			if ($ground_temp_max_sel == 1)
			echo "<td>$dayRead[$ground_temp_max]°C at " . timeFormat($dayRead[$ground_temp_tmx]) . "</td>";
			if ($ground_temp_min_sel == 1)
			echo "<td>$dayRead[$ground_temp_min]°C at " . timeFormat($dayRead[$ground_temp_tmn]) . "</td>";
			if ($ground_temp_avg_sel == 1)
			echo "<td>$dayRead[$ground_temp_avg]°C</td>";
			if ($underground_temp_max_sel == 1)
			echo "<td>$dayRead[$underground_temp_max]°C at " . timeFormat($dayRead[$underground_temp_tmx]) . "</td>";
			if ($underground_temp_min_sel == 1)
			echo "<td>$dayRead[$underground_temp_min]°C at " . timeFormat($dayRead[$underground_temp_tmn]) . "</td>";
			if ($underground_temp_avg_sel == 1)
			echo "<td>$dayRead[$underground_temp_avg]°C</td>";
			if ($baro_pres_max_sel == 1)
			echo "<td>$dayRead[$baro_pres_max] kPa at " . timeFormat($dayRead[$baro_pres_tmx]) . "</td>";
			if ($baro_pres_min_sel == 1)
			echo "<td>$dayRead[$baro_pres_min] kPa at " . timeFormat($dayRead[$baro_pres_tmn]) . "</td>";
			if ($baro_pres_avg_sel == 1)
			echo "<td>$dayRead[$baro_pres_avg] kPa</td>";
			if ($rel_hum_max_sel == 1)
			echo "<td>$dayRead[$rel_hum_max]% at " . timeFormat($dayRead[$rel_hum_tmx]) . "</td>";
			if ($rel_hum_min_sel == 1)
			echo "<td>$dayRead[$rel_hum_min]% at " . timeFormat($dayRead[$rel_hum_tmn]) . "</td>";
			if ($wind_spd_max_sel == 1)
			echo "<td>$dayRead[$wind_spd_max]km/h at " . timeFormat($dayRead[$wind_spd_tmx]) . "</td>";
			if ($rain_mm_tot_sel == 1)
			echo "<td>$dayRead[$rain_mm_tot] mm</td>";
			if ($solar_w_max_sel == 1)
			echo "<td>$dayRead[$solar_w_max]W/m<sup>2</sup> at " . timeFormat($dayRead[$solar_w_tmx]) . "</td>";
			echo "</tr>";
		}
	?>
</table>
