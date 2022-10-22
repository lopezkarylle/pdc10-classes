<?php
include ("../init.php");
use Models\ClassRoster;
use Models\Classes;
use Models\Student;

$id = intval($_GET['id']);

$class= new Classes('', '', '', '','', '');
$class->setConnection($connection);
$class->getById($id);
$class_code = $class->getClassCode();
$all_classes = $class->displayClassRoster($id);

$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$all_students = $student->getAll();

$template = $mustache->loadTemplate('classroster/add.mustache');
echo $template->render(compact('all_classes', 'all_students', 'id', 'class_code'));


?>