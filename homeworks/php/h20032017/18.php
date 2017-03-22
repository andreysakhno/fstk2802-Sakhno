<?php
/**
 * 18. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, выходные дни следует вывести жирным.
 */

$weekDays = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс",];
$weekend = ["Сб", "Вс",];
?>

<table border="1" cellspacing="1" align="center">
<?php foreach ($weekDays as $day) : ?>
    <tr>
        <td>
            <?php
            if (in_array($day, $weekend)) echo "<b>{$day}</b>";
            else echo "{$day}";
            ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>