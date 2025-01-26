<?php
function deleteProduct(int $id_product):bool {
    $sql = "DELETE FROM product WHERE id_product = '$id_product'";
    return mysqli_query($GLOBALS['connection'], $sql) or die(mysqli_error($GLOBALS['connection']));
}

function insertProduct(string $name):bool {

    return true;
}

function updateProduct(int $id_product, string $name, string $image, string $description, float $price):bool {

    return true;
}