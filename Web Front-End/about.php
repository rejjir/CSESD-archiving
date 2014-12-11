<?php
$configLoc = "Wthr_Config.php"; // This is where the .ini file is located

// Import variables from .ini file
$includeCheck = 1;
include $configLoc;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head> 
<?php include $headerInfo; ?>
<title> About Weather Station</title>
</head> 

<body><div>
<?php include $banner; ?>
<p id="aboutTitle">
Station Info
</p>
<p class="mid">
The weather station is operated by ______, and <br />
uses Cambell Scientific equipment to take measurements every 15 minutes.  Data <br />
is can be viewed in table and graph display, as well as in downloadable text <br />
format. <br />
</p>

<?php include $checkW3; ?>
</div></body> 
</html> 
