<?php
/**
 * 28. Вывести таблицу умножения с помощью двух циклов for.
 */
$numbers = range(1, 10);
?>

<table border="1" cellspacing="1" align="center">
    <thead>
        <tr>
            <td width="40" align="center" bgcolor="#6495ed">x</td>
            <?php for($i = 1; $i <= 10;  $i++): ?>
                <td width="40" align="center" bgcolor="#6495ed"><?= $i; ?></td>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 1; $i <= 10;  $i++): ?>
        <tr>
            <td align="center" bgcolor="#6495ed"><?= $i; ?></td>
            <?php for($j = 1; $j <= 10;  $j++): ?>
                <td align="center"><?= $i * $j; ?></td>
            <?php endfor; ?>
        </tr>
        <?php endfor;?>
    </tbody>
</table>

