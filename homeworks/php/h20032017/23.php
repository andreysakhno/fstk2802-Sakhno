<?php
/**
 * 23. Вам нужно разработать программу, которая считала бы сумму цифр числа введенного пользователем.
 *     Например: есть число 123, то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.
 *     По желанию можете сделать проверку на корректность введения данных пользователем.
 */

$number  = null;
$message = null;

if(isset($_POST['number'])) {

    $number = $_POST['number'];

    if(is_numeric($number)) {
        
        $n = $number;

        $sum = 0;
        while ($n > 0) {
            $sum += $n % 10;
            $n = intval($n / 10);
        }

        echo "<h1>Сумма цифер числа {$number} равна {$sum} <br></h1>";
    } else {
        $number  = null;
        $message = "Вы ввели не правильное значение!";
    }
}

?>

<form action="23.php" method="post">
    <h4><?= $message; ?></h4>
    <div>
        <label for="number">Введите целое число:</label>
        <input type="text" id="number" name="number" value="<?= $number; ?>" >
    </div>
    <div>
        <input type="submit" value="Отправить">
    </div>
</form>

