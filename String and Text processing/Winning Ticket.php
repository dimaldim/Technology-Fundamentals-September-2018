<?php
$input = preg_split('/[, ]+/', readline());

for ($i = 0; $i < count($input); $i++) {
    if (strlen($input[$i]) == 20) {
        $ticket = $input[$i];
        $left = substr($ticket, 0, 10);
        $right = substr($ticket, 10, 20);
        $leftMatch = "a";
        $rightMatch = "s";
        $pattern = '/[\\\\@]{6,}|[\\\\$]{6,}|[\\\\#]{6,}|[\\\\^]{6,}/';
        $lm = preg_match($pattern, $left, $match1);
        $rm = preg_match($pattern, $right, $match2);
        if($lm) {
            $leftMatch = $match1[0];
        }
        if($rm) {
            $rightMatch = $match2[0];
        }
        if (substr($leftMatch, 0, 1) == substr($rightMatch, 0, 1)) {
            $count = min(strlen($leftMatch), strlen($rightMatch));
            if ($count == 10) {
                printf("ticket \"%s\" - %d%s Jackpot!\n", $ticket, $count, substr($leftMatch, 0, 1));
            } else {
                printf("ticket \"%s\" - %d%s\n", $ticket, $count, substr($leftMatch, 0, 1));
            }
        } else {
            printf("ticket \"%s\" - no match\n", $ticket);
        }
    } else {
        echo "invalid ticket" . PHP_EOL;
    }
}