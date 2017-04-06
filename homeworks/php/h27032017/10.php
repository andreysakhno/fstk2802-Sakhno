<?php
/**
 * 10. Написать функцию, которая считает количество уникальных слов в тексте.
 * Слова разделяются пробелами. Текст должен вводиться с формы.
 */

$sentence = 'В статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы проблемы проблемы проблемы';

function uniqueWords($str) {
    $str = trim($str);
    $arr = explode(' ', str_replace([",", ".", "\r\n"], [null, null, ' '], $str));

    $uniqueWordsArr = [];

    foreach ($arr as $value) {
        if(array_key_exists($value, $uniqueWordsArr)) {
            $uniqueWordsArr[$value]++;
        } else {
            $uniqueWordsArr[$value] = 1;
        }
    }

    return $uniqueWordsArr;
}


function uniqueWordsByPGPfunction($str) {
    $str = trim($str);
    $arr = explode(' ', str_replace([",", ".", "\r\n"], [null, null, ' '], $str));
    return array_count_values($arr);
}


if ($_POST && count($_POST) > 0) {

    $sentence = isset($_POST['sentence']) ? $_POST['sentence'] : null;

    if(is_null($sentence)){
        die('Неверный запрос!');
    }


    echo '<pre>' . print_r(uniqueWords($sentence), true) . '</pre>';
    echo '<pre>' . print_r(uniqueWordsByPGPfunction($sentence), true) . '</pre>';

}

?>

<br><br>
<form action="10.php" name="form" method="post">
    <textarea name="sentence" cols="30" rows="10"><?= $sentence; ?></textarea><br/><br/>
<input type="submit" name="submit" value="Отправить">
</form>