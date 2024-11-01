<?php
// Шлях до файлу
$filename = "text.txt";

// a
    if (!file_exists($filename)) {
    echo "Створіть файл.";
    } else {

// b
    $content = "Я вивчаю PHP";
    file_put_contents($filename, $content);

// c
    $file_array = file($filename);
    foreach ($file_array as $line) {
        echo nl2br($line); 
    }

// d
    $additional_text = "Пробую писати програми\r\n";
    $fp = fopen($filename, "a");
    $write_result = fwrite($fp, $additional_text);
    fclose($fp);

    if ($write_result) {
        echo "Запис виконано.";
    } else {
        echo "Помилка запису в файл.";
    }

// e
    echo "<br><h3>Вміст файлу після запису:</h3><pre>";
    readfile($filename);
    echo "</pre>";

// f
    $filesize = filesize($filename);
    echo "Розмір файлу: $filesize байт.";

// g
    $last_modified = date("j F Y, g:i a", filemtime($filename));
    echo "<br>Останні зміни файлу: $last_modified.";

// h
    $creation_time = date("j F Y, g:i a", filectime($filename));
    echo "<br>Дата створення файлу: $creation_time.";

// i
    $filename2 = "text2.txt";
    $content2 = "Другий файл готовий";
    file_put_contents($filename2, $content2);

// j
    echo "<br>Текст записаний у файл text2.txt.";

}
?>
