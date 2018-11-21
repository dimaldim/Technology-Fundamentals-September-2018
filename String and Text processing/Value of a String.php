<?php
$string = readline();
$type = readline();

$totalSum = 0;
for ($i = 0; $i < strlen($string); $i++) {
    $valid = preg_match('/[a-zA-Z]+/m', $string[$i]);
    if ($valid) {
        if ($type == "UPPERCASE") {
            if (ctype_upper($string[$i])) {
                 $totalSum += ord($string[$i]);
            }
        } else if($type == "LOWERCASE") {
            if (ctype_lower($string[$i])) {
                $totalSum += ord($string[$i]);
            }
        }
    }
}
echo "The total sum is: {$totalSum}" . PHP_EOL;