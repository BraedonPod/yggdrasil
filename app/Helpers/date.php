<?php
/**
 * Return a formatted Carbon date.
 *
 * @param  Carbon\Carbon $date
 * @param  string $format
 * @return string
 */
function humanize_date(Carbon\Carbon $date, $format = 'F jS,  Y'): string
{
    return $date->format($format);
}

function compare_date(Carbon\Carbon $posted): string
{
    $now = date("Y-m-d");
	$now = DateTime::createFromFormat('Y-m-d', $now);
	$posted = date("Y-m-d", strtotime($posted));
	$posted = DateTime::createFromFormat('Y-m-d', $posted);
	$days = $now->diff($posted)->format("%a");
	if($days > 1){ $days = $days." days ago"; }
	else {$days = $days." day ago";}
	
	return $days;
}