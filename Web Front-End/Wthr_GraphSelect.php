<?php include "includeCheck.php"; ?>

<p class="mid">Select date(s) for graph: <br />
First available date is <?= shortDateFormat($firstValid)?> <br />
Daily stats does not include the current date</p>

<form method='post' action='graphpage.php'>
<div>
<input type="hidden" name="type" value="qh" />
<input type="hidden" name="rangeSel" value="no" />
</div>
<table class="dateSelect">
<tr><td colspan="4"><input type="submit" value="Graph quarter-hourly data for a single date"/>
</td></tr>
<tr><td colspan="4">Select variable: 
<select name='var'>
<option value='temp'>Air Temperature</option>
<option value='wind'>Wind</option>
<option value='prec'>Precipitation</option>
<option value='hum'>Relative Humidity</option>
<option value='rad'>Incoming Radiation</option>
<option value='pres'>Barometric Pressure</option>
<option value='flTemp'>Floor Temperature</option>
<option value='grTemp'>Ground Temperature</option>
<option value='unTemp'>Underground Temperature</option>
</select>
</td></tr>
<tr><td>Date: </td>
<td><select name='year'>
<?php
$yearNow = date("Y");
for ($yearSel = 2011; $yearSel <= $yearNow; $yearSel++)
	echo "<option value='$yearSel'>$yearSel</option>"
?>
</select></td>

<td><select name='month'>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select></td>

<td><select name='day'>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select></td>

</tr>
<tr>
<td></td>
</tr>
</table>
</form>

<table class="dateSelect">
<tr class="inner"><td>
<form method='post' action='graphpage.php'>
<div>
<input type="hidden" name="type" value="day" />
<input type="hidden" name="rangeSel" value="yes" />
</div>
<table class="innerTable">
<tr><td colspan="4"><input type="submit" value="Graph data from daily stats"/>
</td></tr>
<tr><td colspan="4">Select variable: 
<select name='var'>
<option value='air_temp_max'>Air Temp: High</option>
<option value='air_temp_min'>Air Temp: Low</option>
<option value='air_temp_avg'>Air Temp: Avg</option>
<option value='floor_temp_max'>Floor Temp: High</option>
<option value='floor_temp_min'>Floor Temp: Low</option>
<option value='floor_temp_avg'>Floor Temp: Avg</option>
<option value='ground_temp_max'>Ground Temp: High</option>
<option value='ground_temp_min'>Ground Temp: Low</option>
<option value='ground_temp_avg'>Ground Temp: Avg</option>
<option value='underground_temp_max'>Underground Temp: High</option>
<option value='underground_temp_min'>Underground Temp: Low</option>
<option value='underground_temp_avg'>Underground Temp: Avg</option>
<option value='baro_pres_max'>Barometric Pressure: High</option>
<option value='baro_pres_min'>Barometric Pressure: Low</option>
<option value='baro_pres_avg'>Barometric Pressure: Avg</option>
<option value='rel_hum_max'>Relative Humidity: High</option>
<option value='rel_hum_min'>Relative Humidity: Low</option>
<option value='solar_w_max'>Max Incoming Radiation</option>
<option value='wind_spd_max'>Max Wind Speed</option>
<option value='rain_mm_tot'>Total Precipitation</option>

</select>
</td></tr>
<tr><td>Start Date: </td>
<td><select name='year'>
<?php
$yearNow = date("Y");
for ($yearSel = 2011; $yearSel <= $yearNow; $yearSel++)
	echo "<option value='$yearSel'>$yearSel</option>"
?>
</select></td>

<td><select name='month'>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select></td>

<td><select name='day'>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select></td>

</tr>
<tr><td>End Date: </td>
<td><select name='year2'>
<?php
$yearNow = date("Y");
for ($yearSel = 2011; $yearSel <= $yearNow; $yearSel++)
	echo "<option value='$yearSel'>$yearSel</option>"
?>
</select></td>

<td><select name='month2'>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select></td>

<td><select name='day2'>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select></td>
</tr>
<tr>
<td></td>
</tr>
</table>
</form> 
</td><td>

<form method='post' action='graphpage.php'>
<div>
<input type="hidden" name="type" value="qh" />
<input type="hidden" name="rangeSel" value="yes" />
</div>
<table class="innerTable">
<tr><td colspan="4"><input type="submit" value="Graph quarter-hourly data over a date range"/>
</td></tr>
<tr><td colspan="4">Select variable: 
<select name='var'>
<option value='temp'>Air Temperature</option>
<option value='wind'>Wind</option>
<option value='prec'>Precipitation</option>
<option value='hum'>Relative Humidity</option>
<option value='rad'>Incoming Radiation</option>
<option value='pres'>Barometric Pressure</option>
<option value='flTemp'>Floor Temperature</option>
<option value='grTemp'>Ground Temperature</option>
<option value='unTemp'>Underground Temperature</option>
</select>
</td></tr>
<tr><td>Start Date: </td>
<td><select name='year'>
<?php
$yearNow = date("Y");
for ($yearSel = 2011; $yearSel <= $yearNow; $yearSel++)
	echo "<option value='$yearSel'>$yearSel</option>"
?>
</select></td>

<td><select name='month'>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select></td>

<td><select name='day'>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select></td>

</tr>
<tr><td>End Date: </td>
<td><select name='year2'>
<?php
$yearNow = date("Y");
for ($yearSel = 2011; $yearSel <= $yearNow; $yearSel++)
	echo "<option value='$yearSel'>$yearSel</option>"
?>
</select></td>

<td><select name='month2'>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select></td>

<td><select name='day2'>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select></td>
</tr>
<tr>
<td></td>
</tr>
</table>
</form></td></tr></table>
