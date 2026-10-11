<?php
$url = 'https://wallpaperaccess.com/full/112836.jpg';
header('Content-Type: image/jpeg');
header('Cache-Control: public, max-age=86400');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
$image = file_get_contents($url);
if ($image === false) {
    http_response_code(502);
    exit('Не вдалося завантажити зображення');
}
echo $image;