<?php
$configLoc = "StationConfig.php"; // This is where the .ini file is located

// Import variables from .ini file
include $configLoc;

$tblName = $dayTbl; // Daily program uses the day-table
$countLoc = $dayCounter; // and the day counter
$tempfile = $dayFile; // This is where the ftp_get file is stored

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
$filepath = 'Daily' . $count . '.dat';

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

// Remove quotation marks from timestamps
$vars[0] = substr($vars[0], 1, -1);

// There's a timestamp in every other variable from 5-37 and 44-56
for ($i = 5; $i <= 37; $i += 2) // inc by 2
{$vars[$i] = substr($vars[$i], 1, -1);}

for ($i = 44; $i <= 56; $i += 2) // inc by 2
{$vars[$i] = substr($vars[$i], 1, -1);}


// The daily file is made at 00:00:00 of the day after its readings
// This sets the date to the day the readings are taken on
// It also converts the timestamp to date format, no time
$vars[0] = date("Y-m-d", strtotime($vars[0] . " -1 day"));

// Save space by dropping the date component of the timestamps
for ($i = 5; $i <= 37; $i += 2) // inc by 2
{$vars[$i] = date('H:i:s', strtotime($vars[$i]));}

for ($i = 44; $i <= 56; $i += 2) // inc by 2
{$vars[$i] = date('H:i:s', strtotime($vars[$i]));}

// remove unnecessary fields
for ($i = 32; $i <= 35; $i += 1) // 32-35
{unset($vars[$i]);}
unset($vars[38]);

// New array contains only important information
$vars = array_values($vars);

// Prepare all variables to be entered in a mysql query
$insertVars =  "('" . implode("', '", $vars) . "')";

// Insert data into the MySql database
mysql_query("INSERT INTO $tblName 
VALUES" . $insertVars) or die(mysql_error());

// Back to start of loop
}
?>
