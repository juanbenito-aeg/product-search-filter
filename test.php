<?php

class ClassA {
  const CONSTANT = "A";

  public function echoConstant()
  {
    echo static::CONSTANT;
  } 
}

class ClassB extends ClassA {
  const CONSTANT = "B";
}

$a = new ClassA;
$a->echoConstant();

$b = new ClassB;
$b->echoConstant();
