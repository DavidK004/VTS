<?php
function createProduct($name, $author, $price, $photo, $availability) {
    global $connect;
    $sql = "INSERT INTO products (name, author, price, photo, availability) VALUES ('$name', '$author', $price, '$photo', $availability)";
    if ($connect->query($sql) === TRUE) {
        echo "New product created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

function updateProduct($id, $name, $author, $price, $photo, $availability) {
    global $connect;
    $sql = "UPDATE products SET name='$name', author='$author', price=$price, photo='$photo', availability=$availability WHERE id=$id";
    if ($connect->query($sql) === TRUE) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

function deleteProduct($id) {
    global $connect;
    $sql = "DELETE FROM products WHERE id=$id";
    if ($connect->query($sql) === TRUE) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}