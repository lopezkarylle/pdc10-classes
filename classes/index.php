<?php

include ("../init.php");
use Models\Classes;

$class= new Classes('', '', '', '', '', '');
$class->setConnection($connection);
$all_Classes = $class->getAll();
var_dump($all_Classes);