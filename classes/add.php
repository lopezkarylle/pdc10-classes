<?php

include ("../init.php");
use Models\Classes;

$class= new Classes('Integrative Programming and Technologies', 'Welcome to IPT10 - Integrative Programming Technologies class', 'IPT10');
$class->setConnection($connection);
$all_Classes = $class->save();
var_dump($class);