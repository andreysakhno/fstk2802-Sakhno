<?php
/**
 * 17.Сосктавьте массив месяцев. С помощью цикла foreach выведите все месяцы, а текущий месяц выведите жирным.
 * Текущий месяц должен храниться в переменной $month.
 */

$allMonths = [
    "1" => "Январь",
    "2" => "Февраль",
    "3" => "Март",
    "4" => "Апрель",
    "5" => "Май",
    "6" => "Июнь",
    "7" => "Июль",
    "8" => "Август",
    "9" => "Сентябрь",
    "10" => "Октябрь",
    "11" => "Ноябрь",
    "12" => "Декабрь"
];

$month = "Март";
?>
<table border="1" cellspacing="1" align="center">
<?php foreach ($allMonths as $monthNum => $monthName) : ?>
        <tr>
            <td>
                <?php
                    if ($monthName != $month) echo "{$monthNum}. {$monthName}";
                    else echo "<b>{$monthNum}. {$monthName}</b>";
                ?>
            </td>
        </tr>
<?php endforeach; ?>
</table>

