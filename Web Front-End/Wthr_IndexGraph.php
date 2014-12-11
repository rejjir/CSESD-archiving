<?php
$configLoc = "Wthr_Config.php"; // This is where the .ini file is located

// Import variables from .ini file
$includeCheck = 1;
include $configLoc;

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

// connect to MySql database
include $sqlConnect;

// Graph data will be sorted into these arrays
$ydata = array();
$xlabels = array();

$graphvar = $floor_temp; // Use this variable
$graphTitle = "Recent Temperature";
$axisTitle = "Temperature (°C)";

// Fetch data from database
$query = "SELECT * FROM $qhTbl ORDER BY $qhKey DESC LIMIT 24";  
$result = mysql_query($query) or die(mysql_error()); 
$num = mysql_numrows($result);  
$scale = 1;

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

// The query pulls data in reverse chronological order
// Put both sets of data in proper chronological order
$ydata = array_reverse($ydata);
$xlabels = array_reverse($xlabels);

// Create the graph
$graph = new Graph(500,300);
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
$graph->xaxis->SetTitleMargin(55);
$graph->title->SetMargin(10);
$graph->img->SetMargin(70,20,30,90); 	
$graph ->xaxis->SetTextLabelInterval($scale);

// Display the graph
$graph->Stroke();
?>
