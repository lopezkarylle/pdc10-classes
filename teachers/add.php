<?php

include ("../init.php");
use Models\Teacher;


$template = $mustache->loadTemplate('teacher/add.mustache');
echo $template->render();

try {
    if (isset($_POST['first_name'])) {
        $saveTeacher = new Teacher($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact_number'], $_POST['employee_number']);
        $saveTeacher->setConnection($connection);
        $saveTeacher->saveTeacher();
        header('Location: index.php');
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}

?>