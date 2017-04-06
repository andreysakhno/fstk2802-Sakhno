<?php
/*
 * 2. Создать форму с элементом textarea. При отправке формы скрипт должен выдавать
 * ТОП3 длинных слов в тексте. Реализовать с помощью функции.
 */

$sentence = 'В статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы';
/**
 * @param string $sentence
 * @return array
 */
function foundThreeLongestWords($sentence) {

    $arr = explode(' ', str_replace([",", ".", "\r\n"], [null, null, ' '], $sentence));

    usort($arr, function ($a, $b) {
        if (iconv_strlen($a) == iconv_strlen($b)) {
            return 0;
        }
        return (iconv_strlen($a) > iconv_strlen($b)) ? -1 : 1;
    });
    
    return array_slice($arr, 0, 3);
}

/**
 * @param array $arr
 */
function printStringFromArray($arr) {
    $printString = '';
    if(is_array($arr) && count($arr) > 0) {
        foreach ($arr as $value) {
            $printString .= $value . " ";
        }
        echo $printString;
    }
}

if ($_POST && count($_POST) > 0) {

    $sentence = isset($_POST['sentence']) ? $_POST['sentence'] : null;

    if(is_null($sentence)){
        die('Неверный запрос!');
    }
    $result_arr = foundThreeLongestWords($sentence);
    printStringFromArray($result_arr);
}
?>

<br><br>
<form action="2.php" name="form" method="post">
    <textarea name="sentence" cols="30" rows="10"><?= $sentence; ?></textarea><br/><br/>
    <input type="submit" name="submit" value="Отправить">
</form>