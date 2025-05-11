<?php 
require_once("config.php");
require_once("hw3.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    $as = new selectArray('selectArr','id0', 'keys',$months, true);
    $as->setDefaultValue(3);
    $as->render();
    
    $as2 = new selectArray('selectArr','id0', 'values',$months);
    $as2->setDefaultValue('May');
    $as2->render();
    ?>
    <br>
    <?php 
    $ns = new selectNumber('selsectNum','id3','start bigger than end',23, 5);
    $ns->setDefaultValue(6);
    $ns->render();
    $ns2 = new selectNumber('selsectNum','id3','start smaller than end',2, 30);
    $ns2->setDefaultValue(10);
    $ns2->render();
    ?>
</body>
</html>