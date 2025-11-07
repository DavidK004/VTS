<?php 
    require_once("user.php");   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserTask</title>
</head>
<body>
    <?php 
    $userOne = new user("GreenDavid004","David","Katrinka","katrinkadavid2004@gmail.com",20,"vts",["html/css","js","arduino"]);
    $userTwo = new user("Steve Dekart","Stepan","Turicin","kiritogamesgmail.com",21,"vts",["django","vue","nuxt"]);


    echo $userOne->getName() . "<br>";
    $userOne->showUserData();
    echo "skils: <br>";
    $userOne->showSkills();
    echo $userOne->validateEmail() . "<br>";
    $userOne->setEmail("greendavid@protonmail.me");
    echo $userOne->validateEmail() . "<br>";



    echo "<br>";
    echo $userTwo->getName() . "<br>";
    $userTwo->showUserData();
    echo "skils: <br>";
    $userTwo->showSkills();
    echo $userTwo->validateEmail() . "<br>";
    $userTwo->setEmail("kiritogames@gmail.com");
    echo $userTwo->validateEmail() . "<br>";
    ?>
</body>
</html>