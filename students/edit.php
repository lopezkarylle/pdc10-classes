<?php

include ("../init.php");
use Models\Student;

    $id = $_GET['id'];
    $student= new Student ('','','','','','');
    $student->setConnection($connection);
    $student->getById($id);

    $first_name= $student->getFirstName();
    $last_name= $student->getLastName();
    $student_number = $student->getStudentNumber();
    $email= $student->getEmail();
    $contact_number= $student->getContactNumber();
    $program= $student->getProgram();

    $template = $mustache->loadTemplate('student/edit.mustache');
    echo $template->render(compact('student', 'id', 'first_name', 'last_name', 'student_number', 'email', 'contact_number', 'program'));





