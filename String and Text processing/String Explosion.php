<?php
$input = readline();
$strength = 0;

for ($i = 0; $i < strlen($input); $i++) {
    $strength--;
    if ($input[$i] == ">") {
        if ($strength <= 0) {
            $strength = intval($input[$i + 1] + 1);
        } else {
            $strength += intval($input[$i + 1] + 1);
        }
    } else
        if ($input[$i] != ">" && $strength > 0) {
            $input[$i] = 0;
        }
}
$arr = [];
for($i = 0; $i < strlen($input); $i++) {
    if($input[$i] != "0") {
        $arr[] = $input[$i];
    }
}
echo implode("", $arr);