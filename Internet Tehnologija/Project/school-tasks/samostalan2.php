<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task</title>
</head>
<body>

<form action="chack.php" method="GET">
    <h2>Fill the form: </h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br>

    <label>You are: </label><br>
    
    <input type="radio" name="gender" id="male" value="m">
    <label for="male">Male</label><br>
    <input type="radio" name="gender" id="female" value="f">
    <label for="female">Female</label>  <br>
    
    <label for="membership">Membership: </label><br>
    <select name="membership" id="membership">
        <option value="0">choose</option>
        <option value="3500">One Week</option>
        <option value="10000">One Month</option>
        <option value="90000">One Year</option>
    </select><br><br>

    <button type="submit">send</button>
    <button type="reset">cancel</button>
</form>

<?php

if(isset($_GET['error_message'])){
    $error_message = $_GET['error_message'] ;
} else{
    $error_message = null;
}



if(isset($error_message)){

    echo '<span style="color: #f00">'. $error_message. '</span>';
}

if(isset($_GET['res'])){
    $res = $_GET['res'];
} else{
    $res = null;
}



if(isset($res)){

    echo '<span style="color: #0f0">'. $res. '</span>';
}

?>

</body>
</html>