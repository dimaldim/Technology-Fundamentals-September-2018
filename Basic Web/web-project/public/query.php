<?php
$url = "https://selvbetjening.trafikstyrelsen.dk/Sider/resultater.aspx?Reg=".$_GET['user'];
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);
$dom = new DOMDocument();
@$dom->loadHTML($html);
$dom->preserveWhiteSpace = false;
$val = [
    "Dato" => [],
    "Resultat" => [],
    "Km-stand" => [],
    "Reg.nr" => [],
];
$x = new DOMXpath($dom);

$test = $x->evaluate('//table[contains(@id,"tblInspections")]/tbody/tr');

if ($test->length == 0) {
    exit('No matches found.');
}

for ($i = 0; $i < $test->length; $i++) {
    $val["Dato"][] = $test[$i]->childNodes[1]->textContent;
    $val["Resultat"][] = $test[$i]->childNodes[3]->textContent;
    $val["Km-stand"][] = $test[$i]->childNodes[5]->textContent;
    $val["Reg.nr"][] = $test[$i]->childNodes[7]->textContent;
}

echo '<pre>',print_r($val,1),'</pre>';

