<?php
$string = readline();
$pattern = readline();

while (strlen($string) > 0 && strlen($pattern) > 0) {
    $firstIndex = strpos($string, $pattern);
    $lastIndex = strrpos($string, $pattern);
    if ($firstIndex >= 0 && $lastIndex >= 0 && $firstIndex != $lastIndex) {
         echo "Shaked it." . PHP_EOL;
         $string = substr_replace($string, '', $firstIndex, strlen($pattern));
         $lastIndex = strrpos($string, $pattern);
         $string = substr_replace($string, '', $lastIndex, strlen($pattern));
         $pattern = substr_replace($pattern, '', strlen($pattern) / 2, 1);
    } else {
        echo "No shake." . PHP_EOL;
        echo $string . PHP_EOL;
        break;
    }
}
if(strlen($pattern) < 1 || strlen($string) < 1) {
    echo "No shake." . PHP_EOL;
    echo $string . PHP_EOL;
}