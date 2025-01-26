<div id="content">
    <h1>List of products</h1>
    <?php
    $sql = "SELECT id_product,name FROM product ORDER BY name";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        echo '<form>';
        echo "<label>choose product to update:</label>";
        echo ' <select name="id_product">';
        echo '<option value="choose">choose</option>';

        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<option value="' . $record['id_product'] . '">' . $record['name'] . '</option>';
        }

        echo '</select>';
        echo '<input type="hidden" name="op" value="update_product">';
        echo '<input type="submit" value="send">';
        echo '</form>';

        mysqli_free_result($result);
    }
    ?>
</div>
