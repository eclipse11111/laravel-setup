<?php
$upload_dir = "uploads/";
if (!isset($_FILES["file"])) {
    die("Файл не вибрано");
}
$file = $_FILES["file"];
if (!is_uploaded_file($file["tmp_name"])) {
    die("Помилка завантаження файлу");
}
$filename = basename($file["name"]);
$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$allowed = ["png", "jpg", "jpeg"];

if (!in_array($extension, $allowed)) {
    die("Дозволені тільки файли PNG, JPG та JPEG");
}

if ($file["size"] > 2 * 1024 * 1024) {
    die("Розмір файлу не повинен перевищувати 2 МБ");
}

if (!is_dir($upload_dir)) {
    mkdir($upload_dir);
}
$new_filename = $filename;
if (file_exists($upload_dir . $new_filename)) {
    $name = pathinfo($filename, PATHINFO_FILENAME);
    $new_filename = $name . "_" . rand(1000, 9999) . "." . $extension;
}
$destination = $upload_dir . $new_filename;
if (move_uploaded_file($file["tmp_name"], $destination)) {
    $size_kb = round($file["size"] / 1024, 2);
    echo "<h2>Файл успішно завантажено</h2>";
    echo "Ім'я файлу: " . htmlspecialchars($new_filename) . "<br>";
    echo "Тип файлу: " . htmlspecialchars($file["type"]) . "<br>";
    echo "Розмір: " . $size_kb . " КБ<br><br>";
    echo "<a href='" . htmlspecialchars($destination) . "' download>";
    echo "Завантажити файл";
    echo "</a>";
} else {
    echo "Не вдалося зберегти файл";
}
echo "<br><br>";
echo "<a href='index.html'>Повернутися назад</a>";
?>