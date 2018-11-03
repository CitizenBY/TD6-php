<?php 
include_once(__DIR__."/../Utils/userutils.php");
$username=$_POST['username'];
$NewUsername=$_POST['newUsername'];

UpdateUsername($username,$NewUsername);
header("Location:".__DIR__."/../index.php");

?>