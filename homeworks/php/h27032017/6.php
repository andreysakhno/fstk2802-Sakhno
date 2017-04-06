<?php
/**
 * 6. Создать страницу, на которой можно загрузить несколько фотографий в галерею.
 * Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
 */

$uploaddir  = "gallery";
$max_image_size	= 10000000;
$valid_types =  ["gif", "jpg", "png", "jpeg"];


/**
 * @param string $uploaddir
 * @param integer $max_image_size
 * @param array $valid_types
 */
function downloadPhotos($uploaddir, $max_image_size, $valid_types) {

    if(!is_dir($uploaddir)) {
        if(!mkdir($uploaddir, 0777, true)) {
            die('Не удалось создать директории '.$uploaddir);
        }
    }

    if (isset($_FILES['photos'])) {
        
        foreach ($_FILES['photos']['error'] as $key => $error) {

            if($error == 0) {
                $fileName = $_FILES['photos']['name'][$key];
                $fileSize = $_FILES['photos']['size'][$key];
                $fileTmp =  $_FILES['photos']['tmp_name'][$key];

                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                $ext = mb_strtolower($ext);

                if ($fileSize > $max_image_size) {
                    echo('Ошибка: размер файла > 10М');
                    continue;
                } elseif (!in_array($ext, $valid_types)) {
                    echo('Ошибка: неправильный тип файла');
                    continue;
                } else {
                    move_uploaded_file($fileTmp, $uploaddir . DIRECTORY_SEPARATOR . $fileName);
                }
            }
        }
    }
}

/**
 * @param string $path
 * @param array $valid_types
 */
function printGallery($path, $valid_types) {

    if (!is_dir($path)) {
        die ("{$path} не является директорией");
    }

    $entryFileList = scandir($path);

    $resultFileList = [];
    echo '<table border="1" cellspacing="1" align="center">';
    foreach ($entryFileList as $file) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if (is_file($path . DIRECTORY_SEPARATOR . $file) && in_array($ext, $valid_types) !== 0) {
            $resultFileList[] = mb_convert_encoding($file, 'utf-8', 'windows-1251');

            echo '<tr><td><img src="'.$path.'/'.$file.'" height="100;"></td></tr>';

        }
    }
    echo '</table>';
}

if ($_POST && count($_POST) > 0) {
    downloadPhotos($uploaddir, $max_image_size, $valid_types);
}
?>


<br><br>
<form action="6.php" name="form" enctype="multipart/form-data" method="post">
    <label for="photo">Загрузите одну или несколько фотографий</label>
    <input type="file" name="photos[]" required multiple accept="image/*" > <br><br>
    <input type="submit" name="submit" value="Отправить">
</form>
<br><br>

<?php printGallery($uploaddir, $valid_types); ?>