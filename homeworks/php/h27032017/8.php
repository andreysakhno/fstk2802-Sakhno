<?php
/**
 * 8. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.
 * Реализовать проверку на наличие в тексте запрещенных слов, матов. При наличии таких слов - выводить сообщение "Некорректный комментарий".
 * Реализовать удаление из комментария всех тегов, кроме тега <b>.
 */


$fileOfCommentName = 'comments.txt';
$separator = '[COMMENT_SEPARATOR]';

function addComment($comment, $fileName) {
    $file = @fopen($fileName, 'a') or die("Невозможно открыть или создать файл!");
    fwrite($file, $comment . $GLOBALS['separator']);
    fclose($file);
}

function getComments($fileName) {
    $file = @fopen($fileName, 'r') or die("Невозможно открыть или создать файл!");

    $commentsFromFile = fread($file, filesize($fileName));
    fclose($file);
    return explode($GLOBALS['separator'], $commentsFromFile);
}

function checkForbiddenWords($string) {
    $forbiddenWords = ["мат1", "мат2", "мат3"];
    $commentWordArray = explode(' ', str_replace([",", ".", "\r\n"], [null, null, ' '], $string));

    foreach ($commentWordArray as $word) {
        if (in_array($word, $forbiddenWords)) {
            return false;
        }
    }

    return true;
}

function printComments($arr) {
    $printString = '';
    if(is_array($arr) && count($arr) > 0) {
        foreach ($arr as $value) {
            $printString .= $value . "<br/>";
        }
        echo $printString;
    }
}

if ($_POST && count($_POST) > 0) {
    $newComment = isset($_POST['comment']) ? $_POST['comment'] : null;

    if(is_null($newComment)) {
        die ('Неверный запрос!');
    }

    if(trim($newComment) != '') {
        if(checkForbiddenWords($newComment)) {
            $newComment = strip_tags($newComment, '<b>');
            addComment($newComment, $fileOfCommentName);
        } else echo "Некорректный комментарий <br/>";
    }
}

if(is_file($fileOfCommentName)) {
    $allComments = getComments($fileOfCommentName);
    printComments($allComments);
}

?>

<br><br>
<form action="8.php" name="form" enctype="multipart/form-data" method="post">
    <label for="comment">Введите комментарий</label><br/>
    <textarea name="comment" id="" cols="30" rows="10"></textarea>
    <br><br>
    <input type="submit" name="submit" value="Отправить">
</form>
<br><br>