<?php
$input = readline();
$arr = str_split($input);

$result = [];
for($i = 0; $i < count($arr); $i++) {
    $result[$arr[$i]] = array_keys($arr, $arr[$i]);
}
 foreach($result as $key => $value) {
     echo "$key:";
     echo implode("/", $value) . PHP_EOL;
 }