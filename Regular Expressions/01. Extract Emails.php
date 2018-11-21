<?php
$input = readline();

preg_match_all('/(^|(?<=\s))(([a-zA-Z0-9]+)([\.\-_]?)([A-Za-z0-9]+)(@)([a-zA-Z]+([\.\-_][A-Za-z]+)+))(\b|(?=\s))/', $input, $matches);

foreach ($matches[0] as $emails) {
    echo $emails . PHP_EOL;
}