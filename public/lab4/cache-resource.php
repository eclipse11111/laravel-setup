<?php
header('Content-Type: text/css; charset=UTF-8');
header('Cache-Control: public, max-age=86400');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');

echo "
body {
    font-family: Arial, sans-serif;
    background: #e0e0e0;
    padding: 15px;
}
h1 {
    color: #135af4;
}
";