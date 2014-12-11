<?php include "includeCheck.php"; 
$dayRead = mysql_fetch_row($result2) or die(mysql_error());
?>

<table>
<caption>Daily Readings for <?= dateFormat($dayRead[0])?></caption>
<tr class="inner"><td><table class="innerTable">
    <tr>
        <td>Average Air Temperature: </td>
        <td><?= $dayRead[$air_temp_avg] ?>°C</td>
    </tr>

	<tr>
        <td>Average Floor Temperature: </td>
        <td><?= $dayRead[$floor_temp_avg] ?>°C</td>
    </tr>

	<tr>
        <td>Average Ground Temperature: </td>
        <td><?= $dayRead[$ground_temp_avg] ?>°C</td>
    </tr>

	<tr>
        <td>Average Underground Temperature: </td>
        <td><?= $dayRead[$underground_temp_avg] ?>°C</td>
    </tr>

	<tr>
        <td>Total Precipitation: </td>
        <td><?= $dayRead[$rain_mm_tot] ?> mm</td>
    </tr>

    <tr>
        <td>Total Incoming Radiation: </td>
        <td><?= $dayRead[$solar_w_d_avg] * 3.6 * 24 ?> kJ/m<sup>2</sup></td>
    </tr>

    <tr>
        <td>Average Barometric Pressure: </td>
        <td><?= $dayRead[$baro_pres_avg] ?> kPa</td>
    </tr>
</table></td>
<td><table class="innerTable">

	<tr>
        <td>Air Temperature High: </td>
        <td><?= $dayRead[$air_temp_max] ?>°C at <?= timeFormat($dayRead[$air_temp_tmx]) ?></td>
    </tr>

	<tr>
        <td>Air Temperature Low: </td>
        <td><?= $dayRead[$air_temp_min] ?>°C at <?= timeFormat($dayRead[$air_temp_tmn]) ?></td>
    </tr>

    <tr>
        <td>Floor Temperature High: </td>
        <td><?= $dayRead[$floor_temp_max] ?>°C at <?= timeFormat($dayRead[$floor_temp_tmx]) ?></td>
    </tr>

	<tr>
        <td>Floor Temperature Low: </td>
        <td><?= $dayRead[$floor_temp_min] ?>°C at <?= timeFormat($dayRead[$floor_temp_tmn]) ?></td>
    </tr>

    <tr>
        <td>Ground Temperature High: </td>
        <td><?= $dayRead[$ground_temp_max] ?>°C at <?= timeFormat($dayRead[$ground_temp_tmx]) ?></td>
    </tr>

	<tr>
        <td>Ground Temperature Low: </td>
        <td><?= $dayRead[$ground_temp_min] ?>°C at <?= timeFormat($dayRead[$ground_temp_tmn]) ?></td>
    </tr>   

    <tr>
        <td>Underground Temperature High: </td>
        <td><?= $dayRead[$underground_temp_max] ?>°C at <?= timeFormat($dayRead[$underground_temp_tmx]) ?></td>
    </tr>

	<tr>
        <td>Underground Temperature Low: </td>
        <td><?= $dayRead[$underground_temp_min] ?>°C at <?= timeFormat($dayRead[$underground_temp_tmn]) ?></td>
    </tr>

</table></td>
<td><table class="innerTable">

    <tr>
        <td>Barometric Pressure High: </td>
        <td><?= $dayRead[$baro_pres_max] ?> kPa at <?= timeFormat($dayRead[$baro_pres_tmx]) ?></td>
    </tr>

	<tr>
        <td>Barometric Pressure Low: </td>
        <td><?= $dayRead[$baro_pres_min] ?> kPa at <?= timeFormat($dayRead[$baro_pres_tmn]) ?></td>
    </tr>

    <tr>
        <td>Relative Humidity High: </td>
        <td><?= $dayRead[$rel_hum_max] ?>% at <?= timeFormat($dayRead[$rel_hum_tmx]) ?></td>
    </tr>

	<tr>
        <td>Relative Humidity Low: </td>
        <td><?= $dayRead[$rel_hum_min] ?>% at <?= timeFormat($dayRead[$rel_hum_tmn]) ?></td>
    </tr>

    <tr>
        <td>Max Wind Speed: </td>
        <td><?= $dayRead[$wind_spd_max] ?> km/h at <?= timeFormat($dayRead[$wind_spd_tmx]) ?></td>
    </tr>

    <tr>
        <td>Max Incoming Radiation: </td>
        <td><?= $dayRead[$solar_w_max] ?> W/m<sup>2</sup> at <?= timeFormat($dayRead[$solar_w_tmx]) ?></td>
    </tr>
</table></td></tr>
</table>
