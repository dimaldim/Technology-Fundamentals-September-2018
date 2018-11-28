<?php
$days = intval(readline());
$users = intval(readline());
$moneyPerSearch = floatval(readline());
$total = 0.0;
for ($i = 1; $i <= $users; $i++) {
    $words = readline();
    $val = 1;
    if ($words > 5) {
        $val = 0;
    } else {
        if ($words == 1) {
            $val = 2;
        }
    }
    if ($i % 3 == 0) {
        $val *= 3;
    }
    $total += $val;
}
$total *= $moneyPerSearch * $days;
printf("Total money earned for %d days: %.2f", $days, $total);