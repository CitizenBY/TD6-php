<?php
include_once(__DIR__."/./Utils/userUtils.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h3><b>Question 1 :</b> Add new user</h3>
    <form name = "newUser" action = "Scripts\dbmodif.php" method = "post">
    <?php
        $inputs=array(
            "username"=>"username","password"=>"password",
            "firstname"=>"firstname","lastname"=>"lastname");
        foreach ($inputs as $key=>$input)
        {
            echo '<input name = '.$key.' placeholder = '.$input.'></p>';
        };
    ?>
        <input type="email" placeholder = "e-mail" name = "email"></p>
        <input type="tel" placeholder = "Phone Number" name = "phone"></p>
        <select name="gender">
            <option value="male">Male</option>
            <option value = "female">Female</option>
        </select> </p>
        <input type = "submit" name = "Register" value = "Register">

    <?php
        $users =getAllUsers();

        echo "<table border>";
        foreach($users as $key =>$user){
             echo "<tr>";
             foreach($user as $calName => $value){
                 echo "<td>$value</td>";
             }
             echo"</tr>";
         }
         echo "</table>";

        
    ?>

    <h3><b>Question 2 :</b> Modify username</h3>
    <p>Select the user to modify</p>
    <form action = "Scripts\userModif.php" method = "post">
    <select name="username">
         <?php
            $usernames = getAllUsernames();
            foreach($usernames as $key =>$username){
                echo "<option value ='".$username."'>".$username."</option>";
            }
         ?>
    </select></p>
    <input placeholder = "New Username" name="newUsername"></p>
    <input type ="submit" name = "modify" value = "Modify">

        


</body>
</html>