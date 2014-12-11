<?php
include "includeCheck.php";
// All constants for the website are contained in this file

// MySQL Log-in & Database info
$sqlServ = "127.0.0.1";
$sqlName = "login";
$sqlPass = "password";
$sqlDb = "weather";

$qhTbl = "qhReport";
$qhKey = "date_time";
$qhColumns = "18";

$dayTbl = "dayReport";
$dayKey = "day_recorded";
$dayColumns = "55";
$firstValid = "yyyy-mm-dd"; // First day recorded in database; the day the database has started logging data

// The locations of all #include pages
$archiveOK = "Wthr_ArchiveOK.php";
$archiveRangeOK = "Wthr_ArchiveRangeOK.php";
$archiveFail = "Wthr_ArchiveFail.php";
$archiveCSV = "Wthr_ArchiveCSV.php";

$graphFail = "Wthr_GraphFail.php";
$graphSelect = "Wthr_GraphSelect.php";
$graphOK = "Wthr_GraphOK.php";
$graphRangeOK = "Wthr_GraphRangeOK.php";

$banner = "Wthr_ShowBanner.php";
$headerInfo = "Wthr_PageHeadInfo.php";
$checkW3 = "Wthr_CheckW3.php";
$dayPrint = "Wthr_PrintDay.php";
$qhPrint = "Wthr_PrintQH.php";
$daySummary = "Wthr_DaySummary.php";
$sqlConnect = "Wthr_Connect.php";
$dateSelect = "Wthr_DateSelect.php";
$dateRangeSelect = "Wthr_DateRangeSelect.php";

include "Wthr_Functions.php"; // Imported functions are located here

// Variable numbers in QH Table				 
$wind_spd = 3;
$wind_dir = 4;
$solar_w_avg = 5;
$rain_mm = 7;
$rel_hum = 8;
$air_temp = 9;
$dew_pt = 10;
$baro_pres = 14;
$floor_temp = 15;
$ground_temp = 16;
$underground_temp = 17;

// Variable numbers in Day Table
$air_temp_max = 20;
$air_temp_tmx = 21;
$air_temp_min = 22;
$air_temp_tmn = 23;
$air_temp_avg = 52;

$floor_temp_max = 4;
$floor_temp_tmx = 5;
$floor_temp_min = 6;
$floor_temp_tmn = 7;
$floor_temp_avg = 34;

$ground_temp_max = 8;
$ground_temp_tmx = 9;
$ground_temp_min = 10;
$ground_temp_tmn = 11;
$ground_temp_avg = 35;

$underground_temp_max = 12;
$underground_temp_tmx = 13;
$underground_temp_min = 14;
$underground_temp_tmn = 15;
$underground_temp_avg = 36;

$baro_pres_max = 48;
$baro_pres_tmx = 49;
$baro_pres_min = 50;
$baro_pres_tmn = 51;
$baro_pres_avg = 54;

$rel_hum_max = 24;
$rel_hum_tmx = 25;
$rel_hum_min = 26;
$rel_hum_tmn = 27;

$wind_spd_max = 18;
$wind_spd_tmx = 19;

$solar_w_max = 16;
$solar_w_tmx = 17;
$solar_w_d_avg = 37;

$rain_mm_tot = 3;
?>
