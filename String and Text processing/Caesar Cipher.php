<?php
$input = readline();

echo encrypt($input);

/**
 * @param $string
 * @return string
 */
function encrypt($string)
{
    $length = strlen($string);
    $newString = "";
    for ($i = 0; $i < $length; $i++) {
     $char = ord($string[$i]) + 3;
     $shift = chr($char);
     $newString .= $shift;
    }
    return $newString;
}