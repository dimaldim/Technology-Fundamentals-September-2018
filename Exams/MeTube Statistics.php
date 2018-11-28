<?php

class Videos
{
    private $videoName;
    private $views;
    private $likes;

    /**
     * Videos constructor.
     * @param $videoName
     * @param $views
     * @param $likes
     */
    public function __construct($videoName, $views, $likes)
    {
        $this->videoName = $videoName;
        $this->views = $views;
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getVideoName()
    {
        return $this->videoName;
    }

    /**
     * @param mixed $videoName
     */
    public function setVideoName($videoName): void
    {
        $this->videoName = $videoName;
    }

    /**
     * @return mixed
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param mixed $views
     */
    public function setViews($views): void
    {
        $this->views += $views;
    }

    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes): void
    {
        $this->likes += $likes;
    }

}

function videoExists($data, $videoName)
{
    foreach ($data as $val) {
        if ($val->getVideoName() == $videoName) {
            return true;
        }
    }

    return false;
}

$data = [];
while (($command = readline()) != "stats time") {
    $tokens = preg_split('/[-:]+/', $command, 0, PREG_SPLIT_NO_EMPTY);
    if ($tokens[0] != "like" && $tokens[0] != "dislike") {
        $videoName = $tokens[0];
        $views = $tokens[1];
        if (!videoExists($data, $videoName)) {
            $video = new Videos($videoName, $views, 0);
            array_push($data, $video);
        } else {
            foreach ($data as $val) {
                if ($val->getVideoName() == $videoName) {
                    $val->setViews($views);
                }
            }
        }
    } else {
        if ($tokens[0] == "like") {
            $videoName = $tokens[1];
            if (videoExists($data, $videoName)) {
                foreach ($data as $val) {
                    if ($val->getVideoName() == $videoName) {
                        $val->setLikes(1);
                    }
                }
            }
        } else {
            if ($tokens[0] == "dislike") {
                $videoName = $tokens[1];
                if (videoExists($data, $videoName)) {
                    foreach ($data as $val) {
                        if ($val->getVideoName() == $videoName) {
                            $val->setLikes(-1);
                        }
                    }
                }
            }
        }
    }
}
$orderBy = readline();
uasort(
    $data,
    function (Videos $a, Videos $b) use ($orderBy) {
        if ($orderBy == "by views") {
            return strcoll($b->getViews(), $a->getViews());
        } else {
            if ($orderBy == "by likes") {
                return strcoll($b->getLikes(), $a->getLikes());
            }
        }
    }
);
foreach ($data as $val) {
    echo "{$val->getVideoName()} - {$val->getViews()} views - {$val->getLikes()} likes".PHP_EOL;
}