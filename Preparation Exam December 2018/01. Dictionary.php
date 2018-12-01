<?php

class Dictionary
{
    private $word;
    private $definitions = [];

    /**
     * Dictionary constructor.
     * @param $word
     * @param array $definitions
     */
    public function __construct($word, $definitions)
    {
        $this->word = $word;
        $this->definitions[] = $definitions;
    }

    /**
     * @return mixed
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * @param mixed $word
     */
    public function setWord($word)
    {
        $this->word = $word;
    }

    /**
     * @return array
     */
    public function getDefinitions()
    {
        uasort(
            $this->definitions,
            function ($a, $b) {
                return strlen($b) <=> strlen($a);
            }
        );

        return $this->definitions;
    }

    /**
     * @param array $definitions
     */
    public function setDefinitions($definitions)
    {
        $this->definitions[] = $definitions;
    }


}

function checkWord($data, $word)
{
    foreach ($data as $val) {
        if ($val->getWord() == $word) {
            return true;
        }
    }

    return false;
}

$words = readline();
$second = readline();
$command = readline();

$wordAndDefinitions = explode(" | ", $words);

$arr = [];
for ($i = 0; $i < count($wordAndDefinitions); $i++) {
    $tokens = explode(": ", $wordAndDefinitions[$i]);
    $word = $tokens[0];
    $definition = $tokens[1];
    if (checkWord($arr, $word)) {
        foreach ($arr as $data) {
            if ($data->getWord() == $word) {
                $data->setDefinitions($definition);
            }
        }
    } else {
        $dictionary = new Dictionary($word, $definition);
        array_push($arr, $dictionary);
    }
}
$printDef = explode(" | ", $second);
for ($i = 0; $i < count($printDef); $i++) {
    $word = $printDef[$i];
    if (checkWord($arr, $word)) {
        echo $word.PHP_EOL;
        foreach ($arr as $data) {
            if ($data->getWord() == $word) {
                foreach ($data->getDefinitions() as $def) {
                    echo " -$def".PHP_EOL;
                }
            }
        }
    }
}
$output = [];
if ($command == "End") {
    return;
} else {
    if ($command == "List") {
        foreach ($arr as $data) {
            $output[] = $data->getWord();
        }
        asort($output);
        echo implode(" ", $output);
    }
}