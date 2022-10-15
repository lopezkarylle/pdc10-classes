<?php

include ("../init.php");
use Models\Classes;


$template = $mustache->loadTemplate('classes/add.mustache');
echo $template->render();

try {
    if (isset($_POST['name'])) {
        $saveClasses = new Classes($_POST['name'], $_POST['description'], $_POST['class_code']);
        $saveClasses->setConnection($connection);
        $saveClasses->saveClasses();
        header('Location: index.php');
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}

?>