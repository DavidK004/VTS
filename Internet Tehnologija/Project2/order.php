<?php
require_once 'db_config.php';
include_once 'header.php';


$sql = "SELECT id, name, author, price, photo, availability FROM products";
    if ($result = $connect -> query($sql)) {
        while ($row = $result -> fetch_assoc()) {
            $products[] = $row;
        }
    }
?>
<form class="order" action="order.php" method="GET">
<h1 class="order-title">Please Fill out your details: </h1>
    <div class="order-item">
        <label for="title">Choose which manga you wish to order: </label>
        <select name="title" id="title">
            <?php
                foreach ($products as $key => $value) {
                    echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                }
            ?>
        </select>
        </div>
        <div class="order-item">
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname">
        </div>
        <div class="order-item">
            <label for="fname">Last Name: </label>
            <input type="text" name="lname" id="lname">
        </div>
        <div class="order-item">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email">
        </div>
        <div class="order-item">
            <label for="city">City: </label>
            <input type="text" name="city" id="city">
        </div>
        <div class="order-item">
            <label for="address">Address: </label>
            <input type="text" name="address" id="address">
        </div>
        <button class="submit-button" type="submit" name="submit">Order</button>
        <?php
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo '<div class="success-message">Order placed successfully!</div>';
            }   
            if (isset($_GET['error']) && $_GET['error'] == 'true') {
                echo '<div class="error-message"">Please fill in all the required fields.</div>';
            }
        ?>
</form>
<?php 
if (isset($_GET['submit'])) {
    
    $product_id = $_GET['title'];
    $first_name = $_GET['fname'];
    $last_name = $_GET['lname'];
    $email = $_GET['email'];
    $city = $_GET['city'];
    $address = $_GET['address'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($city) || empty($address)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=true");
    }
    else{
    $sql = "INSERT INTO orders (product_id, first_name, last_name, email, city, address) 
            VALUES (?, ?, ?, ?, ?, ?)";

    
    if ($stmt = $connectUser->prepare($sql)) {
        
        $stmt->bind_param('isssss', $product_id, $first_name, $last_name, $email, $city, $address);
        
        
        if ($stmt->execute()) {
            echo "Order placed successfully!";
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=true");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $connect->error;
    }
}
}
$connectUser->close();
include_once 'footer.php';
?>