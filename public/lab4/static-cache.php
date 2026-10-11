<?php
class DataCache
{
    private static $data = null;
    public static function getData()
    {
        if (self::$data === null) {
            sleep(2);

            self::$data = [
                'Ноутбук' => rand(20000, 40000),
                'Телефон' => rand(5000, 25000),
                'Навушники' => rand(500, 3000),
                'Клавіатура' => rand(800, 2500),
                'Миша' => rand(300, 1500)
            ];
            echo '<p>Список товарів згенеровано</p>';
        } else {
            echo '<p>Дані отримано зі статичного кешу</p>';
        }
        return self::$data;
    }
}

$first = DataCache::getData();
$second = DataCache::getData();
echo '<h1>Список товарів</h1>';
echo '<table border="1" cellpadding="8">';
echo '<tr><th>Назва товару</th><th>Ціна (грн)</th></tr>';
foreach ($second as $name => $price) {
    echo "<tr><td>$name</td><td>$price</td></tr>";
}
echo '</table>';