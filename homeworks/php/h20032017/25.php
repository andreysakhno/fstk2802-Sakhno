<?php
/**
 * 25. Ваше задание создать массив, наполнить это случайными значениями (функция rand),
 * найти максимальное и минимальное значение и поменять их местами.
 */

$arr = [];

for ($i = 0; $i < 20; $i++){
    $arr[$i] = rand(0, 100);
}

$arr1 = $arr;

//1-й способ
$min = $max = $arr[0];
$minKey = $maxKey = 0;
$i = 0;
foreach ($arr as $value) {
    if ($value >= $max){
        $max = $value;
        $maxKey = $i;
    }
    if ($value <= $min) {
        $min = $value;
        $minKey = $i;
    }
    $i++;
}

echo "<pre>".print_r($arr, true)."</pre>";

echo "Минимальный элемент: [{$minKey}] => {$min} <br>";
echo "Максимальный элемент: [{$maxKey}] => {$max} <br>";

$arr[$minKey] = $max;
$arr[$maxKey] = $min;

echo "<pre>".print_r($arr, true)."</pre>";

//2-й способ
$maxKey = array_keys($arr1, max($arr1))[0];
$minKey = array_keys($arr1, min($arr1))[0];

$max = $arr1[$maxKey];
$min = $arr1[$minKey];

echo "Минимальный элемент: [{$minKey}] => {$min} <br>";
echo "Максимальный элемент: [{$maxKey}] => {$max} <br>";

$arr1[$minKey] = $max;
$arr1[$maxKey] = $min;

echo "<pre>".print_r($arr1, true)."</pre>";