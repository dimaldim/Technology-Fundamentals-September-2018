<?php
$input = readline();
$file = substr($input, strrpos($input, "\\") + 1);

$fileName = substr($file, 0, strrpos($file, "."));
$ext = substr($file, strrpos($file, ".") + 1);

echo "File name: " . $fileName . PHP_EOL;
echo "File extension: " . $ext . PHP_EOL;

