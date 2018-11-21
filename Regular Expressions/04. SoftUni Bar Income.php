<?php
$arr = [];
$totalIncome = 0;
while (($input = readline()) != "end of shift") {
    preg_match_all('/%([A-Z][a-z]+)%/', $input, $customer, PREG_SET_ORDER, 0);
    $custom = "";
    foreach ($customer as $name) {
        $custom = $name[1];
    }
    preg_match_all('/<(.+)>/', $input, $product, PREG_SET_ORDER, 0);
    $prod = "";
    foreach ($product as $p) {
        $prod = $p[1];
    }
    preg_match_all('/\|(\d+)\|/', $input, $productCount, PREG_SET_ORDER, 0);
    $count = 0;
    foreach ($productCount as $c) {
        $count = intval($c[1]);
    }
    preg_match_all('/[\d]+(\.)*([\d]+)*\$/', $input, $productPrice, PREG_SET_ORDER, 0);
    $price = 0.0;
    foreach ($productPrice as $p) {
        $price = floatval(substr($p[0], 0, -1));
    }
    if (!empty($custom) && !empty($prod) && $count != 0 && $price != 0) {
        $total = $price * $count;
        $totalIncome += $total;
        printf("%s: %s - %.2f\n", $custom, $prod, $total);
    }
}
printf("Total income: %.2f", $totalIncome);


