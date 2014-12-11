<?php
$configLoc = "Wthr_Config.php"; // This is where the .ini file is located

// Import variables from .ini file
$includeCheck = 1;
include $configLoc;

// These are the input variables for graphing
$type = $_GET['type']; // Daily or QH: "day" or "qh"
$range = $_GET['range']; // Date range or single day: "yes" or "no"
$var = $_GET['var']; // Which Variable is plotted: see below for valid variables
$date1 = $_GET['date1']; // Date for graph
$date2 = $_GET['date2']; // End date if using date range

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

// connect to MySql database
include $sqlConnect;

// Graph data will be sorted into these arrays
$ydata = array();
$xlabels = array();

// Check if date(s) is valid
$check = strtotime($date1);
$check1 = checkdate(date('m', $check), date('d', $check), date('Y', $check));
$check = strtotime($date2);
$check2 = checkdate(date('m', $check), date('d', $check), date('Y', $check));

// Retrieve daily data if selected
if ($type == "day" && $range == "yes" && $check1 && $check2)
{
	// Determine variable to display
	if ($var == "air_temp_max")
	{
		$graphvar = $air_temp_max;
		$graphTitle = "Air Temperature: High";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "air_temp_min")
	{
		$graphvar = $air_temp_min;
		$graphTitle = "Air Temperature: Low";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "air_temp_avg")
	{
		$graphvar = $air_temp_avg;
		$graphTitle = "Air Temperature: Average";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "floor_temp_max")
	{
		$graphvar = $floor_temp_max;
		$graphTitle = "Floor Temperature: High";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "floor_temp_min")
	{
		$graphvar = $floor_temp_min;
		$graphTitle = "Floor Temperature: Low";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "floor_temp_avg")
	{
		$graphvar = $floor_temp_avg;
		$graphTitle = "Floor Temperature: Average";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "ground_temp_max")
	{
		$graphvar = $ground_temp_max;
		$graphTitle = "Ground Temperature: High";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "ground_temp_min")
	{
		$graphvar = $ground_temp_min;
		$graphTitle = "Ground Temperature: Low";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "ground_temp_avg")
	{
		$graphvar = $ground_temp_avg;
		$graphTitle = "Ground Temperature: Average";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "underground_temp_max")
	{
		$graphvar = $underground_temp_max;
		$graphTitle = "Underground Temperature: High";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "underground_temp_min")
	{
		$graphvar = $underground_temp_min;
		$graphTitle = "Underground Temperature: Low";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "underground_temp_avg")
	{
		$graphvar = $underground_temp_avg;
		$graphTitle = "Underground Temperature: Average";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "baro_pres_max")
	{
		$graphvar = $baro_pres_max;
		$graphTitle = "Barometric Pressure: High";
		$axisTitle = "Pressure (kPa)";
	}
	else if ($var == "baro_pres_min")
	{
		$graphvar = $baro_pres_min;
		$graphTitle = "Barometric Pressure: Low";
		$axisTitle = "Pressure (kPa)";
	}
	else if ($var == "baro_pres_avg")
	{
		$graphvar = $baro_pres_avg;
		$graphTitle = "Barometric Pressure: Average";
		$axisTitle = "Pressure (kPa)";
	}
	else if ($var == "rel_hum_max")
	{
		$graphvar = $rel_hum_max;
		$graphTitle = "Relative Humidity: High";
		$axisTitle = "Humidity (%)";
	}	
	else if ($var == "rel_hum_min")
	{
		$graphvar = $rel_hum_min;
		$graphTitle = "Relative Humidity: Low";
		$axisTitle = "Humidity (%)";
	}
	else if ($var == "solar_w_max")
	{
		$graphvar = $solar_w_max;
		$graphTitle = "Max Incoming Radiation";
		$axisTitle = "Radiation (W/m<sup>2</sup>)";
	}
	else if ($var == "wind_spd_max")
	{
		$graphvar = $wind_spd_max;
		$graphTitle = "Max Wind Speed";
		$axisTitle = "Speed (km/h)";
	}
	else if ($var == "rain_mm_tot")
	{
		$graphvar = $rain_mm_tot;
		$graphTitle = "Total Precipitation";
		$axisTitle = "Precipitation (mm)";
	}

	else
	{
	$graphvar = $floor_temp_avg; // Default to this variable
	$graphTitle = "Temperature";
	$axisTitle = "Temperature (°C)";
	}

	// Fetch data from database
	$query = "SELECT * FROM $dayTbl WHERE $dayKey BETWEEN '$date1' 
	AND '$date2' ORDER BY $dayKey"; 
	$result = mysql_query($query) or die(mysql_error());
	$num = mysql_numrows($result);

	$scale = 1;
	$dateOnly = 1;
	
	// Make the labels scale properly (up to a 1 year range) 
	for ($j=0; $j<16; $j+=1)
	{
		if ($num > ($j * 40))
		$scale = $j+1;
		else
		break;
	}

	$graphTitle = $graphTitle . " from " . shortDateFormat($date1) 
	. " to  " . shortDateFormat($date2);
}

