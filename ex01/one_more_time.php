#!/usr/bin/php
<?php
if ($argc != 2)
	exit(0);
if (preg_match("/^[a-zA-Z]{5,8} [0-9]{1,2} [a-zA-Zéû]{3,9} [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/",$argv[1]))
{
	$data = explode(" ", $argv[1]);
	$day_n = $data[1];
	$year = $data[3];
	$time = explode(":", $data[4]);
	$h = $time[0];
	$m = $time[1];
	$s = $time[2];
	$month = NULL;
	$day = NULL;
	switch (strtolower($data[0])){
		case "lundi" :
			$day = "monday";
			break;
		case "mardi" :
			$day = "tuesday";
			break;
		case "mercredi" :
			$day = "wednesday";
			break;
		case "jeudi":
			$day = "thursday";
			break;
		case "vendredi":
			$day = "friday";
			break;
		case "samedi":
			$day = "saturday";
			break;
		case "dimanche":
			$day = "sunday";
			break;
	}
	switch (strtolower($data[2]))
	{
		case "janvier":
			$month = 1;
			break;
		case "février":
			$month = 2;
			break;
		case "mars":
			$month = 3;
			break;
		case "avril":
			$month = 4;
			break;
		case "mai":
			$month = 5;
			break;
		case "juin":
			$month = 6;
			break;
		case "juillet":
			$month = 7;
			break;
		case "août":
			$month = 8;
			break;
		case "septembre":
			$month = 9;
			break;
		case "octobre":
			$month = 10;
			break;
		case "novembre":
			$month = 11;
			break;
		case "décembre":
			$month = 12;
			break;
	}
	if ($month === NULL || $day === NULL)
	{
		 echo "Wrong Format\n";
		 exit(0);
	}
	date_default_timezone_set('Europe/Paris');
	echo mktime($h, $m, $s, $month, $day_n, $year) ."\n";
}
else
	echo "Wrong Format\n";
?>
