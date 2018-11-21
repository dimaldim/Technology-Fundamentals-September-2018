<?php
$input = readline();
$re = '/(?<string>[a-zA-z\W]+)(?<repeat>[\d]+)/m';
preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
$finalString = "";
$empty = true;
for ($i = 0; $i < count($matches); $i++) {
    if(!empty($matches[$i]['repeat'])) {
        $finalString .= str_repeat(strtoupper($matches[$i]['string']), $matches[$i]['repeat']);
        $empty = false;
    }
}
$arr = str_split($finalString);
if($empty) {
    $count = 0;
} else {
    $count = count(array_unique($arr));
}
echo "Unique symbols used: " . $count . PHP_EOL;
echo $finalString;