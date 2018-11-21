<?php
$arr = [];
$string = "";
while(true) {
    $input = preg_split('/[:|\/]/', readline());
    if($input[0] == "end") {
        break;
    }
    for($i = 1; $i < count($input); $i++) {
        $arr[$input[$i]] = $input[0];
    }
}
ksort($arr);
echo implode("", $arr);
