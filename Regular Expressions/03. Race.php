<?php
$input = explode(", ", readline());
$userList = [];
while (($command = readline()) != "end of race") {
    preg_match_all('/[a-zA-Z]/mi', $command, $matches, PREG_SET_ORDER, 0);
    $users = "";
    foreach ($matches as $user) {
        $users .= $user[0];
    }
    if (in_array($users, $input) && !key_exists($users, $userList)) {
        $userList[$users] = 0;
    }
    preg_match_all('/[\d](\.)*/mi', $command, $nums, PREG_SET_ORDER, 0);
    if (key_exists($users, $userList)) {
        for ($i = 0; $i < count($nums); $i++) {
            $userList[$users] += array_sum($nums[$i]);
        }
    }
}
arsort($userList);
$arr = array_keys($userList);
for ($i = 0; $i < 3; $i++) {
    switch ($i) {
        case 0:
            $t = "st";
            break;
        case 1:
            $t = "nd";
            break;
        case 2:
            $t = "rd";
    }
    printf("%d%s place: %s\n", $i + 1, $t, $arr[$i]);
}