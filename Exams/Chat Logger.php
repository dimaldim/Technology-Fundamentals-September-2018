<?php
$arr = [];
while (($command = readline()) != "end") {
    $tokens = explode(" ", $command);
    $com = $tokens[0];
    for ($i = 1; $i < count($tokens); $i++) {
        if ($com == "Chat") {
            array_push($arr, $tokens[$i]);
        }
        if ($com == "Edit") {
            $key = array_search($tokens[1], $arr);
            if ($key > -1) {
                $arr[$key] = $tokens[2];
            }
        }
        if ($com == "Delete") {
            $key = array_search($tokens[1], $arr);
            if ($key > -1) {
                array_splice($arr, $key, 1);
            }
        }
        if ($com == "Spam") {
            array_push($arr, $tokens[$i]);
        }
        if ($com == "Pin") {
            $key = array_search($tokens[1], $arr);
            if ($key > -1) {
                array_splice($arr, $key, 1);
                array_push($arr, $tokens[1]);
            }
        }
    }
}
foreach ($arr as $val) {
    echo $val.PHP_EOL;
}