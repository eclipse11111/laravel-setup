<?php
$upload_dir = "uploads/";
echo "<h2>Список файлів</h2>";
if (!is_dir($upload_dir)) {
    echo "Папка uploads не існує";
    exit;
}
$files = scandir($upload_dir);
$found = false;
foreach ($files as $file) {
    if ($file == "." || $file == "..") {
        continue;
    }
    if (is_file($upload_dir . $file)) {
        $found = true;
        echo htmlspecialchars($file);
        echo " - ";
        echo "<a href='" . htmlspecialchars($upload_dir . $file) . "' download>";
        echo "Завантажити";
        echo "</a>";
        echo "<br>";
    }
}
if (!$found) {
    echo "У папці uploads немає файлів";
}
echo "<br>";
echo "<a href='index.html'>Повернутися назад</a>";
?>