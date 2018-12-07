<?php

class CaesarCipher
{
    private $map;

    /**
     * CaesarCipher constructor.
     * @param $shift
     */
    public function __construct($shift)
    {
        $this->map = array_combine(
            range('A', 'Z'),
            array_map(
                function ($letter) use ($shift) {
                    return chr(((ord($letter) - 65 + $shift) % 26) + 65);
                },
                range('A', 'Z')
            )
        );
    }

    /**
     * @param $string
     * @return string
     */
    public function encode($string)
    {
        return strtr(strtoupper($string), $this->map);
    }

    /**
     * @param $string
     * @return string
     */
    public function decode($string)
    {
        return strtr(strtoupper($string), array_flip($this->map));
    }
}

$c = new CaesarCipher(5);
var_dump($c->encode('Codewars'));
var_dump($c->decode('BFKKQJX'));
