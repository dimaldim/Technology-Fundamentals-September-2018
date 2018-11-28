<?php
$arr = [
    'dishesTime' => 0,
    'cleaningTime' => 0,
    'doingLundry' => 0,
];
while (($command = readline()) != "wife is happy") {
    //Dishes
    $str = preg_match('/<[a-z0-9]+>/m', $command, $match);
    for ($i = 0; $i < count($match); $i++) {
        for ($j = 0; $j < strlen($match[$i]); $j++) {
            if (is_numeric($match[$i][$j])) {
                $arr['dishesTime'] += $match[$i][$j];
            }
        }
    }
    //End dishes

    //Cleaning the house
    $str = preg_match('/\[[[A-Z0-9]+\]/m', $command, $match);
    for ($i = 0; $i < count($match); $i++) {
        for ($j = 0; $j < strlen($match[$i]); $j++) {
            if (is_numeric($match[$i][$j])) {
                $arr['cleaningTime'] += $match[$i][$j];
            }
        }
    }
    //
    // Doing the lundry
    $str = preg_match('/\{.+\}/m', $command, $match);
    for ($i = 0; $i < count($match); $i++) {
        for ($j = 0; $j < strlen($match[$i]); $j++) {
            if (is_numeric($match[$i][$j])) {
                $arr['doingLundry'] += $match[$i][$j];
            }
        }
    }
    //

}
$totalTime = array_sum($arr);
echo "Doing the dishes - {$arr['dishesTime']} min.".PHP_EOL;
echo "Cleaning the house - {$arr['cleaningTime']} min.".PHP_EOL;
echo "Doing the laundry - {$arr['doingLundry']} min.".PHP_EOL;
echo "Total - {$totalTime} min.";
