<?php
    include_once(__DIR__."/../Utils/userutils.php");
    if(!isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    
    addUser($username,$password,$firstname,$lastname,$phone,$email,$gender);
    }
    echo "c'est pas cassé";
    header("Location:".__DIR__."/../index.php");


?>