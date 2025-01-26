<?php
require_once '../db_config.php';
require_once 'functions.php';

$sql = "SELECT id, name, author, price, photo, availability FROM products";
if ($result = $connect -> query($sql)) {
    while ($row = $result -> fetch_assoc()) {
        $products[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Shop</title>
    <link rel="icon" type="image/x-icon" href="/Images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/styles.css" />
</head>
<body>
<header>
        <img src="../Images/logo.png" alt="kitsune-logo">
        <h1> <span class="kitsune"> Kitsune </span> - Admin Panel</h1>
        <div class="nav">
        <a class="products-link" href="../index.php">Home</a>
        <a class="products-link" href="../products.php">All Products</a>
        <a class="products-link" href="order.php">Order</a>
        </div>
    </header>
<?php
if (isset($_GET['operation'])){

 $operation = $_GET['operation'];

 switch (key($operation)) {

    case 'add_new':
        if (isset($_GET['submit'])) {

            createProduct($_GET['name'], $_GET['author'],$_GET['price'], $_GET['photo'], $_GET['availability']);
            
            header("Location: " . $_SERVER['PHP_SELF']);

        }
        else {
            $add_new = true;
        }
        break;

        case 'update':
            if (isset($_GET['submit'])) {
                updateProduct($operation['update'], $_GET['name'], $_GET['author'],$_GET['price'], $_GET['photo'], $_GET['availability']);
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            else {
                $sql = "SELECT id, name, author, price, photo, availability FROM products WHERE id = " . $operation['update'];
                if ($result = $connect -> query($sql)) {
                    $update = $result -> fetch_assoc();
                }         
            }
            break;
            
        case 'delete':
            deleteProduct($operation['delete']);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
 }



}
?>
<?php if (isset($update) || isset($add_new)) { ?>
    <section class="update">
         <div class="container">
            <h1 class="enter">Enter the data</h1>
            <form class="admin-update" method="GET">
                <input type="hidden" name="operation[<?php echo key($operation) ?>]" value="<?php echo $operation[key($operation)] ?>">
                <div class="update-item"><input placeholder="Name" type="text" name="name" value="<?php if(isset($update)) {echo $update['name'];} ?>"></div>
                <div class="update-item"><input placeholder="Author" type="text" name="author" value="<?php if(isset($update)){echo $update['author'];} ?>"></div>
                <div class="update-item"><input placeholder="Price" type="text" name="price" value="<?php if(isset($update)){echo $update['price'];} ?>"></div>
                <div class="update-item"><input placeholder="Photo" type="text" name="photo" value="<?php if(isset($update)){echo $update['photo'];} ?>"></div>
                <div class="update-item"><input placeholder="Availability" type="text" name="availability" value="<?php if(isset($update)){echo $update['availability'];} ?>"></div>
                <button class="admin-table-submit" type="submit" name="submit" value="true">Send</button>
            </form>
        </div>
    </section>
    <?php } ?>

<section class="panel">
        <div class="container">
            <form method="GET">
                <table class="admin-table">
                    <tr class="first">
                        <td>id</td>
                        <td>photo</td>
                        <td>name</td>
                        <td>author</td>
                        <td>price</he>
                        <td>availability</td>
                        <td colspan="2">operations</td>
                    </tr>
                    <?php 
                        foreach ($products as $key => $value) {
                            echo '<tr>
                                    <td>'.$value['id'] . '</td>
                                    <td><img width="80px" src ="../Images/'.$value['photo'] . '"></td>
                                    <td>'.$value['name'] . '</td>
                                    <td>'.$value['author'] . '</td>
                                    <td>'.$value['price'] . ' din.</td>
                                    <td>'.$value['availability'] . '</td>
                                    <td><button class="admin-table-button" type="submit" name="operation[update]" value="'.$value['id'].'">Update</button></td>
                                    <td><button class="admin-table-button" type="submit" name="operation[delete]" value="'.$value['id'].'">Delete</button></td>
                                </tr>';
                        }
                    ?>
                </table>
                <button class="admin-table-submit" type="submit" name="operation[add_new]" value="true">Add new</button>
            </form>
        </div>
    </section>
    </body>
</html>

