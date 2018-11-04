<?php
include_once(__DIR__."/../Utils/userutils.php");

$id=$_POST['articleTitle'];

deleteArticle($id);

header("Location:".__DIR__."/../index.php");

?>