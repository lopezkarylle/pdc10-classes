<?php
include "../init.php";
use Models\ClassRoster;

$id = $_GET['id']??null;

try {
    if(isset($_GET['id'])){
        $classRoster = new ClassRoster('', '');
        $classRoster->setConnection($connection);
        $classRoster->getById($id);
        $classRoster->deleteClassRoster();
        $class_code = $class_roster->getClassCode();
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}
?>