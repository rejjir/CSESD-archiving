<?php
include "includeCheck.php";

// A function to convert wind-direction from angle to compass letter
function windDir($angle)
{
$compass = array('N','NNE','NE','ENE','E','ESE','SE','SSE','S',
'SSW','SW','WSW','W','WNW','NW','NNW');
$direction = $compass[round($angle / 22.5) % 16];
return $direction;
}


// These are all the functions for formatting the timestamp

function timeFormat($ts)
{
if (!(date('I', strtotime($ts)))) 
$T = date('g:i A', strtotime($ts . " -1 hour"));
else
$T = date('g:i A', strtotime($ts));
return $T;
}

function timeLabelFormat($ts)
{
$T = date('M j, g A', strtotime($ts));
return $T;
}

function dateFormat($ts)
{
$T = date('l, M j, Y', strtotime($ts));
return $T;
}

function shortDateFormat($ts)
{
$T = date('M j, Y', strtotime($ts));
return $T;
}

function dayOnly($ts)
{
$T = date('M j ', strtotime($ts));
return $T;
}

function yearOnly($ts)
{
$T = date('Y', strtotime($ts));
return $T;
}

function minusOneDay($ts)
{
$T = date("Y-m-d", strtotime($ts . " -1 day"));
return $T;
}

function plusOneDay($ts)
{
$T = date("Y-m-d", strtotime($ts . " +1 day"));
return $T;
}

function timeSort($ts)
{
$T = date('YmdHi', strtotime($ts));
return $T;
}

function dateSort($ts)
{
$T = date('Ymd', strtotime($ts));
return $T;
}
?>
