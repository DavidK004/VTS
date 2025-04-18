<?php
include "header.php";

require_once 'db_config.php';

$connect = new mysqli(HOST, USER, PASS, DATABASE);
if ($connect->connect_errno) {
    die("Database connection failed: " . $connect->connect_error);
}

$products = []; // Initialize $products to avoid undefined variable issues

/*--SEARCH--*/
$sql_str = ""; // Initialize query filter string
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $connect->real_escape_string($_GET['search']);
    $search_arr = explode(' ', $search); // Split search input into words

    // Filter out words shorter than 3 characters
    $search_arr = array_filter($search_arr, function($value) {
        return mb_strlen($value) > 2;
    });

    // Build the WHERE clause dynamically
    if (!empty($search_arr)) {
        $conditions = [];
        foreach ($search_arr as $value) {
            $conditions[] = "(name LIKE ? OR category LIKE ?)";
        }
        $sql_str = "WHERE " . implode(" OR ", $conditions);
    }
}

// Build final SQL query
$sql = "SELECT id, category, name, price, photo, availability FROM products " . $sql_str;

// Use prepared statements to execute the query
$stmt = $connect->prepare($sql);

if (!empty($search_arr)) {
    // Bind parameters dynamically
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




    <section class="main-cover main-cover-products"> 
        <div class="page-wrapper">
            <div class="block-title block-title--white">Products</div>
        </div>
    </section>

    <section class="product-list block">
        <div class="page-wrapper">
            <form class="product-search" method="get">
                <input placeholder="Search" name="search" type="text">  
                <button type="submit">Go</button>
            </form> 
            <div class="product-list__content">
                <?php
                    if (!empty($products)) {  
                        foreach ($products as $key => $value) {
                            echo '<div class="product-list__item">
                                <img src="'.$value['photo'].'" class="product-list__picture" alt="">
                                <div class="product-list__title">'.$value['category'].'</div>
                                <div class="product-list__subtitle">'.$value['name'].'</div>
                                <div class="product-list__price">'.$value['price'].' din.</div>
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


<?php include "footer.php"?>
