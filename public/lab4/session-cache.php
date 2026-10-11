<?php
session_start();

if (isset($_GET['clear'])) {
    unset($_SESSION['cached_data'], $_SESSION['cached_time']);
    header('Location: session-cache.php');
    exit;
}

if (isset($_SESSION['cached_data']) &&
    isset($_SESSION['cached_time']) &&
    time() - $_SESSION['cached_time'] < 600) {

    $data = $_SESSION['cached_data'];
    $source = 'Дані отримано з кешу сесії';
} else {
    sleep(2);
    $data = [
        'Ноутбук' => rand(20000, 40000),
        'Телефон' => rand(5000, 25000),
        'Навушники' => rand(500, 3000),
        'Клавіатура' => rand(800, 2500),
        'Миша' => rand(300, 1500)
    ];
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = 'Список товарів згенеровано заново';
}
echo '<h1>Список товарів</h1>';
echo '<p>' . $source . '</p>';
echo '<table border="1" cellpadding="8">';
echo '<tr><th>Назва товару</th><th>Ціна (грн)</th></tr>';
foreach ($data as $name => $price) {
    echo "<tr><td>$name</td><td>$price</td></tr>";
}
echo '</table>';
echo '<p><a href="?clear=1">Очистити кеш</a></p>';