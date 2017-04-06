<?php
/**
 * 5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
 *    Директория и искомое слово задаются как параметры функции.
 */

/**
 * @param string $searchFilename
 * @param string $path
 */
function printFilesFromDirectory($searchFilename, $path = ".") {

    if (!is_dir($path)) {
        die ("{$path} не является директорией");
    }

    $entryFileList = scandir($path);

    $resultFileList = [];

    foreach ($entryFileList as $file) {
        $filename = pathinfo($file, PATHINFO_FILENAME);
        if (is_file($path . DIRECTORY_SEPARATOR . $file) && mb_substr_count($filename, $searchFilename) !== 0) {
            $resultFileList[] = mb_convert_encoding($file, 'utf-8', 'windows-1251');
        }
    }

    echo "<pre>".print_r($resultFileList, true)."</pre>";
}


printFilesFromDirectory('CV', 'D:\\');