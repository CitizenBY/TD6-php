<?php
include_once(__DIR__."/./dbUtils.php");


function getAllUsers() {
  $mysql = connect();

  $query = "SELECT firstname, lastname, username FROM user";

  $req = $mysql->prepare($query);
  execute($req);

  $users = array();

  while($row = $req->fetch()) {
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $username = $row["username"];

    $user = array(
      "username" => $username,
      "firstname" => $firstname,
      "lastname" => $lastname
      
    );

    array_push($users, $user);
  }

  return $users;
}
function userExists($username,$password) {
  $mysql = connect();

  $query="SELECT firstname, lastname
  FROM user
  WHERE  username=:username AND password=:password";

  $req = $mysql->prepare($query);
  $data = array(
    "username" => $username,
    "password" => $password
  );

  execute($req,$data);


   while($row = $req->fetch()) {
     $firstname = $row["firstname"];
     $lastname = $row["lastname"];
     $user = array(
       "firstname" => $firstname,
       "lastname" => $lastname
      );
    }
    if (!empty($user)) {
      return "I found the user ".$user["firstname"]." ".$user["lastname"];
    }
    else {
      return "The user does not exist";
    }

}

function getAllArticles() {
  $mysql = connect();

  $query = "SELECT title, content, date
  FROM article";

  $req = $mysql->prepare($query);
  execute($req);

  $articles=array();

  while($row = $req->fetch()){
    $title = $row['title'];
    $content = $row['content'];
    $date = $row['date'];

    $article = array(
      "title" => $title,
      "content" => $content,
      "date" => $date
    );

    array_push($articles,$article);
  }

  return $articles;
}

function addUser($username,$password,$firstname,$lastname,$phone,$email,$gender){
  $mysql=connect();

  $query="INSERT INTO user(username,password,firstname,lastname,phone,email,gender)
  VALUES(:username, :password, :firstname, :lastname, :phone, :email, :gender)";

  $req = $mysql->prepare($query);
  $data = array(
    "username" => $username,
    "password" => $password,
    "firstname" => $firstname,
    "lastname" => $lastname,
    "phone" => $phone,
    "email" => $email,
    "gender" => $gender
  );
  execute($req,$data);

}

function getAllUsernames() {
  $mysql = connect();

  $query = "SELECT username FROM user";

  $req = $mysql->prepare($query);
  execute($req);

  $usernames = array();

  while($row = $req->fetch()) {
    $username = $row["username"];
    array_push($usernames, $username);
  }

  return $usernames;
}

function UpdateUsername($username,$NewUsername){
  $mysql = connect();

  $query = "UPDATE user 
  SET username =:newUsername 
  WHERE username =:username";

  $req = $mysql->prepare($query);

  $data = array(
    "username"=>$username,
    "newUsername"=>$NewUsername
  );

  execute($req,$data);


}

function createArticle($username,$articleTitle,$articleContent){
  $mysql = connect();

  $query = "INSERT INTO article(title,content, date,user_id)
  SELECT :title,:content,NOW(), id as user_id
  FROM user
  Where username=:username";

  $req = $mysql->prepare($query);

  $data = array(
    "title" => $articleTitle,
    "content" => $articleContent,
    "username" => $username
  );

  execute($req,$data);

}
function getAllArticlesTitlesFromJohnDoe() {
  $mysql = connect();

  $query = "SELECT title, id
  FROM article
  WHERE user_id='1'";

  $req = $mysql->prepare($query);
  execute($req);

  $articles=array();

  while($row = $req->fetch()){
    $title = $row['title'];
    $id = $row['id'];

    $articles[$id]=$title;
  }

  return $articles;
}
function deleteArticle($id){
$mysql= connect();

$query = "DELETE FROM article WHERE id=:id";

$req = $mysql->prepare($query);

$data = array('id' => $id);

execute($req,$data);
}

function getAllArticlesFromJohnDoe() {
  $mysql = connect();

  $query = "SELECT title, content, date
  FROM article
  WHERE user_id='1'";

  $req = $mysql->prepare($query);
  execute($req);

  $articles=array();

  while($row = $req->fetch()){
    $title = $row['title'];
    $content = $row['content'];
    $date = $row['date'];

    $article = array(
      "title" => $title,
      "content" => $content,
      "date" => $date
    );

    array_push($articles,$article);
  }

  return $articles;
}


?>