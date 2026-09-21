<?php
// Перевіряємо чи дані були відправлені методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо ім'я та прізвище з форми
    $firstName = $_POST["firstName"] ?? "";
    $lastName = $_POST["lastName"] ?? "";
    // Видаляємо зайві пробіли на початку та в кінці
    $firstName = trim($firstName);
    $lastName = trim($lastName);
    // Перевіряємо чи поля не порожні
    if ($firstName == "" || $lastName == "") {
        echo "Заповніть усі поля";
        exit;
    }
    // Перевіряємо тип отриманих даних
    if (!is_string($firstName) || !is_string($lastName)) {
        echo "Ім'я та прізвище повинні бути рядками";
        exit;
    }
    $firstName = htmlspecialchars($firstName);
    $lastName = htmlspecialchars($lastName);
    // Виводимо привітання
    echo "<p>Вітаю, " . $firstName . " " . $lastName . "!</p>";
} else {
    echo "Дані не були отримані";
}
?>