<?php declare(strict_types=1);
/**
 * returns biggest number from array
 * @param array $arr
 * @return int
 */
function getMinValue(array $arr): int
{
    return min($arr);
}

/**
 * returns smallest number from array
 * @param array $arr
 * @return int
 */
function getMaxValue(array $arr): int
{
    return max($arr);
}

/**
 * Returns formated string with average and sum of array
 * @param array $arr
 * @return string
 */
function getSumAndAverage(array $arr): string
{
    $sum = array_sum($arr);
    $average = 1.0 * array_sum($arr) / count($arr);
    return "Sum = $sum, Average = $average";
}


$array = [1, 2, 10, 4, 56, 6, 4];

echo getMinValue($array);
echo "<br>";
echo getMaxValue($array);
echo "<br>";
echo getSumAndAverage($array);