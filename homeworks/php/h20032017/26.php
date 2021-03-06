<?php
/**
 * 26. Вам нужно создать массив и заполнить его случайными числами от 1 до 100 (ф­я rand).
 * Далее, вычислить произведение тех элементов, которые больше ноля и у которых парные индексы.
 * После вывести на экран элементы, которые больше ноля и у которых не парный индекс.
 */

$arr = [];

for ($i = 0; $i < 10; $i++) {
    $arr[$i] = rand(0, 100);
}

echo "<pre>".print_r($arr, true)."</pre>";

$multi = 1;
$i = 0;
foreach ($arr as $value){
    if($value > 0 && ($i%2) == 0) $multi *= $value;
    $i++;
}

$i = 0;
echo "Произведение элементов больших ноля и с парными индексами равно {$multi} <br>";
echo "Элементы, которые больше ноля и у которых не парный индекс: ";
foreach ($arr as $value){
    if($value > 0 && ($i%2) != 0) echo "{$value} ";
    $i++;
}
echo "<br>";
