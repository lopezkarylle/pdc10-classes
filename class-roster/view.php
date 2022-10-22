<?php

include ("../init.php");
use Models\ClassRoster;
use Models\Classes;

$id = intval($_GET['id']);

$class_id = intval($_GET['id']);
$class= new Classes('', '', '', '','', '');
$class->setConnection($connection);
$class->getById($class_id);
$class_code = $class->getClassCode();
$all_classes = $class->displayClassRoster($class_id);

$roster= new ClassRoster('', '', '', '', '', '');
$roster->setConnection($connection);

$all_rosters = $roster->viewClassRoster($class_code);

$template = $mustache->loadTemplate('classroster/view.mustache');
echo $template->render((compact('all_classes','all_rosters','id')));

?>