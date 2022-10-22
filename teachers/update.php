<?php

include ("../init.php");
use Models\Teacher;

try{
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $contact_number = $_POST['contact_number'];
        $employee_number = $_POST['employee_number'];

        $teacher= new Teacher ('','','','','','');
        $teacher->setConnection($connection);
        $teacher->getById($id);

        $teacher->updateTeacher($first_name, $last_name, $email, $contact_number, $employee_number);
        echo "<script>window.location.href='index.php';</script>";
        exit;
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}




