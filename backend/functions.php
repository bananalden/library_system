<?php

function validateNumberDigits($number, $minDigits) {
    $numberStr = (string) $number; // Convert number to string
    return strlen($numberStr) == $minDigits; // Check if the length of the string is at least $minDigits
}
function validateDateWithinCurrentYear($dateString) {
    $inputDate = strtotime($dateString); // Convert input date string to a Unix timestamp
    if ($inputDate === false) {
        return false; // Invalid date format
    }
    
    $currentYear = date('Y'); // Get the current year
    $inputYear = date('Y', $inputDate); // Get the year from the input date
    
    return $inputYear <= $currentYear; // Check if the input year is less than or equal to the current year
}



?>