<?php
/**
 * 12. Дано число $n = 1000. Делите его на 2 столько раз, пока результат деления не станет меньше 50. Какое число получится?
 * Посчитайте количество итераций, необходимых для этого (итерации — это количество проходов цикла), и запишите его в переменную $num.
 */

$n = 1000;
$i = 0;

do{
   $n = $n / 2;
   $i++;
}while ($n >= 50);

$result = $n;
$num = $i;

echo "Результат: {$result}";
echo "<br>";
echo "Кол-во итераций: {$num}";




    
    