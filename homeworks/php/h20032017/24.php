<?php
/**
 * 24. Вам нужно разработать программу, которая считала бы количество вхождений какой­нибуть выбранной вами цифры в выбранном вами числе.
 *     Например: цифра 5 в числе 442158755745 встречается 4 раза.
 */

$number = 442158755745;
$figure = 4;
$arr = preg_split('//', $number, -1, PREG_SPLIT_NO_EMPTY);

//1-й способ
$count = 0;
foreach ($arr as $fig){
    if ($fig == $figure) $count++;
}
echo "<h1>В число {$number} цифра {$figure} входит {$count} раз<br></h1>";

//2-й способ
$valueCounts = array_count_values($arr);
$count = $valueCounts[$figure];

echo "<h1>В число {$number} цифра {$figure} входит {$count} раз<br></h1>";
