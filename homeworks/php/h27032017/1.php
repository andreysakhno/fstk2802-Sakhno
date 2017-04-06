<?php
/*
 * 1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова,
 * которые есть и в первом и во втором поле ввода. Реализацию этой логики необходимо поместить в функцию getCommonWords($a, $b),
 * которая будет возвращать массив с общими словами.
 * $sentence1 = "piece0 piece1 piece2 piece3 piece4 piece5 piece6";
 * $sentence2 = "piece8 piece7 piece6 piece5 piece4 piece3 piece2 piece1";
 */

$sentence1 = 'word0 word1 word2 word3 word4 word5 word6';
$sentence2 = 'word10 word9 word8 word7 word6 word5 word4 word3 word2 word1';
/**
 * @param string $a
 * @param string $b
 * @return array
 */
function getCommonWords($a, $b) {
    $arr1 = explode(' ', str_replace([",", ".", "\r\n"], [null, null, ' '], $a));
    $arr2 = explode(' ', str_replace([',', '.', "\r\n"], [null, null, ' '], $b));
    return array_intersect($arr1, $arr2);
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

    $sentence1 = isset($_POST['sentence1']) ? $_POST['sentence1'] : null;
    $sentence2 = isset($_POST['sentence2']) ? $_POST['sentence2'] : null;

    if(is_null($sentence1) && is_null($sentence2)) {
        die('Неверный запрос!');
    }

    $result_arr = getCommonWords($sentence1, $sentence2);
    printStringFromArray($result_arr);
}
?>

<br><br>
<form action="1.php" name="form" method="post">
    <textarea name="sentence1" cols="30" rows="10"><?= $sentence1; ?></textarea><br/><br/>
    <textarea name="sentence2" cols="30" rows="10"><?= $sentence2; ?></textarea><br/><br/>
    <input type="submit" name="submit" value="Отправить">
</form>