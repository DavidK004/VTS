<?php
require_once 'db_config.php'; 
include_once 'header.php';
?>
<div class="content">
<h1>Our Best Sellers </h1>
    <div class="best-sellers">
        
        <?php
            $sql = "SELECT  name, author, price, photo FROM products ORDER BY price desc limit 4";
            if ($result = $connect -> query($sql)) {
                while ($row = $result -> fetch_assoc()) {
                    $products[] = $row;
                }
            }

            foreach ($products as $key => $value){
                echo '<div class="product-list-item">
                            <img src="Images/'.$value['photo'].'" class="product-list-photo" alt="manga cover">
                            <div class="product-list-title">'.$value['name'].'</div>
                            <div class="product-list-subtitle">'.$value['author'].'</div>
                            <div class="product-list-price">'.$value['price'].' din.</div>  
                        </div>';  
            }
        ?>
    </div>
</div>


<?php
include_once 'footer.php';
?>