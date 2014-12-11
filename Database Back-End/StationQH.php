<?php
$configLoc = "StationConfig.php"; // This is where the config file is located

// Import variables from config file
include $configLoc;

$tblName = $qhTbl; // Quarter-hour program uses the qh-table
$countLoc = $qhCounter; // and the day counter
$tempfile = $qhFile; // This is where the ftp_get file is stored

// connect to MySql database
mysql_connect($sqlServ, $sqlName, $sqlPass) or die(mysql_error());
mysql_select_db($sqlDb) or die(mysql_error());

// connect to FTP server, and send access parameters
$conn_id = ftp_connect($ftpHost) or die ("Cannot connect to ftpHost");
ftp_login($conn_id, $ftpUsr, $ftpPass) or die("Cannot login");
ftp_chdir($conn_id, $ftpDir);

// The program will loop, collecting and processing data
// from the weather harddrive. It ends when all of the data is collected.
while (1)
{
// The counter keeps track of which file to retrieve
// It is stored in a text file
$countFile = fopen($countLoc, 'r') or die("can't open file");
$count = fread($countFile, filesize($countLoc));
fclose($countFile);

//this is where the next file would be located on the weather hardware
$filepath = 'QH' . $count . '.dat';

// The program attempts to get the next file on the hardware
// if it exists
try
{
// Hide the error message that'll show up if the file doesn't exist
error_reporting(E_ALL ^ E_WARNING); 

// This returns false if the file exists and is transferred
if (!(ftp_get($conn_id, $tempfile, $filepath, FTP_ASCII))) 
	{
	// If that file doesn't exist (yet), the program will exit here
	
	ftp_close($conn_id);	// close the FTP stream
	exit(0);    
	}
} catch (Exception $e) {}

// We arrive here if the program retrieves a file
error_reporting(E_ALL); // Turn warnings back on

// After the file is retrieved, the hardware copy is erased 
// to make room for later data
ftp_delete($conn_id, $filepath); 

// Increment the counter
$countFile = fopen($countLoc, 'w') or die("can't open file");
$count++;
fwrite($countFile, $count);
fclose($countFile);

// Open the file retrieved from the hardware
$FileData = fopen($tempfile, 'r') or die("can't open file");

// Skip through the file to the line that contains the data
for ($i = 1; $i <= 4; $i++) {fgets($FileData);}

// Store the line that contains the data
$fileString = fgets($FileData);

// Separate each of the variables
// Store them in an array
$vars = explode(",", $fileString);

// Remove quotation marks from timestamp
$vars[0] = substr($vars[0], 1, -1);

// Prepare all variables to be entered in a mysql query
$insertVars =  "('" . implode("', '", $vars) . "')";

// Insert data into the MySql database
mysql_query("INSERT INTO $tblName 
VALUES" . $insertVars) or die(mysql_error());


// Error check and warning email
$sendWarning = false;
$warnings = "";
$warningMessage = " obtained a reading of ";

if ($vars[$battv_avg] <= $battWarning)
{
$sendWarning = true;
$addWarning = "Battery Voltage" . $warningMessage . $vars[$battv_avg] . "V \n";
$warnings = $warnings . $addWarning;
}

if ($vars[$wind_spd] >= $windWarning)
{
$sendWarning = true;
$addWarning = "Wind Speed" . $warningMessage . $vars[$wind_spd] . "km/h \n";
$warnings = $warnings . $addWarning;
}

if ($vars[$solar_w_avg] >= $solarWarning)
{
$sendWarning = true;
$addWarning = "Solar Radiation" . $warningMessage . $vars[$battv_avg] . "W/m^2 \n";
$warnings = $warnings . $addWarning;
}

if ($vars[$rain_mm] >= $rainWarning)
{
$sendWarning = true;
$addWarning = "Precipitation" . $warningMessage . $vars[$rain_mm] . "mm \n";
$warnings = $warnings . $addWarning;
}

if ($vars[$rel_hum] > $rel_humWarning || 
$vars[$rel_hum] < 0)
{
$sendWarning = true;
$addWarning = "Relative Humidity" . $warningMessage . $vars[$rel_hum] . "% \n";
$warnings = $warnings . $addWarning;
}

if ($vars[$baro_pres] <= $baro_presWarningLow || 
$vars[$baro_pres] >= $baro_presWarningHigh)
{
$sendWarning = true;
$addWarning = "Barometric Pressure" . $warningMessage . $vars[$baro_pres] . "\n";
$warnings = $warnings . $addWarning;
}

if ($vars[$air_temp] <= $tempWarningLow || 
$vars[$air_temp] >= $tempWarningHigh || !(is_finite($vars[$air_temp])))
{
$sendWarning = true;
$addWarning = "Air Temperature" . $warningMessage . $vars[$air_temp] . "\n";
$warnings = $warnings . $addWarning;
}

if ($vars[$floor_temp] <= $tempWarningLow || 
$vars[$floor_temp] >= $tempWarningHigh || !(is_finite($vars[$floor_temp])))
{
$sendWarning = true;
$addWarning = "Floor Temperature" . $warningMessage . $vars[$floor_temp] . "\n";
$warnings = $warnings . $addWarning;
}

if ($vars[$ground_temp] <= $tempWarningLow || 
$vars[$ground_temp] >= $tempWarningHigh || !(is_finite($vars[$ground_temp])))
{
$sendWarning = true;
$addWarning = "Ground Temperature" . $warningMessage . $vars[$ground_temp] . "\n";
$warnings = $warnings . $addWarning;
}

if ($vars[$underground_temp] <= $tempWarningLow || 
$vars[$underground_temp] >= $tempWarningHigh || !(is_finite($vars[$underground_temp])))
{
$sendWarning = true;
$addWarning = "Underground Temperature" . $warningMessage . $vars[$underground_temp] . "\n";
$warnings = $warnings . $addWarning;
}

if ($sendWarning == true && $reportOn == 1)
	warnAdmin($warnings);

// Back to start of loop
}

?>