else
{
	// Determine variable to display
	if ($var == "temp")
	{
		$graphvar = $air_temp;
		$graphTitle = "Air Temperature";
		$axisTitle = "Temperature (°C)";
	}
	else if ($var == "wind")
	{
		$graphvar = $wind_spd;
		$graphTitle = "Wind Speed";
		$axisTitle = "Speed (km/h)";
	}
	else if ($var == "prec")
	{
		$graphvar = $rain_mm;
		$graphTitle = "Precipitation";
		$axisTitle = "Precipitation (mm)";
	}
	else if ($var == "hum")
	{
	$graphvar = $rel_hum;
	$graphTitle = "Relative Humidity";
	$axisTitle = "Humidity (%)";
	}
	else if ($var == "rad")
	{
	$graphvar = $solar_w_avg;
	$graphTitle = "Incoming Radiation";
	$axisTitle = "Radiation (W/m^2)";
	}
	else if ($var == "pres")
	{
	$graphvar = $baro_pres;
	$graphTitle = "Barometric Pressure";
	$axisTitle = "Pressure (kPa)";
	}
	else if ($var == "flTemp")
	{
	$graphvar = $floor_temp;
	$graphTitle = "Floor Temperature";
	$axisTitle = "Temperature (°C)";
	}
	else if ($var == "grTemp")
	{
	$graphvar = $ground_temp;
	$graphTitle = "Ground Temperature";
	$axisTitle = "Temperature (°C)";
	}
	else if ($var == "unTemp")
	{
	$graphvar = $underground_temp;
	$graphTitle = "Underground Temperature";
	$axisTitle = "Temperature (°C)";
	}
	
	else
	{
	$graphvar = $floor_temp; // Default to this variable
	$graphTitle = "Temperature*";
	$axisTitle = "Temperature (°C)";
	}
	// Determine graph type & Fetch data from database

	// Retrieve Quarter-Hourly data from single day
	if ($type == "qh" && $range == "no" && $check1)
	{
		$nextDay = plusOneDay($date1);
		$query = "SELECT * FROM $qhTbl WHERE $qhKey 
		BETWEEN '$date1' AND '$nextDay' ORDER BY $qhKey";
		$result = mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);
		$scale = 4;
		$graphTitle = $graphTitle . " on " . shortDateFormat($date1);
	}

	// Retrieve Quarter-Hourly data from date range
	else if($type == "qh" && $range == "yes" && $check1 && $check2)
	{
		$fixDayCount = plusOneDay($date2);
		$query = "SELECT * FROM $qhTbl 
		WHERE $qhKey BETWEEN '$date1' AND '$fixDayCount'
		ORDER BY $qhKey";
		$result = mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);

		$scale = ($num/24);
		$qhRange = 1;

		// Make the labels scale properly (up to a 1 year range)
		for ($j=1; $j<16; $j+=1)
		{
			if ($num > ($j * 2400))
			{
			$scale = ($j * 96);
			$dateOnly = 1;
			}
			else
			break;
		}

		$graphTitle = $graphTitle . " from " . shortDateFormat($date1) 
		. " to  " . shortDateFormat($date2);
	}

	// Default graph to be generated, 
	// in case this page is accessed directly with improper input variables
	else
	{
		$query = "SELECT * FROM $qhTbl ORDER BY $qhKey DESC LIMIT 24";  
		$result = mysql_query($query) or die(mysql_error()); 
		$num = mysql_numrows($result);  
		$scale = 1;
		$invert = 1; // The default query pulls data in reverse chronological order
		$graphTitle = "Recent " . $graphTitle;
	}
}

// Put all the data into arrays
for ($i = 0; $i < $num; $i += 1)
	{
		$tableRead = mysql_fetch_row($result) or die(mysql_error());
		array_push($ydata, $tableRead[$graphvar]);
		if ($dateOnly == 1)
		array_push($xlabels, shortDateFormat($tableRead[0]));
		else if ($qhRange == 1)
		array_push($xlabels, timeLabelFormat($tableRead[0]));		
		else
		array_push($xlabels, timeFormat($tableRead[0]));
	}  

if ($invert == 1)
{
// Put both sets of data in proper chronological order
$ydata = array_reverse($ydata);
$xlabels = array_reverse($xlabels);
}

// Create the graph
$graph = new Graph(950,400);
$graph->SetScale('textlin');

// Create the linear plot and add the plot to the graph
$lineplot=new LinePlot($ydata);
$lineplot->SetColor('blue');
$graph->Add($lineplot);

// Set Y-axis title

$graph->title->Set($graphTitle);
$graph->yaxis->SetTitle($axisTitle, "center");

// Graph formatting
$graph->xaxis->SetTickLabels($xlabels);
$graph->xaxis->SetTitle("Time","center");
$graph->xaxis->SetLabelAngle(90);
$graph->yaxis->SetTitleMargin(50);
$graph->xaxis->SetTitleMargin(75);
$graph->title->SetMargin(10);
$graph->img->SetMargin(70,20,35,110); 
	
$graph ->xaxis->SetTextLabelInterval($scale);

// Display the graph
$graph->Stroke();
?>
