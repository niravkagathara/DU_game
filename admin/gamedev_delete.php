<?php 

require_once 'auth_check.php';

include_once '../classes/Gamedevs.php';
$dev=new GamesDev();
$_SESSION['dele']= $dev->deleteById($_GET['id']);

header('Location:index.php');
?>