<?php
require_once 'db_config.php';

$connect = new mysqli(HOST,USER,PASS,DATABASE);
if($connect -> connect_errno) {
    echo $connect -> connect__error;
}

$sql = "SELECT id, category, name, price, photo, availability FROM products ORDER BY price desc limit 3";
if ($result = $connect -> query($sql)) {
    while ($row = $result -> fetch_assoc()) {
        $products[] = $row;
    }
}

include "header.php";
?>
    <section class="hero">
        <div class="hero-text">
            Mobile Shopping
        </div>
    </section>

    <section class="product-list block">
        <div class="page-wrapper">
            <div class="block-title">Mobile deals</div>
            <div class="product-list__content">
                <?php  
                    foreach ($products as $key => $value) {
                        echo '<div class="product-list__item">
                            <img src="'.$value['photo'].'" class="product-list__picture" alt="">
                            <div class="product-list__title">'.$value['category'].'</div>
                            <div class="product-list__subtitle">'.$value['name'].'</div>
                            <div class="product-list__price">'.$value['price'].' din.</div>
                        </div>';  
                    }
                ?>
            </div>
        </div>
    </section>

<?php include "footer.php"?>