<?php
include ("../init.php");
use Models\ClassRoster;
use Models\Classes;
use Models\Student;

$classRoster_id = intval($_GET['classRoster_id']);

$class= new Classes('', '', '', '','', '');
$class->setConnection($connection);
$class->getById($roster_id);
$all_classes = $class->showClassRoster(classRoster_id);

$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$all_students = $student->saveStudents();

$template = $mustache->loadTemplate('classroster/add.mustache');
echo $template->render(compact('all_classes', 'all_students'));
?>