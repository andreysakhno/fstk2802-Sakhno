<?php
/*
 *  6. Расширьте конструкцию if из п.5, выводя фразу: "Вам пора на пенсию" при условии,
 *  что значение переменной age больше 59.
 */

$age = 30;

if ($age >= 18 && $age <= 59) {
    echo "Вам еще работать и работать";
}elseif ($age > 59){
    echo "Вам пора на пенсию";
}
