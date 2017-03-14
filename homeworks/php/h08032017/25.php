<?php
/*
 * 25. Приведите пример, чем отличается <?php от <?=.
 */

$string1 = "Текст1";
$string2 = "Текст2";

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Моя страничка</title>
    </head>
    <body>
        <h1>
            <?php
                echo $string1;
            ?>
        </h1>
        <h1><?=$string2;?></h1>
    </body>
</html>





