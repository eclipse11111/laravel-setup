<?php
$filename = "log.txt";
if (isset($_POST["text"])) {
    $text = $_POST["text"];
    file_put_contents($filename, $text . PHP_EOL, FILE_APPEND);
    echo "<h2>Текст успішно записано</h2>";
}
echo "<h2>Вміст файлу log.txt</h2>";
if (file_exists($filename)) {
    $content = file_get_contents($filename);
    echo "<pre>";
    echo htmlspecialchars($content);
    echo "</pre>";
} else {
    echo "Файл log.txt ще не існує";
}
echo "<br>";
echo "<a href='index.html'>Повернутися назад</a>";
?>