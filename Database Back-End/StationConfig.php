<?php
// All constants for the station programs are contained in this file

$ftpHost = "ip address of station hardware";
$ftpUsr = "login";
$ftpPass = "pass";
$ftpDir = "route to stored readings";

$sqlServ = "127.0.0.1";
$sqlName = "login";
$sqlPass = "password";
$sqlDb = "weather";

$qhTbl = "qhReport";
$qhCounter = "StationCountQH.txt" ;
$qhFile = "StationDataQH.txt";

$dayTbl = "dayReport";
$dayCounter = "StationCountDay.txt";
$dayFile = "StationDataDay.txt";

// Error-reporting can be enabled or disabled (1 or 0)
$reportOn = 0;

// Automatic email function
function warnAdmin($warnings)
{
$adminEmail = "youremail@yourdomain.com";
$subject = "Weather Station: Warning";
$body = "Highly unexpected readings: \n $warnings";
$headers = "From: Weather Station <noreply@yourdomain.com>";
if (mail($adminEmail, $subject, $body, $headers))
	echo("Warning sent to Admin");
else echo("Message delivery failed");
}

// Variable numbers in array
$battv_avg = 2;				 
$wind_spd = 3;
$solar_w_avg = 5;
$rain_mm = 7;
$rel_hum = 8;
$air_temp = 9;
$baro_pres = 14;
$floor_temp = 15;
$ground_temp = 16;
$underground_temp = 17;

// Values that generate error messages
$battWarning = 12.5;
$tempWarningLow = -50;
$tempWarningHigh = 50;
$windWarning = 118; // F1 Tornado
$solarWarning = 1366; // Solar Constant
$rainWarning = 10; // Estimated, 10mm in a day is a lot; 10mm in 15mins suggests something is not right
$rel_humWarning = 100;
$baro_presWarningLow = 95;
$baro_presWarningHigh = 105;
?>
