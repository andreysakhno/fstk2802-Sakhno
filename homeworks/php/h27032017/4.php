<?php
/**
 * 4. Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.
 */

/**
 * @param string $path
 */
function printFilesFromDirectory($path = ".") {
   
    if (!is_dir($path)) {
        die ("{$path} не является директорией");
    }
   
    $entryFilelist = scandir($path);

    $resultFilelist = [];

    foreach ($entryFilelist as $file) {
        if (is_file($path . DIRECTORY_SEPARATOR . $file)) {
            $resultFilelist[] = mb_convert_encoding($file, 'utf-8', 'windows-1251');
        }
    }

    echo "<pre>".print_r($resultFilelist, true)."</pre>";
}


printFilesFromDirectory('D:\\');