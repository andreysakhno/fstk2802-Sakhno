<?php
/**
 * 22. Нарисуйте пирамиду, как показано на рисунке, воспользовавшись циклом for или while.
    xx
    xxxx
    xxxxxx
    xxxxxxxx
    xxxxxxxxxx
 */

$char = '';
for($i = 0; $i < 5; $i++) {
    $char .= 'xx';
    echo "$char  <br/>";
}