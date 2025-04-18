<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="banner">
            <br>
            <br>
            <br>
            <h1 class="title"><span class="red">P</span>REMIER <span class="red">H</span>OCKEY <span class="red">S</span>CHOOL</h1>
            <h4 class="subtitle">Ultimate school for the best</h4>
        </div>
        <hr class="divider">
        
        <div class="nav">S
        <img src="head.gif" alt="">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">History</a></li>
                <li><a href="">Pictures</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Trainters</a></li>
                <li><a href="">Awards</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="registration">
                <img src="mask.jpg" alt=""> <br>
                FIll in the <span>online</span> <br>
                registration! <br> <br>
                <form action="reg.php" method="POST">
                    <label for="username">username: </label> <br>
                    <input name="username" type="text" id="username"> <br> <br>
                    <label for="password">password: </labe> <br>
                    <input name="password" type="password" id="password"> <br> <br>
                    you are: <br> <br>
                    <input type="radio" name="gender" id="male" value="male" checked>
                    <label for="male">male</label> <br> <br>
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">female</label> <br> <br>
                    <button type="submit">REGISTER</button>
                    <button type="reset">cancel</but>
                </form>
            </div>
            <div class="trainers">
                <p>Our unique and exclusive approach to developing stickhandling skills.</p>
                <p>Having the best qualified and trained instructors in the hockey school business. Only instructors certified by Real Turcotte are eligible to teach our students.</p>
                <p>Having the best designed programs for the improvement of each individual student.</p>
                <img src="1.gif" alt="">
                <img src="2.gif" alt=""> <br>
                Set of 2 DVDS including 24 different moves!
                <ol type="a" start="4">
                    <li>Standing still</li>
                    <li>Game situation in slow motion</li>
                    <li>Demonstarted at game speedw</li>
                </ol>
            </div>
        </div>
        <?php

if(isset($_GET['error_message'])){
    $error_message = $_GET['error_message'] ;
} else{
    $error_message = null;
}



if(isset($error_message)){

    echo '<span style="color: #f00; background-color: gray; padding: 0 9px">'. $error_message. '</span>';
}



if(isset($_GET['fullPrice'])){
    $fullPrice = $_GET['fullPrice'] ;
} else{
    $fullPrice = null;
}



if(isset($fullPrice)){

    echo '<span style="color: #f00; background-color: gray; padding: 0 9px">'.$_GET['usrName'].', vaša cena je: '. $fullPrice. '</span>';
}
?>
    </div>
    
    
</body>
</html>