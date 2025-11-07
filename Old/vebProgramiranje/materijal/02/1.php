<?php

/*
  https://www.php.net/manual/en/intro.classobj.php
  https://phptherightway.com/
  https://phpthewrongway.com/
*/

class Person1
{
    public bool $isAlive = true;
    public string $firstname;
    public string $lastname;
    public int $age;
}

$teacher = new Person1();
$student = new Person1();

echo $teacher->isAlive;
var_dump($teacher);
var_dump($student);
