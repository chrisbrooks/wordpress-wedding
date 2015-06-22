<?php

//DATE / TIME
define('DATE_DISPLAY','F d, Y');
define('DATE_SHORT','d/m/Y');
define('DATETIME_DISPLAY','F d Y \a\t g:ia');
define('DATETIME_SHORT','m/d/Y g.ia');
define('DATETIME_TIMEZONE','Europe/London');
define('DATETIME_FORMAT_DB','Y-m-d H:i:s');
define('DATE_FORMAT','d/m/Y');
define('DATE_FORMAT_DB','Y-m-d');

class site_datetime {
	public static function now(){
		$date = new DateTime(null, new DateTimeZone(DATETIME_TIMEZONE));
		return $date;
	}
	public static function nowDB(){
		$date = self::now();
		return $date->format(DATETIME_FORMAT_DB);
	}

	//DATE
	public static function dateToDB($date){
		$tz = new DateTimeZone(DATETIME_TIMEZONE);
		$date = DateTime::createFromFormat(DATE_FORMAT, $date, $tz);
		return $date->format(DATE_FORMAT_DB);
	}
	public static function dateFromDB($date,$format=NULL){
		$tz = new DateTimeZone(DATETIME_TIMEZONE);
		$date = DateTime::createFromFormat(DATE_FORMAT_DB, $date, $tz);
		if($format){
			if($format === true) $format = DATE_SHORT;
			$date = $date->format($format);
		}
		return $date;
	}
	public static function dateFromDB_forForm($date){
		$tz = new DateTimeZone(DATETIME_TIMEZONE);
		$date = DateTime::createFromFormat(DATE_FORMAT_DB, $date, $tz);
		return $date->format(DATE_FORMAT);
	}

	//DATETIME
	public static function datetimeFromDB($date){
		$tz = new DateTimeZone(DATETIME_TIMEZONE);
		$date = DateTime::createFromFormat(DATETIME_FORMAT_DB, $date, $tz);
		return $date;
	}
}

?>