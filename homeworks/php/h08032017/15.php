<?php
/*
 * 15. Написать калькулятор. Переменная $a = изменяемое число. Переменная $b = изменяемое число.
 * Переменная $operator = ‘+’ или ‘-’ или ‘/’ или ‘*’ или '%' (остаток от деления).
 * На экран выводить результат в зависимости от значений этих переменных.
 * Не забудьте про деление на 0, если надо - выдавать ошибку что на 0 делить нельзя.
 */

echo "Введите a:\n";
fscanf(STDIN, "%s\n", $a);
if(!is_numeric($a)){
    echo 'die';
    return;
}

echo "Введите b:\n";
fscanf(STDIN, "%s\n", $b);
if(!is_numeric($b)){
    echo 'die';
    return;
}

echo "Введите operator '+' или '-' или '/' или '*' или '%':\n";
fscanf(STDIN, "%s\n", $operator);
echo $operator;

switch ($operator){
    case '+':
        $res = $a + $b;
        echo "{$a} {$operator} {$b} = {$res}";
        break;
    case '-':
        $res = $a - $b;
        echo "{$a} {$operator} {$b} = {$res}";
        break;
    case '*':
        $res = $a * $b;
        echo "{$a} {$operator} {$b} = {$res}";
        break;
    case '/':
        if ($b == 0 ) echo 'На 0 делить нельзя!';
        else {
            $res = $a / $b;
            echo "{$a} {$operator} {$b} = {$res}";
        }
        break;
    case '%':
        if ($b == 0 ) echo 'На 0 делить нельзя!';
        else {
            $res = $a % $b;
            echo "{$a} {$operator} {$b} = {$res}";
        }
        break;
    default:
        echo "Нет такого оператора";
        break;
}

