<?php
/*
 * 3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов.
 * Значение N задавать через форму. Проверить работу на кириллических строках - найти ошибку, найти решение.
 *
 * Строка: В статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы
 */

setlocale(LC_ALL, 'ru_RU');

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
/**
 * @param string $filename
 * @return array
 */
function getArrayOfWordsFromFile(string $filename) {
    $handle = @fopen($filename, "r") or die("Невозможно открыть или создать файл!");
    $fileString = fread($handle, filesize($filename));
    fclose($handle);
    return explode(' ', str_replace([",", ".", "\r\n"], [null, null, ' '], $fileString));
}

/**
 * @param string $filename
 * @return array
 */
function putArrayOfWordsToFile(string $filename, $arrString) {
    $handle = @fopen($filename, "w") or die("Невозможно открыть или создать файл!");
    $fileString = implode(' ', $arrString);
    fwrite($handle, $fileString);
    fclose($handle);
}

/**
 * @param array $arrOfWorldsFromFile
 * @param integer $number
 * @return array
 */
function removeLargerWordsFromArray($arrOfWordsFromFile, $number){
    $arrRemovedWords = [];
    foreach ($arrOfWordsFromFile as $value){
        if(iconv_strlen($value) > $number) $arrRemovedWords[] = $value;
    }
    return array_diff($arrOfWordsFromFile, $arrRemovedWords);
}

if ($_POST && count($_POST) > 0) {

    $number = isset($_POST['number']) ? $_POST['number'] : 0;

    if( is_numeric($number) ) {
        die('Номер должен быть числом!');
    }
        
    $number = (int) $number;
    if ($number <= 0) {
        die('Номер должен быть положительным целым числом, не равным 0!');
    }
    
    $arrOfWordsFromFile = getArrayOfWordsFromFile("myfile.txt");
    echo "<h4>Строка из файла:</h4>";
    printStringFromArray($arrOfWordsFromFile);

    $arrOfWordsAfterRemoved = removeLargerWordsFromArray($arrOfWordsFromFile, $number);
    echo "<h4>Строка с удаленными словами, длина которых превыщает {$number} символов:</h4>";
    printStringFromArray($arrOfWordsAfterRemoved);

    putArrayOfWordsToFile("myfile.txt", $arrOfWordsAfterRemoved);    
}

?>
<br><br>

<form action="3.php" name="form" method="post">
    <label for="number">Ведитее число:</label>
    <input type="text" name="number" value=""><br><br>
    <input type="submit" name="submit" value="Отправить">
</form>