<?php
$input = explode(", ", readline());
foreach ($input as $user) {
    if (preg_match('/^[a-zA-Z0-9-_]{3,16}+$/m', $user)) {
        echo $user.PHP_EOL;
    }
}