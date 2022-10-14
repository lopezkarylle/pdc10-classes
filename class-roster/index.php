<?php

include ("../init.php");
use Models\ClassRoster;

$classRoster= new Classes('', '', '', '', '', '');
$classRoster->setConnection($connection);
$all_ClassRosters = $classRoster->getAll();
var_dump($all_ClassRosters);