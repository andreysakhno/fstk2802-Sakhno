<?php
/**
 * 19. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите курсивом.
 * Текущий день должен храниться в переменной $day.
 */

$weekDays = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс",];
$weekend = ["Сб", "Вс",];
$day = "Сб";
?>

<table border="1" cellspacing="1" align="center">
    <?php foreach ($weekDays as $dayName) : ?>
        <tr>
            <td>
                <?php

                if(in_array($dayName, $weekend)) {
                    if ($dayName == $day) echo "<b><i>{$dayName}</i></b>";
                    else echo "<b>{$dayName}</b>";
                }
                else {
                    if ($dayName == $day) echo "<i>{$dayName}</i>";
                    else echo "{$dayName}";
                }

                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>