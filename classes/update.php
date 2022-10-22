<?php

include ("../init.php");
use Models\Classes;

try{
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $class_code = $_POST['class_code'];
        $teacher_id = $_POST['teacher_id'];
        $class= new Classes('', '', '', '', '', '');
        $class->setConnection($connection);
        $class->getById($id);
        // var_dump($name, $description, $class_code, $teacher_id);
        $class->updateClasses($name, $description, $class_code, $teacher_id);
        echo "<script>window.location.href='index.php';</script>";
        exit;
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}




