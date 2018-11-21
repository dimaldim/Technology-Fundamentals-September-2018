<?php

class Person
{
    private $name;
    private $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

}

$n = intval(readline());
$arr = [];
for ($i = 1; $i <= $n; $i++) {
    $tokens = explode(" ", readline());
    $name = $tokens[0];
    $age = $tokens[1];
    $person = new Person($name, $age);
    array_push($arr, $person);
}
uasort($arr, function(Person $a, Person $b) {
   return strcmp($a->getName(), $b->getName());
});
foreach ($arr as $output) {
    if ($output->getAge() > 30) {
        echo "{$output->getName()} - {$output->getAge()}" . PHP_EOL;
    }
}