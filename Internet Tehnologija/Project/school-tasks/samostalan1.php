
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <form action="samostalan1.php">
        
        <fieldset>
        <legend>Digitron</legend>
        <label for="fNum">First Number:</label>
        <input type="number" name="fNum" id="fNum">
        <label for="operation"></label>
        <select name="operation" id="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <label for="sNum">Second Number:</label>
        <input type="number" name="sNum" id="sNum">
        <button type="submit">Rezultat</button>
        </fieldset>
    </form>


    <?php

if(!empty($_GET['fNum']) && !empty($_GET['sNum'])){    

if($_GET['sNum'] == 0 && $_GET['operation'] == "/"){
    echo "Cannot divide by zero";
} 
elseif($_GET['operation'] == "+"){
    echo "Result is: ".$_GET['fNum']+$_GET['sNum'];
}
elseif($_GET['operation'] == "-"){
    echo "Result is: ".$_GET['fNum']-$_GET['sNum'];
}
elseif($_GET['operation'] == "*"){
    echo "Result is: ".$_GET['fNum']*$_GET['sNum'];
}
elseif($_GET['operation'] == "/"){
    echo "Result is: ".$_GET['fNum']/$_GET['sNum'];
}
}
else{
    echo "Invalid Input";
}

?>
</body>
</html>
