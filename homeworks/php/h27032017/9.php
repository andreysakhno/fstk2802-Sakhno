<?php
/**
 * 9. Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
 */

$sentence = 'В статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы';

function stringReverse($str) {
    $resultStr = '';
    $count = mb_strlen($str);
    for ($i = 1; $i <= $count; $i++) {
        $resultStr .= mb_substr($str, -$i, 1);
    }
    return $resultStr;
}

if ($_POST && count($_POST) > 0) {

    $sentence = isset($_POST['sentence']) ? $_POST['sentence'] : null;

    if(is_null($sentence)){
        die('Неверный запрос!');
    }

    echo stringReverse($sentence);
}

?>

<br><br>
<form action="9.php" name="form" method="post">
    <textarea name="sentence" cols="30" rows="10"><?= $sentence; ?></textarea><br/><br/>
<input type="submit" name="submit" value="Отправить">
</form>