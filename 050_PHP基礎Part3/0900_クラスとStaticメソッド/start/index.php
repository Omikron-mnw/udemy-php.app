<?php

use animal\Person as AnimalPerson;
use Person as GlobalPerson;

/**
 * クラス内のthis
 */
class Person
{
    private $name;
    public $age;
    public static $whereTolive = 'Earth';

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function hello() {
        echo 'hello, ' . $this->name;
        echo static::bye();
        return $this;
    }

    static function bye() {
        echo 'bye';
    }
}

$bob = new Person('Bob', 18);
$bob->hello();
echo Person::$whereTolive;
// Person::bye();
// $bob->hello()->bye();

// $tim = new Person('Tim', 32);
// $tim->hello();