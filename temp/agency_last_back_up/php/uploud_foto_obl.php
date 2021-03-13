<?php 
require_once "conect.php";

if ((!empty($_POST))&&(isset($_SERVER['HTTP_X_REQUESTED_WITH']))&&($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
header('Content-Type: application/json; charset=utf-8');


if (!empty($_FILES['file']['tmp_name'])){
  foreach($_FILES['file'] as $key => $value) {
    foreach($value as $k => $v) {
        $_FILES['file'][$k][$key] = $v;
    }

    // Удалим старые ключи
    unset($_FILES['file'][$key]);
  }

$array = array();
$i = 0;
// Загружаем все картинки по порядку
foreach ($_FILES['file'] as $k => $v) {

    // Перезапишем переменные для удобства
$filePath  = $_FILES['file'][$k]['tmp_name'];
$errorCode = $_FILES['file'][$k]['error'];

// Проверим на ошибки
if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

    // Массив с названиями ошибок
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
        UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
        UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
        UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
        UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
        UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
        UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
    ];

    // Зададим неизвестную ошибку
    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

    // Выведем название ошибки
    die($outputMessage);
}

// Создадим ресурс FileInfo
$fi = finfo_open(FILEINFO_MIME_TYPE);

// Получим MIME-тип
$mime = (string) finfo_file($fi, $filePath);

// Закроем ресурс
finfo_close($fi);

// Проверим ключевое слово image (image/jpeg, image/png и т. д.)
if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');

// Результат функции запишем в переменную
$image = getimagesize($filePath);

// Зададим ограничения для картинок
$limitBytes  = 1024 * 1024 * 5;
$limitWidth  = 1920;
$limitHeight = 1300;

// Проверим нужные параметры
if (filesize($filePath) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
if ($image[1] > $limitHeight)          die('Высота изображения не должна превышать 1300 точек.');
if ($image[0] > $limitWidth)           die('Ширина изображения не должна превышать 1920 точек.');

// Сгенерируем новое имя файла на основе MD5-хеша
$name = md5_file($filePath);

$array[$i] = $name;
// Сгенерируем расширение файла на основе типа картинки
$extension = image_type_to_extension($image[2]);

// Сократим .jpeg до .jpg
$format = str_replace('jpeg', 'jpg', $extension);

if(empty($errorCode)){
    move_uploaded_file($filePath, __DIR__ . '/images/' . $name . $format);
    echo "Фотка успешно загружена";
    $i++;
}
else {
    echo "Чет пошло не так";
}
}
$Id_flat=$_POST['Id_flat'];
    $d = $i - 1;
$query =" INSERT INTO `Images_for_flat` (`Id_flat`, `Link`) VALUES
('$Id_flat','$array[$d]')"; 

$result = mysqli_query($conn, $query) or die("Ошибка " . mysqli_error($conn));
}
}
?>