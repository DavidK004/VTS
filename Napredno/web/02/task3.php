<?php

function isEven($num){
    return $num %2== 0;
}

function isOdd(int $num): bool {
    return $num % 2 != 0;
}
function getNumbersFromArray(int $parity, array $numbers):array{
    $numbers = array_filter($numbers, function($number){
        return is_int($number);
    });
    if(isEven($parity)){
        return array_filter($numbers, 'isEven');
    } else {
        return array_filter($numbers, 'isOdd');
    }
}

$numbers = [1, 45, 67, 80.2, "vts", 50];

var_dump($numbers);

$newNumbers = getNumbersFromArray(2, $numbers);

var_dump($newNumbers);