<?php
$num1 = readline();
$num2 = readline();

echo multiply($num1, $num2);

/**
 * @param $num1
 * @param $num2
 * @return array|bool|string|void
 */
function multiply($num1, $num2)
{
    if (!preg_match("/^\d+$/", $num1) || !preg_match("/^\d+$/", $num2)) return;
    for ($i = 0; $i < strlen($num1); $i++)
        if (@$num1{$i} != '0') {
            $num1 = substr($num1, $i);
            break;
        }
    for ($i = 0; $i < strlen($num2); $i++)
        if (@$num2{$i} != '0') {
            $num2 = substr($num2, $i);
            break;
        }
    $length1 = strlen($num1);
    $length2 = strlen($num2);
    $calculated = $remainders = array();
    for ($y = $i = 0; $y < $length1; $y++)
        for ($x = 0; $x < $length2; $x++)
            @$calculated[$i++ % $length2] .= sprintf('%02d', (int)$num1{$y} * (int)$num2{$x});
    for ($y = 0; $y < $length2; $y++)
        for ($x = 0; $x < $length1 * 2; $x++)
            @$remainders[Floor(($x - 1) / 2) + 1 + $y] += (int)$calculated[$y]{$x};
    $remainders = array_reverse($remainders);
    for ($i = 0; $i < count($remainders); $i++) {
        $Rema3 = str_split(strrev($remainders[$i]));
        for ($o = 0; $o < count($Rema3); $o++)
            if ($o == 0) @$remainders[$i + $o] = $Rema3[$o];
            else @$remainders[$i + $o] += $Rema3[$o];
    }
    $remainders = strrev(implode($remainders));
    while (strlen($remainders) > 1 && $remainders{0} == '0')
        $remainders = substr($remainders, 1);

    return $remainders;
}