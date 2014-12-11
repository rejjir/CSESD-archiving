<?php
$configLoc = "StationConfig.php"; // This is where the config file is located

// Import variables from config file
include $configLoc;

mysql_connect($sqlServ, $sqlName, $sqlPass) or die(mysql_error());
mysql_select_db($sqlDb) or die(mysql_error());

// Un-comment these function calls to reset the each of their tables
// qhMake($qhTbl);
// dayMake($dayTbl);

function qhMake($Tbl)
{
mysql_query("DROP TABLE IF EXISTS $Tbl") or die(mysql_error()); 

// Stuck the first variable on line 20, for easy counting (gedit displays line#)
mysql_query("CREATE TABLE $Tbl(
date_time 				TIMESTAMP NOT NULL,
record 					MEDIUMINT unsigned,
battv_avg 				FLOAT,
wind_spd 				FLOAT,
wind_dir 				FLOAT,
solar_w_avg 			FLOAT,
solar_kj 				FLOAT,
rain_mm 				FLOAT,
rel_hum 				FLOAT,
air_temp 				FLOAT,
dew_pt 					FLOAT,
heat_index 				FLOAT,
humidex 				FLOAT,
wind_chill 				FLOAT,
baro_pres 				FLOAT,
floor_temp 				FLOAT,
ground_temp 			FLOAT,
underground_temp 		FLOAT,
PRIMARY KEY (`date_time`))") or die(mysql_error());  

// echo "Table Created! \n";
}


function dayMake($Tbl)
{
mysql_query("DROP TABLE IF EXISTS $Tbl") or die(mysql_error()); 

// Stuck the first variable on line 50, for easy counting (gedit displays line#)
mysql_query("CREATE TABLE $Tbl(
day_recorded			DATE NOT NULL,
record					SMALLINT UNSIGNED,
battv_min				FLOAT,
rain_mm_tot				FLOAT,
floor_temp_max			FLOAT,
floor_temp_tmx			TIME NOT NULL,
floor_temp_min			FLOAT,
floor_temp_tmn			TIME NOT NULL,
ground_temp_max			FLOAT,
ground_temp_tmx			TIME NOT NULL,
ground_temp_min			FLOAT,
ground_temp_tmn			TIME NOT NULL,
underground_temp_max	FLOAT,
underground_temp_tmx	TIME NOT NULL,
underground_temp_min	FLOAT,
underground_temp_tmn	TIME NOT NULL,
solar_w_max				FLOAT,
solar_w_tmx				TIME NOT NULL,
wind_spd_max			FLOAT,
wind_spd_tmx			TIME NOT NULL,
air_temp_max			FLOAT,
air_temp_tmx			TIME NOT NULL,
air_temp_min			FLOAT,
air_temp_tmn			TIME NOT NULL,
rel_hum_max				FLOAT,
rel_hum_tmx				TIME NOT NULL,
rel_hum_min				FLOAT,
rel_hum_tmn				TIME NOT NULL,
dew_pt_max				FLOAT,
dew_pt_tmx				TIME NOT NULL,
dew_pt_min				FLOAT,
dew_pt_tmn				TIME NOT NULL,
heat_index_max			FLOAT,
heat_index_tmx			TIME NOT NULL,
floor_temp_avg			FLOAT,
ground_temp_avg			FLOAT,
underground_temp_avg	FLOAT,
solar_w_avg				FLOAT,
heat_index_min			FLOAT,
heat_index_tmn			TIME NOT NULL,
humidex_max				FLOAT,
humidex_tmx				TIME NOT NULL,
humidex_min				FLOAT,
humidex_tmn				TIME NOT NULL,
wind_chill_max			FLOAT,
wind_chill_tmx			TIME NOT NULL,
wind_chill_min			FLOAT,
wind_chill_tmn			TIME NOT NULL,
baro_pres_max			FLOAT,
baro_pres_tmx			TIME NOT NULL,
baro_pres_min			FLOAT,
baro_pres_tmn			TIME NOT NULL,
air_temp_avg			FLOAT,
dew_pt_avg				FLOAT,
baro_pres_avg			FLOAT,
PRIMARY KEY (`day_recorded`))") or die(mysql_error());  

// echo "Table Created! \n";

}


?>
