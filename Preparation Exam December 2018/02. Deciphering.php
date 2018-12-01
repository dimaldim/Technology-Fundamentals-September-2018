<?php
$text = readline();
$replace = readline();

$newString = "";
if (preg_match('/^[d-z{}#|]+$/', $text)) {
    for ($i = 0; $i < strlen($text); $i++) {
        $newChar = ord($text[$i]) - 3;
        $newString .= chr($newChar);
    }
    $tokens = explode(" ", $replace);
    $newString = str_replace($tokens[0], $tokens[1], $newString);
    echo $newString;
} else {
    echo "This is not the book you are looking for.";
}