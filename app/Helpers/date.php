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