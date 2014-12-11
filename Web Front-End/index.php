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
<script type="text/javascript" src="Wthr_ReadUpdate.js"> </script>
<title> Weather </title>
</head> 


<?php
// connect to MySql database
include $sqlConnect;

// Fetch last daily-data entry from database
$query = "SELECT * FROM $dayTbl ORDER BY $dayKey DESC LIMIT 1"; 
$result = mysql_query($query) or die(mysql_error());
// Last daily-data entry is contained in an array
$dayRead = mysql_fetch_row($result) or die(mysql_error());

// Display date
$dayDate = dateFormat($dayRead[0]);

?>
<body>
<?php include $banner; ?>
<table class="mainWrap">
<tr class="inner"><td>
	<table class="index">
	<tr>
      <td colspan="4" class="subTitle">
        Latest Reading: <br /> <span id="time"></span>
      </td></tr>

      <tr>
        <td>Temperature: </td>
        <td><span id="temp"></span>°C</td>
      </tr>
     
      <tr>
        <td>Wind Speed and Direction: </td>
        <td><span id="wind"></span></td>
      </tr>

      <tr>
        <td>Relative Humidity/Dew Point: </td>
        <td><span id="humid"></span>°C </td>
      </tr>

        <tr>
        <td>Barometric Pressure:</td>
        <td><span id="pres"></span> kPa</td>
      </tr>

        <tr>
        <td>Incoming Radiation:</td>
        <td><span id="rad"></span> W/m<sup>2</sup></td>
      </tr>

	<tr>
      <td colspan="2" class="subTitle">
        Yesterday's Stats: <?= $dayDate ?>
      </td>
	</tr>
      <tr>
        <td>Temperature High/Low: </td>
        <td><?= $dayRead[$air_temp_max] ?>°C/<?= $dayRead[$air_temp_min] ?>°C</td>
      </tr>

      <tr>
        <td>Average Temperature: </td>
        <td><?= $dayRead[$air_temp_avg] ?>°C</td>
      </tr>

      <tr>
        <td>Total Precipitation: </td>
        <td><?= $dayRead[$rain_mm_tot] ?> mm</td>
      </tr>

      <tr>
        <td>Average Barometric Pressure: </td>
        <td><?= $dayRead[$baro_pres_avg] ?> kPa</td>
      </tr>

      <tr>
        <td>Barometric Pressure High/Low: </td>
        <td><?= $dayRead[$baro_pres_max] ?> kPa/<?= $dayRead[$baro_pres_min] ?> kPa</td>
      </tr>
      <tr>
        <td>Max Wind Speed: </td>
        <td><?= $dayRead[$wind_spd_max] ?> km/h at <?= timeFormat($dayRead[$wind_spd_tmx]) ?></td>
      </tr>

      <tr>
        <td>Total Incoming Radiation: </td>
        <td><?= $dayRead[$solar_w_d_avg] * 3.6 * 24 ?> kJ/m<sup>2</sup></td>
      </tr>

      <tr>
        <td>Max Incoming Radiation: </td>
        <td><?= $dayRead[$solar_w_max] ?> W/m<sup>2</sup> at <?= timeFormat($dayRead[$solar_w_tmx]) ?></td>
      </tr>
    </table>
</td><td>
<img src="Wthr_IndexGraph.php" alt="Graph" />
<p class="links">
<a href="detailedrecent.php">Detailed Report of Recent Weather (last 3 hours)</a><br />
<a href="yesterday.php">Detailed Report on Yesterday's Weather</a><br />
<a href="graphpage.php">Weather Data Plotting</a><br />
<a href="archive.php">Weather Archive</a><br />
<a href="about.php">Station Information</a></p>
</td></tr></table>
<?php include $checkW3; ?>
</body> 
</html> 
