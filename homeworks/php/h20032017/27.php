<?php
/**
 * 27. Создать генератор случайных таблиц. Есть переменные: $row - кол-во строк в таблице, $cols - кол-во столбцов в таблице.
 * Есть список цветов, в массиве: $colors = array('red','yellow','blue','gray','maroon','brown','green').
 * Необходимо создать скрипт, который по заданным условиям выведет таблицу размера $rows на $cols,
 * в которой все ячейки будут иметь цвета, выбранные случайным образом из массива $colors.
 * В каждой ячейке должно находиться случайное число.
 */

$rows = 5;
$cols = 5;

$colors = ['red','yellow','blue','gray','maroon','brown','green'];
?>

<table align="center" cellspacing="0" border="1">
    <?php for($i = 0; $i < $rows; $i++ ) : ?>
        <tr>
            <?php for($j = 0; $j < $cols; $j++ ) : ?>
                <td align="center" width="70" bgcolor="<?= $colors[rand(0, 6)]; ?> ">
                    <?= rand(0, 1000); ?>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>