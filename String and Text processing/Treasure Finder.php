<?php
$key = preg_split('/\s+/', readline());
$strings = [];
while (($input = readline()) != "find") {
    for ($j = 0; $j < count($key); $j++) {

        for ($i = 0; $i < strlen($input); $i++) {
            $input[$i] = chr(ord($input[$i]) - $key[$j]);
            if (isset($key[$j + 1])) {
                $j++;
            } else {
                $j = 0;
            }
        }
        array_push($strings, $input);
        break;
    }
}
foreach ($strings as $output) {
    $dollarStart = strpos($output, "&");
    $dollarEnd = strrpos($output, "&");
    $coordStart = strpos($output, "<");
    $coordEnd = strpos($output, ">");
    echo "Found " . substr($output, $dollarStart + 1, $dollarEnd - $dollarStart - 1) .
        " at " . substr($output, $coordStart + 1, $coordEnd - $coordStart - 1) . PHP_EOL;
}