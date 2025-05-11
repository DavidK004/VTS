<?php 
    require_once("user.php"); 
    require_once("advancedUser.php");   
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
    $advancedUser = new advancedUser("MizuNoKami","Aqua","Konosuba","aqua@konosuba.rs",1000,"Axel Academy",["healing","tricks","useless"],"goddess","Axel","https://github.com/DavidK004/");


    echo $userOne->getName() . "<br>";
    $userOne->showUserData();
    echo "skils: <br>";
    $userOne->showSkills();
    echo $userOne->validateEmail() . "<br>";
    



    echo "<br>";
    echo $userTwo->getName() . "<br>";
    $userTwo->showUserData();
    echo "skils: <br>";
    $userTwo->showSkills();
    echo $userTwo->validateEmail() . "<br>";
   

    echo "<br>";
    echo $advancedUser->getName() . "<br>";
    $advancedUser->showUserData();
    echo "skils: <br>";
    $advancedUser->showSkills();
    echo $advancedUser->validateEmail() . "<br>";
    echo htmlspecialchars($advancedUser->getGithubProfile());

    echo "<br> <br>";
    echo "ukupan broj korisnika: " . User::$userCount;
    ?>
</body>
</html>