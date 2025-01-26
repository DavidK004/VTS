<?php 

$uName = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;
$gender = $_POST['gender'] ?? null;
if( !empty($uName) && !empty($pass) && isset($gender)){
    $currentMonth = date('m');
    $currentDay = date('d');
    $price = 80;
    $discount = 0;
// Check if the current month is June, July, or August
    if (in_array($currentMonth, ['06', '07', '08'])) {
        $price = 100;
    } 
    if($currentDay % 2 != 0){
        $discount += 3;
    }
    if($gender == 'female'){
        $discount += 2;
        
    }
    if($discount > 0){
    $price -= $price * $discount/100;
    
    }
    header("Location:kolokvijum.php?fullPrice=".$price."&usrName=" . $uName);
}else{
    header("Location:kolokvijum.php?error_message=UNESITE SVE PODATKE");
}
?>
