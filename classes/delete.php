<?php

include ("../init.php");
use Models\Classes;

$id=$_GET['id'] ?? null;
$classes= new Classes ('','','','','','');
$classes->setConnection($connection);
$classes->getById($id);
$classes->deleteClasses();
echo "<script>window.location.href='index.php';</script>";
exit;

?>