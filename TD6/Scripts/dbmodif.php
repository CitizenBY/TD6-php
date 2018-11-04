<?php
    include_once(__DIR__."/../Utils/userutils.php");

    
    $username=$_POST['username'];

    $usernames = getAllUsernames();
    if(!in_array($username, $usernames)){

        $password=$_POST['password'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $gender=$_POST['gender'];
        
        addUser($username,$password,$firstname,$lastname,$phone,$email,$gender);
        
    }

    header("Location:".__DIR__."/../index.php");


?>