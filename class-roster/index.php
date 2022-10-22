<?php

include ("../init.php");
use Models\ClassRoster;

$class_roster= new ClassRoster('', '', '', '', '', '');
$class_roster->setConnection($connection);
$all_rosters = $class_roster->showClassRoster();

$template = $mustache->loadTemplate('classroster/index.mustache');
echo $template->render(compact('all_rosters'));