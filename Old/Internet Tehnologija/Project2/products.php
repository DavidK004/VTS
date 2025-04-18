<?php 
require_once 'db_config.php'; 
include_once 'header.php';

$products = []; 


$sql_str = ""; 
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $connect->real_escape_string($_GET['search']);
    $search_arr = explode(' ', $search); 

    
    $search_arr = array_filter($search_arr, function($value) {
        return mb_strlen($value) > 2;
    });

    
    if (!empty($search_arr)) {
        $conditions = [];
        foreach ($search_arr as $value) {
            $conditions[] = "(name LIKE ? OR author LIKE ?)";
        }
        $sql_str = "WHERE " . implode(" OR ", $conditions);
    }
}


$sql = "SELECT  name, author, price, photo FROM products " . $sql_str;


$stmt = $connect->prepare($sql);

if (!empty($search_arr)) {
    
    $params = [];
    foreach ($search_arr as $value) {
        $params[] = "%$value%";
        $params[] = "%$value%";
    }
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$stmt->close();
$connect->close();
?>

    <section class="product-list">
        <div class="container">
            <form class="search" class="product-search" method="GET">
                <input class="search-input" placeholder="Search" name="search" type="text">  
                <button class="search-button" type="submit">Go</button>
            </form> 
            <div class="product-list">
                <?php
                    if (!empty($products)) {  
                        foreach ($products as $key => $value) {
                            echo '<div class="product-list-item">
                                <img src="Images/'.$value['photo'].'" class="product-list-picture" alt="">
                                <div class="product-list-title">'.$value['name'].'</div>
                                <div class="product-list-subtitle">'.$value['author'].'</div>
                                <div class="product-list-price">'.$value['price'].' din.</div>
                            </div>';  
                        }
                    }
                    else {
                        echo '<p class="products-error"> Products not found </p>';
                    }
                ?>
            </div>
        </div>
    </section>



<?php
include_once 'footer.php';
?>