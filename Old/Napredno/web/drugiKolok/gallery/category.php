<?php
include 'functions.php';

$cat = "na2t5u25re spo12r54t funn82y cake2! 8sea au#!tumn!";
$cat_temp = getCategories($cat);

$categories = [];

foreach ($cat_temp as $word) {
    $numbers = '';
    $letters = '';

    for ($i = 0; $i < strlen($word); $i++) {
        if (ctype_digit($word[$i])) {
            $numbers .= $word[$i];
        } else {
            $letters .= $word[$i];
        }
    }

    if ($numbers !== '') {
        $index = intval($numbers) + rand(1000, 5000);
        $categories[$index] = $letters;
    }
}


ksort($categories);


print_r($categories);
?>