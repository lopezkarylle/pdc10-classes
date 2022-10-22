<?php

include ("../init.php");
use Models\Classes;
use Models\Teacher;

$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$all_teachers = $teacher->getAll();

$id = $_GET['id']??null;


$class= new Classes('', '', '', '', '', '');
$class->setConnection($connection);
$class->getById($id);
$name= $class->getName();
$description= $class->getDescription();
$class_code = $class->getClassCode();
$teacher_id = $class->getTeacherId();

$template = $mustache->loadTemplate('classes/edit.mustache');
echo $template->render(compact('id', 'all_teachers', 'class', 'name', 'description', 'class_code', 'teacher_id'));






