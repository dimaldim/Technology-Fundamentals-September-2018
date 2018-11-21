<?php
$input = readline();

preg_match_all('/<title>(.*?)<\/title>/', $input, $title, PREG_SET_ORDER, 0);
preg_match_all('/<body>(.*?)<\/body>/', $input, $content, PREG_SET_ORDER, 0);

echo "Title: {$title[0][1]}" . PHP_EOL;
$html = strip_tags(str_replace('<', ' <', $content[0][1]));
$html = str_replace('\n', ' ', $html);
echo "Content: " . trim($html) . PHP_EOL;