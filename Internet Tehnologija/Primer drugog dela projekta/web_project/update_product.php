<div id="content">
    <h1>Update product</h1>
    <?php
    $sql = "SELECT * FROM product WHERE id_product='$id_product'";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {

        while ($record = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $name = $record['name'];
            $image = $record['image'];
            $description = $record['description'];
            $price = $record['price'];
        }

        mysqli_free_result($result);
        echo '
    <form method="post" action="change_product.php">
    <label for="name">Name: </label><input type="text" name="name" value="' . $name . '" id="name"><br><br>
    <label for="image">Image: </label><input type="text" name="image" value="' . $image . '" id="image"><br><br>
    <label for="description">Description: </label><input type="text" name="description" value="' . $description . '" id="description"><br><br>
    <label for="price">Price: </label><input type="text" name="price" value="' . $price . '" id="price"><br><br>
    <input type="hidden" name="id_product" value="' . $id_product . '">
    <input type="submit" value="change" name="sb">
    <input type="reset" value="cancel" name="rb">
    </form>
    ';


        if (isset($_GET['message']) and $_GET['message'] == "error")
            echo "You must fill all fields!";

        if (isset($_GET['message']) and $_GET['message'] == "ok")
            echo "Product was successfully updated!";

    } else
        echo "No data for this id!";
    ?>
</div>
