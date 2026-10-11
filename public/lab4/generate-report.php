<?php
$cacheFile = __DIR__ . '/cache/report.html';
$cacheTime = 600;

if (file_exists($cacheFile) &&
    time() - filemtime($cacheFile) < $cacheTime) {
    $html = file_get_contents($cacheFile);
    $source = 'Звіт отримано з файлового кешу';
} else {
    $start = microtime(true);
    sleep(3);
    $html = '<h1>Звіт</h1>';
    $html .= '<table border="1" cellpadding="5">';
    $html .= '<tr><th>№</th><th>Ім’я</th><th>Сума</th><th>Дата</th></tr>';
    $names = ['Олексій', 'Марія', 'Іван', 'Анна', 'Петро'];
    for ($i = 1; $i <= 1000; $i++) {
        $name = $names[array_rand($names)];
        $sum = rand(100, 10000);
        $date = date('Y-m-d', rand(
            strtotime('-1 year'),
            time()
        ));
        $html .= "<tr><td>$i</td><td>$name</td>";
        $html .= "<td>$sum</td><td>$date</td></tr>";
    }
    $html .= '</table>';
    if (!is_dir(dirname($cacheFile))) {
        mkdir(dirname($cacheFile), 0777, true);
    }
    file_put_contents($cacheFile, $html);
    $source = 'Звіт згенеровано заново';
}
echo '<p>' . $source . '</p>';
echo $html;