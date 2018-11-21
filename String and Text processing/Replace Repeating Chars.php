<?php
$input = readline();

echo preg_replace("/(.)\\1+/", "$1", $input);