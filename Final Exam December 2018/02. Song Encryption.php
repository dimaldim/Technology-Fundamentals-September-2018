<?php
while (($command = readline()) != "end") {
    $tokens = explode(":", $command);
    $artist = $tokens[0];
    $song = $tokens[1];
    $checkArtist = preg_match("/^[A-Z][a-z\s\\']+$/m", $artist);
    $checkSong = preg_match('/^[A-Z\s]+$/m', $song);
    if (!$checkArtist || !$checkSong) {
        echo "Invalid input!".PHP_EOL;
    } else {
        $newString = "";
        for ($i = 0; $i < strlen($artist); $i++) {
            $newString .= encrypt($artist[$i], strlen($artist));

        }
        $newString .= "@";
        for ($i = 0; $i < strlen($song); $i++) {
            $newString .= encrypt($song[$i], strlen($artist));
        }
        echo "Successful encryption: {$newString}".PHP_EOL;
    }
}

function encrypt($data, $step)
{
    if (ord($data) == 32 || ord($data) == 39) {
        if (ord($data) == 32) {
            $chr = 32;
        } else {
            if (ord($data) == 39) {
                $chr = 39;
            }
        }
    } else {
        if (ctype_upper($data)) {
            $newChar = ord($data) + $step;
            if ($newChar > 90) {
                $step = 64 + ((ord($data) + $step) - 90);
            } else {
                $step = ord($data) + $step;
            }
            $chr = $step;
        } else {
            if (ctype_lower($data)) {
                $newChar = ord($data) + $step;
                if ($newChar > 122) {
                    $step = 96 + ((ord($data) + $step) - 122);
                } else {
                    $step = ord($data) + $step;
                }
                $chr = $step;
            }
        }
    }

    return chr($chr);
}
