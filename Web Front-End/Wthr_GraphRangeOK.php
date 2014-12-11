<?php include "includeCheck.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head> 
<?php include $headerInfo; ?>
<title>Weather data plot for:  
<?= shortDateFormat($queryDate) ?> to <?= shortDateFormat($queryDate2) ?> </title>
</head> 

<body><div>
<?php include $banner; ?>
<br />
<p class="mid"><img src="Wthr_GraphGen.php<?=$parameters?>"></p>
<br />
<?php include $graphSelect; ?>
<?php include $checkW3; ?>
</div></body> 
</html> 
