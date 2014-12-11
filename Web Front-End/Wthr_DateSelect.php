<?php include "includeCheck.php"; ?>

<p class="mid">Select date(s) and variable(s) to display: <br />
First available date is <?= shortDateFormat($firstValid)?> <br />
Daily stats and day-summary do not include the current date</p>

<table class="dateSelect">
<tr class="inner"><td>
<form method='post' action='archive.php'>
<div>
<input type="hidden" name="type" value="full" />
<input type="hidden" name="rangeSel" value="no" />
</div>
<table class="innerTable">
<tr><td colspan="4"><input type="submit" value="View full report for a single date"/>  
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
<br />
<form method='post' action='archive.php'>
<div>
<input type="hidden" name="type" value="qh" />
</div>
<table class="innerTable">
<tr><td colspan="4"><input type="submit" value="Display data from quarter-hourly readings"/>  
CSV: <input type="checkbox" value="1" name="csv" />
</td></tr>
<tr><td>Select single date: <input type="radio" name="rangeSel" value="no" checked="checked" /></td>
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
<td>Select date range: <input type="radio" name="rangeSel" value="yes" /></td>
<td><select name='year2'>
<option value='0'>None</option>
<?php
$yearNow = date("Y");
for ($yearSel = yearOnly($firstValid); $yearSel <= $yearNow; $yearSel++)
	echo "<option value='$yearSel'>$yearSel</option>"
?>
</select></td>

<td><select name='month2'>
<option value='0'>None</option>
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
<option value='0'>None</option>
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
</table>

<table class="innerTable">
<tr><td colspan="4">Select Variables to Display: 
</td></tr>
<tr>
<td><input type="checkbox" value="1" name="tempSel" />Air Temperature</td>
<td><input type="checkbox" value="1" name="flTempSel" />Floor Temperature</td>
</tr><tr>
<td><input type="checkbox" value="1" name="grTempSel" />Ground Temperature</td>
<td><input type="checkbox" value="1" name="unTempSel" />Underground Temperature</td>
</tr><tr>
<td><input type="checkbox" value="1" name="windSel" />Wind</td>
<td><input type="checkbox" value="1" name="presSel" />Barometric Pressure</td>
</tr><tr>
<td><input type="checkbox" value="1" name="precSel" />Precipitation</td>
<td><input type="checkbox" value="1" name="radSel" />Incoming Radiation</td>
</tr><tr>
<td colspan="2"><input type="checkbox" value="1" name="humSel" />Relative Humidity/ Dew Point</td>
</tr>
</table>
</form> 
</td><td>

<form method='post' action='archive.php'>
<div>
<input type="hidden" name="type" value="day" />
</div>
<table class="innerTable">
<tr><td colspan="4"><input type="submit" value="Display data from daily readings"/>  
CSV: <input type="checkbox" value="1" name="csv" />
</td></tr>
<tr><td>Select single date: <input type="radio" name="rangeSel" value="no" checked="checked" /></td>
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
<td>Select date range: <input type="radio" name="rangeSel" value="yes" /></td>
<td><select name='year2'>
<option value='0'>None</option>
<?php
$yearNow = date("Y");
for ($yearSel = yearOnly($firstValid); $yearSel <= $yearNow; $yearSel++)
	echo "<option value='$yearSel'>$yearSel</option>"
?>
</select></td>
<td><select name='month2'>
<option value='0'>None</option>
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
<option value='0'>None</option>
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
</table>

<table class="innerTable">
<tr><td colspan="4">Select Variables to Display: 
</td></tr><tr>
<td><input type="checkbox" value="1" name="air_temp_max_sel" />Air Temp: High</td>
<td><input type="checkbox" value="1" name="ground_temp_max_sel" />Ground Temp: High</td>
</tr><tr>
<td><input type="checkbox" value="1" name="air_temp_min_sel" />Air Temp: Low</td>
<td><input type="checkbox" value="1" name="ground_temp_min_sel" />Ground Temp: Low</td>
</tr><tr>
<td><input type="checkbox" value="1" name="air_temp_avg_sel" />Air Temp: Avg</td>
<td><input type="checkbox" value="1" name="ground_temp_avg_sel" />Ground Temp: Avg</td>
</tr><tr>
<td><input type="checkbox" value="1" name="floor_temp_max_sel" />Floor Temp: High</td>
<td><input type="checkbox" value="1" name="underground_temp_max_sel" />Underground Temp: High</td>
</tr><tr>
<td><input type="checkbox" value="1" name="floor_temp_min_sel" />Floor Temp: Low</td>
<td><input type="checkbox" value="1" name="underground_temp_min_sel" />Underground Temp: Low</td>
</tr><tr>
<td><input type="checkbox" value="1" name="floor_temp_avg_sel" />Floor Temp: Avg</td>
<td><input type="checkbox" value="1" name="underground_temp_avg_sel" />Underground Temp: Avg</td>
</tr><tr>
<td><input type="checkbox" value="1" name="wind_spd_max_sel" />Max Wind Speed</td>
<td><input type="checkbox" value="1" name="baro_pres_max_sel" />Barometric Pressure: High</td>
</tr><tr>
<td><input type="checkbox" value="1" name="rain_mm_tot_sel" />Total Precipitation</td>
<td><input type="checkbox" value="1" name="baro_pres_min_sel" />Barometric Pressure: Low</td>
</tr><tr>
<td><input type="checkbox" value="1" name="solar_w_max_sel" />Max Incoming Radiation</td>
<td><input type="checkbox" value="1" name="baro_pres_avg_sel" />Barometric Pressure: Avg</td>
</tr><tr>
<td><input type="checkbox" value="1" name="rel_hum_max_sel" />Relative Humidity: High</td>
<td><input type="checkbox" value="1" name="rel_hum_min_sel" />Relative Humidity: Low</td>
</tr>
</table>
</form> 
</td></tr></table>
