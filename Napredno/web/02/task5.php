<?php
$input = "Students got grades 8, 10, 9, 7, 5, 8, 6, 10, 11 and 4 in the exam. Another student got grades 7, 5, 6, 9, 10, 10, and 8. Some got 4 or 11, but only grades from 5 to 10 count.";

$cleaned = str_replace([',', '.'], ' ', $input);

$words = explode(" ", $cleaned);


function extractDigits($word){
    if(is_numeric($word)){
        return $word;
    } else {
        return null;
    }
}

$newWords = array_map('extractDigits',$words);
// var_dump($newWords);

$filteredWords = array_filter($newWords, function($word) {
    return is_numeric($word);
});

$grades = array_fill_keys(range(5, 10), 0);
// var_dump($grades);

foreach ($filteredWords as $word){
    if(in_array($word, [5,6,7,8,9,10])){
        $grades[$word]++;
    }
}

// var_dump($grades);


echo $input."<br>";
echo "Extracted numbers: ";
foreach($filteredWords as $word){
    echo $word. ' ';
}

echo '<br>';
echo "Grade statistics (5–10):<br>";
foreach($grades as $key => $value){
    echo "Grade ".$key. ": " .$value." times<br>";
}
