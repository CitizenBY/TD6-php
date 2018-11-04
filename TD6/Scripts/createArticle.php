<?php
    include_once(__DIR__."/../Utils/userutils.php");

    $username=$_POST["username"];
    $articleTitle=$_POST["articleTitle"];
    $articleContent=$_POST["articleContent"];

    createArticle($username,$articleTitle,$articleContent);

    header("Location:".__DIR__."/../index.php");


?>
