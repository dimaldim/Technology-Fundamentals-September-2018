<?php

class Band
{
    private $title;
    private $time;
    private $members = [];

    /**
     * Band constructor.
     * @param $title
     * @param $time
     * @param array $members
     */
    public function __construct($title, $time, array $members)
    {
        $this->title = $title;
        $this->time = $time;
        $this->members = $members;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time += $time;
    }

    /**
     * @return array
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    /**
     * @param array $members
     */
    public function setMembers($members)
    {
        foreach ($members as $member) {
            if (!$this->checkMember($member)) {
                $this->members[] = $member;
            }
        }
    }

    private function checkMember($member)
    {
        if (in_array($member, $this->getMembers())) {
            return true;
        }

        return false;
    }

}

function checkBand($data, $band)
{
    foreach ($data as $val) {
        if ($val->getTitle() == $band) {
            return true;
        }
    }

    return false;
}

$bands = [];

while (($command = readline()) != "start of concert") {
    $tokens = explode("; ", $command);
    $type = $tokens[0];
    if ($type == "Add") {
        $bandName = $tokens[1];
        $members = explode(", ", $tokens[2]);
        if (!checkBand($bands, $bandName)) {
            $band = new Band($bandName, 0, $members);
            array_push($bands, $band);
        } else {
            foreach ($bands as $data) {
                if ($data->getTitle() == $bandName) {
                    $data->setMembers($members);
                }
            }
        }
    }
    if ($type == "Play") {
        $bandName = $tokens[1];
        $time = $tokens[2];
        if (checkBand($bands, $bandName)) {
            foreach ($bands as $data) {
                if ($data->getTitle() == $bandName) {
                    $data->setTime($time);
                }
            }
        } else {
            $band = new Band($bandName, $time, []);
            array_push($bands, $band);
        }
    }
}
$input = readline();
$totalTime = 0;
foreach ($bands as $data) {
    $totalTime += $data->getTime();
}
uasort(
    $bands,
    function ($a, $b) {
        if ($a->getTime() <> $b->getTime()) {
            return $b->getTime() <=> $a->getTime();
        }

        return $a->getTitle() <=> $b->getTitle();
    }
);
echo "Total time: {$totalTime}".PHP_EOL;
foreach ($bands as $data) {
    echo "{$data->getTitle()} -> {$data->getTime()}".PHP_EOL;
}
echo $input.PHP_EOL;
foreach ($bands as $data) {
    if ($data->getTitle() == $input) {
        foreach ($data->getMembers() as $members) {
            echo "=> {$members}".PHP_EOL;
        }
    }
}
