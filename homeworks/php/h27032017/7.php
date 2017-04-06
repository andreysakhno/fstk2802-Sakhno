<?php
/**
 * 7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
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
        addComment($newComment, $fileOfCommentName);
    }
}

if(is_file($fileOfCommentName)) {
    $allComments = getComments($fileOfCommentName);
    printComments($allComments);
}

?>

<br><br>
<form action="7.php" name="form" enctype="multipart/form-data" method="post">
    <label for="comment">Введите комментарий</label><br/>
    <textarea name="comment" id="" cols="30" rows="10"></textarea>
    <input type="submit" name="submit" value="Отправить">
</form>
<br><br>