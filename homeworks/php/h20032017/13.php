<?php
/**
 * 13. Вывести таблицу умножения
 */
$numbers = range(1, 10);
?>

<table border="1" cellspacing="1" align="center">
    <thead>
        <tr>
            <td width="40" align="center" bgcolor="#6495ed">x</td>
            <?php foreach ($numbers as $tableColumn): ?>
                <td width="40" align="center" bgcolor="#6495ed"><?= $tableColumn; ?></td>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($numbers as $tableRow) : ?>
            <tr>
                <td align="center" bgcolor="#6495ed"><?= $tableRow; ?></td>
                <?php foreach ($numbers as $tableCell) : ?>
                    <td align="center"><?= $tableRow * $tableCell; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>